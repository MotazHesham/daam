<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDonationRequest;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Models\Donation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DonationsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('donation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Donation::query()->with('beneficiaries')->select(sprintf('%s.*', (new Donation)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'donation_show';
                $editGate      = 'donation_edit';
                $deleteGate    = 'donation_delete';
                $crudRoutePart = 'donations';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('company_name', function ($row) {
                return $row->company_name ? $row->company_name : '';
            });

            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Donation::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('exchange_period', function ($row) {
                return $row->exchange_period ? $row->exchange_period : '';
            });
            $table->editColumn('target', function ($row) {
                return $row->target ? Donation::TARGET_SELECT[$row->target] : '';
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });

            $table->editColumn('beneficiaries', function ($row) {
                return $row->beneficiaries ? $row->beneficiaries->where('status','done')->sum('amount') : '';
            });
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.donations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('donation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.donations.create');
    }

    public function store(StoreDonationRequest $request)
    {
        $v = $request->all();
        
        $total = 0;
        if($request->expenses_type == 'flat'){
            $total = $request->amount - $request->expenses;
        }elseif($request->expenses_type == 'percent'){
            $total = $request->amount - (($request->amount * $request->expenses) / 100);
        }else{
            $total = $request->amount;
        }
        $v['total'] = $total;
        $donation = Donation::create($v);

        return redirect()->route('admin.donations.index');
    }

    public function edit(Donation $donation)
    {
        abort_if(Gate::denies('donation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.donations.edit', compact('donation'));
    }

    public function update(UpdateDonationRequest $request, Donation $donation)
    {
        $v = $request->all();
        
        $total = 0;
        if($request->expenses_type == 'flat'){
            $total = $request->amount - $request->expenses;
        }elseif($request->expenses_type == 'percent'){
            $total = $request->amount - (($request->amount * $request->expenses) / 100);
        }else{
            $total = $request->amount;
        }
        $v['total'] = $total;
        $donation->update($v);

        return redirect()->route('admin.donations.index');
    }

    public function show(Donation $donation)
    {
        abort_if(Gate::denies('donation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donation->load('beneficiaries');

        return view('admin.donations.show', compact('donation'));
    }

    public function destroy(Donation $donation)
    {
        abort_if(Gate::denies('donation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donation->delete();

        return back();
    }

    public function massDestroy(MassDestroyDonationRequest $request)
    {
        $donations = Donation::find(request('ids'));

        foreach ($donations as $donation) {
            $donation->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
