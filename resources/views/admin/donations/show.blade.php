@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-3">
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
    </div>
    <div class="col-md-9"> 
        <div class="card">
            <div class="card-header">
                {{ trans('global.relatedData') }}
            </div>
            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#donation_beneficiaries" role="tab" data-toggle="tab">
                        {{ trans('cruds.beneficiary.title') }}
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="donation_beneficiaries">
                    @includeIf('admin.donations.relationships.donationBeneficiaries', ['beneficiaries' => $donation->beneficiaries])
                </div>
            </div>
        </div>
    </div>
</div>



@endsection