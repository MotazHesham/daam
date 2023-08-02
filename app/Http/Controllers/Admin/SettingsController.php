<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settings = Setting::with(['media'])->get();

        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.create');
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->all());

        if ($request->input('logo', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('chairman_image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('chairman_image'))))->toMediaCollection('chairman_image');
        }

        if ($request->input('about_image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_image'))))->toMediaCollection('about_image');
        }

        if ($request->input('vision_image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('vision_image'))))->toMediaCollection('vision_image');
        }

        if ($request->input('mission_image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('mission_image'))))->toMediaCollection('mission_image');
        }

        if ($request->input('profile', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile'))))->toMediaCollection('profile');
        }

        if ($request->input('iskan_info', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('iskan_info'))))->toMediaCollection('iskan_info');
        }

        if ($request->input('iskan_tutorial', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('iskan_tutorial'))))->toMediaCollection('iskan_tutorial');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $setting->id]);
        }

        return redirect()->route('admin.settings.index');
    }

    public function edit(Setting $setting)
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());

        if ($request->input('logo', false)) {
            if (! $setting->logo || $request->input('logo') !== $setting->logo->file_name) {
                if ($setting->logo) {
                    $setting->logo->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($setting->logo) {
            $setting->logo->delete();
        }

        if ($request->input('chairman_image', false)) {
            if (! $setting->chairman_image || $request->input('chairman_image') !== $setting->chairman_image->file_name) {
                if ($setting->chairman_image) {
                    $setting->chairman_image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('chairman_image'))))->toMediaCollection('chairman_image');
            }
        } elseif ($setting->chairman_image) {
            $setting->chairman_image->delete();
        }

        if ($request->input('about_image', false)) {
            if (! $setting->about_image || $request->input('about_image') !== $setting->about_image->file_name) {
                if ($setting->about_image) {
                    $setting->about_image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_image'))))->toMediaCollection('about_image');
            }
        } elseif ($setting->about_image) {
            $setting->about_image->delete();
        }

        if ($request->input('vision_image', false)) {
            if (! $setting->vision_image || $request->input('vision_image') !== $setting->vision_image->file_name) {
                if ($setting->vision_image) {
                    $setting->vision_image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('vision_image'))))->toMediaCollection('vision_image');
            }
        } elseif ($setting->vision_image) {
            $setting->vision_image->delete();
        }

        if ($request->input('mission_image', false)) {
            if (! $setting->mission_image || $request->input('mission_image') !== $setting->mission_image->file_name) {
                if ($setting->mission_image) {
                    $setting->mission_image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('mission_image'))))->toMediaCollection('mission_image');
            }
        } elseif ($setting->mission_image) {
            $setting->mission_image->delete();
        }

        if ($request->input('profile', false)) {
            if (! $setting->profile || $request->input('profile') !== $setting->profile->file_name) {
                if ($setting->profile) {
                    $setting->profile->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile'))))->toMediaCollection('profile');
            }
        } elseif ($setting->profile) {
            $setting->profile->delete();
        }

        if ($request->input('iskan_info', false)) {
            if (! $setting->iskan_info || $request->input('iskan_info') !== $setting->iskan_info->file_name) {
                if ($setting->iskan_info) {
                    $setting->iskan_info->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('iskan_info'))))->toMediaCollection('iskan_info');
            }
        } elseif ($setting->iskan_info) {
            $setting->iskan_info->delete();
        }

        if ($request->input('iskan_tutorial', false)) {
            if (! $setting->iskan_tutorial || $request->input('iskan_tutorial') !== $setting->iskan_tutorial->file_name) {
                if ($setting->iskan_tutorial) {
                    $setting->iskan_tutorial->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('iskan_tutorial'))))->toMediaCollection('iskan_tutorial');
            }
        } elseif ($setting->iskan_tutorial) {
            $setting->iskan_tutorial->delete();
        }

        return redirect()->route('admin.settings.index');
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.show', compact('setting'));
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return back();
    }

    public function massDestroy(MassDestroySettingRequest $request)
    {
        $settings = Setting::find(request('ids'));

        foreach ($settings as $setting) {
            $setting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Setting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
