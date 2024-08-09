@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.name') }}
                        </th>
                        <td>
                            {{ $beneficiary->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.phone') }}
                        </th>
                        <td>
                            {{ $beneficiary->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.address') }}
                        </th>
                        <td>
                            {{ $beneficiary->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.identity_num') }}
                        </th>
                        <td>
                            {{ $beneficiary->identity_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.marrige_status') }}
                        </th>
                        <td>
                            {{ App\Models\Beneficiary::MARRIGE_STATUS_SELECT[$beneficiary->marrige_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.needs_title') }}
                        </th>
                        <td>
                            {{ $beneficiary->needs_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.needs') }}
                        </th>
                        <td>
                            {{ $beneficiary->needs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.age') }}
                        </th>
                        <td>
                            {{ $beneficiary->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Beneficiary::STATUS_SELECT[$beneficiary->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.user') }}
                        </th>
                        <td>
                            {{ $beneficiary->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.date') }}
                        </th>
                        <td>
                            {{ $beneficiary->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.amount') }}
                        </th>
                        <td>
                            {{ $beneficiary->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($beneficiary->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.notes') }}
                        </th>
                        <td>
                            {{ $beneficiary->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.cancel_reason') }}
                        </th>
                        <td>
                            {{ $beneficiary->cancel_reason }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection