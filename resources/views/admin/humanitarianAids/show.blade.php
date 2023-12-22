@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.humanitarianAid.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.humanitarian-aids.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.humanitarianAid.fields.id') }}
                            </th>
                            <td>
                                {{ $humanitarianAid->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.humanitarianAid.fields.type') }}
                            </th>
                            <td>
                                {{ $humanitarianAid->type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.humanitarianAid.fields.aid_number') }}
                            </th>
                            <td>
                                {{ $humanitarianAid->aid_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.humanitarianAid.fields.unit_of_aid') }}
                            </th>
                            <td>
                                {{ $humanitarianAid->unit_of_aid }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.humanitarianAid.fields.icon') }}
                            </th>
                            <td>
                                @if ($humanitarianAid->icon)
                                    <a href="{{ $humanitarianAid->icon->getUrl() }}" target="_blank"
                                        style="display: inline-block">
                                        <img src="{{ $humanitarianAid->icon->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.humanitarian-aids.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
