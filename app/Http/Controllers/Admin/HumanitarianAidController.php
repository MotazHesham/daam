<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHumanitarianAidRequest;
use App\Http\Requests\StoreHumanitarianAidRequest;
use App\Http\Requests\UpdateHumanitarianAidRequest;
use App\Models\HumanitarianAid;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HumanitarianAidController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('humanitarian_aid_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $humanitarianAids = HumanitarianAid::with(['media'])->get();

        return view('admin.humanitarianAids.index', compact('humanitarianAids'));
    }

    public function create()
    {
        abort_if(Gate::denies('humanitarian_aid_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.humanitarianAids.create');
    }

    public function store(StoreHumanitarianAidRequest $request)
    {
        $humanitarianAid = HumanitarianAid::create($request->all());

        if ($request->input('icon', false)) {
            $humanitarianAid->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $humanitarianAid->id]);
        }

        return redirect()->route('admin.humanitarian-aids.index');
    }

    public function edit(HumanitarianAid $humanitarianAid)
    {
        abort_if(Gate::denies('humanitarian_aid_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.humanitarianAids.edit', compact('humanitarianAid'));
    }

    public function update(UpdateHumanitarianAidRequest $request, HumanitarianAid $humanitarianAid)
    {
        $humanitarianAid->update($request->all());

        if ($request->input('icon', false)) {
            if (!$humanitarianAid->icon || $request->input('icon') !== $humanitarianAid->icon->file_name) {
                if ($humanitarianAid->icon) {
                    $humanitarianAid->icon->delete();
                }
                $humanitarianAid->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($humanitarianAid->icon) {
            $humanitarianAid->icon->delete();
        }

        return redirect()->route('admin.humanitarian-aids.index');
    }

    public function show(HumanitarianAid $humanitarianAid)
    {
        abort_if(Gate::denies('humanitarian_aid_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.humanitarianAids.show', compact('humanitarianAid'));
    }

    public function destroy(HumanitarianAid $humanitarianAid)
    {
        abort_if(Gate::denies('humanitarian_aid_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $humanitarianAid->delete();

        return back();
    }

    public function massDestroy(MassDestroyHumanitarianAidRequest $request)
    {
        $humanitarianAids = HumanitarianAid::find(request('ids'));

        foreach ($humanitarianAids as $humanitarianAid) {
            $humanitarianAid->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('humanitarian_aid_create') && Gate::denies('humanitarian_aid_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HumanitarianAid();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
