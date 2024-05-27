@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mempership.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.memperships.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.id') }}
                        </th>
                        <td>
                            {{ $mempership->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.first_name') }}
                        </th>
                        <td>
                            {{ $mempership->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.second_name') }}
                        </th>
                        <td>
                            {{ $mempership->second_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.third_name') }}
                        </th>
                        <td>
                            {{ $mempership->third_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.last_name') }}
                        </th>
                        <td>
                            {{ $mempership->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.birth_place') }}
                        </th>
                        <td>
                            {{ $mempership->birth_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.birth_date') }}
                        </th>
                        <td>
                            {{ $mempership->birth_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.identity_num') }}
                        </th>
                        <td>
                            {{ $mempership->identity_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.identity_from') }}
                        </th>
                        <td>
                            {{ $mempership->identity_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.identity_date') }}
                        </th>
                        <td>
                            {{ $mempership->identity_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.identity_photo') }}
                        </th>
                        <td>
                            @if($mempership->identity_photo)
                                <a href="{{ $mempership->identity_photo->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.city') }}
                        </th>
                        <td>
                            {{ $mempership->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.district') }}
                        </th>
                        <td>
                            {{ $mempership->district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.street') }}
                        </th>
                        <td>
                            {{ $mempership->street }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.address') }}
                        </th>
                        <td>
                            {{ $mempership->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.qualification') }}
                        </th>
                        <td>
                            {{ $mempership->qualification }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.job') }}
                        </th>
                        <td>
                            {{ $mempership->job }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.job_company') }}
                        </th>
                        <td>
                            {{ $mempership->job_company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.other_jobs') }}
                        </th>
                        <td>
                            {{ $mempership->other_jobs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.phone') }}
                        </th>
                        <td>
                            {{ $mempership->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.phone_2') }}
                        </th>
                        <td>
                            {{ $mempership->phone_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.postal_box') }}
                        </th>
                        <td>
                            {{ $mempership->postal_box }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.postal_code') }}
                        </th>
                        <td>
                            {{ $mempership->postal_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.email') }}
                        </th>
                        <td>
                            {{ $mempership->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.receipt_photo') }}
                        </th>
                        <td>
                            @if($mempership->receipt_photo)
                                <a href="{{ $mempership->receipt_photo->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mempership.fields.certificate_sent') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mempership->certificate_sent ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.memperships.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection