@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.donation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.donations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.id') }}
                        </th>
                        <td>
                            {{ $donation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.company_name') }}
                        </th>
                        <td>
                            {{ $donation->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.date') }}
                        </th>
                        <td>
                            {{ $donation->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.amount') }}
                        </th>
                        <td>
                            {{ $donation->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Donation::TYPE_SELECT[$donation->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.exchange_period') }}
                        </th>
                        <td>
                            {{ $donation->exchange_period }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.target') }}
                        </th>
                        <td>
                            {{ App\Models\Donation::TARGET_SELECT[$donation->target] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.notes') }}
                        </th>
                        <td>
                            {{ $donation->notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.donations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection