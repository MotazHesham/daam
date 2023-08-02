@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.setting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.id') }}
                        </th>
                        <td>
                            {{ $setting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.website_name') }}
                        </th>
                        <td>
                            {{ $setting->website_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.email') }}
                        </th>
                        <td>
                            {{ $setting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $setting->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.facebook') }}
                        </th>
                        <td>
                            {{ $setting->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.instagram') }}
                        </th>
                        <td>
                            {{ $setting->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.logo') }}
                        </th>
                        <td>
                            @if($setting->logo)
                                <a href="{{ $setting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.address') }}
                        </th>
                        <td>
                            {{ $setting->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.tiktok') }}
                        </th>
                        <td>
                            {{ $setting->tiktok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.youtube') }}
                        </th>
                        <td>
                            {{ $setting->youtube }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.divorced_count') }}
                        </th>
                        <td>
                            {{ $setting->divorced_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.widow_count') }}
                        </th>
                        <td>
                            {{ $setting->widow_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.child_count') }}
                        </th>
                        <td>
                            {{ $setting->child_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.unit_count') }}
                        </th>
                        <td>
                            {{ $setting->unit_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.building_count') }}
                        </th>
                        <td>
                            {{ $setting->building_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.beneficiary_count') }}
                        </th>
                        <td>
                            {{ $setting->beneficiary_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.chairman_description') }}
                        </th>
                        <td>
                            {!! $setting->chairman_description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.chairman_image') }}
                        </th>
                        <td>
                            @if($setting->chairman_image)
                                <a href="{{ $setting->chairman_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->chairman_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.about_image') }}
                        </th>
                        <td>
                            @if($setting->about_image)
                                <a href="{{ $setting->about_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->about_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.vision_image') }}
                        </th>
                        <td>
                            @if($setting->vision_image)
                                <a href="{{ $setting->vision_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->vision_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.mission_image') }}
                        </th>
                        <td>
                            @if($setting->mission_image)
                                <a href="{{ $setting->mission_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->mission_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.profile') }}
                        </th>
                        <td>
                            @if($setting->profile)
                                <a href="{{ $setting->profile->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.iskan_description') }}
                        </th>
                        <td>
                            {!! $setting->iskan_description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.iskan_terms') }}
                        </th>
                        <td>
                            {!! $setting->iskan_terms !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.iskan_info') }}
                        </th>
                        <td>
                            @if($setting->iskan_info)
                                <a href="{{ $setting->iskan_info->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.iskan_tutorial') }}
                        </th>
                        <td>
                            @if($setting->iskan_tutorial)
                                <a href="{{ $setting->iskan_tutorial->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection