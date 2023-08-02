<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHawkamCategoryRequest;
use App\Http\Requests\StoreHawkamCategoryRequest;
use App\Http\Requests\UpdateHawkamCategoryRequest;
use App\Models\HawkamCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HawkamCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hawkam_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hawkamCategories = HawkamCategory::all();

        return view('admin.hawkamCategories.index', compact('hawkamCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('hawkam_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hawkamCategories.create');
    }

    public function store(StoreHawkamCategoryRequest $request)
    {
        $hawkamCategory = HawkamCategory::create($request->all());

        return redirect()->route('admin.hawkam-categories.index');
    }

    public function edit(HawkamCategory $hawkamCategory)
    {
        abort_if(Gate::denies('hawkam_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hawkamCategories.edit', compact('hawkamCategory'));
    }

    public function update(UpdateHawkamCategoryRequest $request, HawkamCategory $hawkamCategory)
    {
        $hawkamCategory->update($request->all());

        return redirect()->route('admin.hawkam-categories.index');
    }

    public function show(HawkamCategory $hawkamCategory)
    {
        abort_if(Gate::denies('hawkam_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hawkamCategory->load('categoryHawkmas');

        return view('admin.hawkamCategories.show', compact('hawkamCategory'));
    }

    public function destroy(HawkamCategory $hawkamCategory)
    {
        abort_if(Gate::denies('hawkam_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hawkamCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyHawkamCategoryRequest $request)
    {
        $hawkamCategories = HawkamCategory::find(request('ids'));

        foreach ($hawkamCategories as $hawkamCategory) {
            $hawkamCategory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
