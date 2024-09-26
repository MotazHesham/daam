

<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiary.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-donationBeneficiaries">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.marrige_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.date') }}
                        </th> 
                        <th>مبلغ التبرع</th>
                        <th>سبب الرفض</th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiaries as $key => $beneficiary)
                        <tr data-entry-id="{{ $beneficiary->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $beneficiary->id ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->name ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->phone ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Beneficiary::MARRIGE_STATUS_SELECT[$beneficiary->marrige_status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Beneficiary::STATUS_SELECT[$beneficiary->status] ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiary->date ?? '' }}
                            </td> 
                            <td>
                                {{ $beneficiary->amount ?? '' }}
                            </td> 
                            <td>
                                {{ $beneficiary->cancel_reason ?? '' }}
                            </td> 
                            <td> 

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            let table = $('.datatable-donationBeneficiaries:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
