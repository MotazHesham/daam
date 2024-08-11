<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBeneficiaryRequest;
use App\Http\Requests\StoreBeneficiaryRequest;
use App\Http\Requests\UpdateBeneficiaryRequest;
use App\Models\Beneficiary;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Donation;

class BeneficiariesController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function status(Request $request){ 
        $beneficiary = Beneficiary::findOrfail($request->id);
        if(!in_array($request->status,array_keys(Beneficiary::STATUS_SELECT))){
            abort(422);
        }
        $beneficiary->status = $request->status;
        $beneficiary->save();
        return redirect()->back();
    }
    public function status2(Request $request){ 
        $beneficiary = Beneficiary::findOrfail($request->id);
        if(!in_array($request->status,array_keys(Beneficiary::STATUS_SELECT))){
            abort(422);
        }
        $donation = Donation::findOrfail($request->donation_id);
        $sumDonated = Beneficiary::where('status','done')->where('donation_id',$request->donation_id)->sum('amount');
        if($request->amount > $donation->total - $sumDonated){
            alert('الباقي من التبرع لا يكفي المطلوب','','error');
            return redirect()->back();
        }
        $beneficiary->update($request->only('amount','notes','status','cancel_reason','donation_id'));

        if (count($beneficiary->attachments) > 0) {
            foreach ($beneficiary->attachments as $media) {
                if (! in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $beneficiary->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $beneficiary->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }
        return redirect()->back();
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('beneficiary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Beneficiary::with(['user'])->select(sprintf('%s.*', (new Beneficiary)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'beneficiary_show';
                $editGate      = in_array($row->status,['cancel','done']) ? false :'beneficiary_edit';
                $deleteGate    = in_array($row->status,['cancel','done']) ? false :'beneficiary_delete';
                $crudRoutePart = 'beneficiaries';
                
                $changeTo = 'specialist'; 
                $changeToText = '';
                $cancel = '';
                $status = '';
                
                
                
                
                if($row->status == 'specialist' && !Gate::denies('beneficiary_status_specialist')){
                    $changeTo = 'manager';
                    $changeToText = 'تحويل الي مدير القسم';
                    $status = '<a class="btn btn-xs btn-warning" href="' . route('admin.beneficiaries.status', ['id' => $row->id , 'status' => $changeTo]) . '">
                                    '. $changeToText .'
                                </a>';
                }elseif($row->status == 'manager' && !Gate::denies('beneficiary_status_manager')){
                    $changeTo = 'money';
                    $changeToText = 'تحويل الي المالية';
                    $status = '<a class="btn btn-xs btn-warning" href="' . route('admin.beneficiaries.status', ['id' => $row->id , 'status' => $changeTo]) . '">
                                    '. $changeToText .'
                                </a>';
                }elseif($row->status == 'money' && !Gate::denies('beneficiary_status_money')){
                    $changeTo = 'done';
                    $changeToText = 'صرف الطلب';

                    $cancel = '<a class="btn btn-xs btn-danger text-white" data-toggle="modal" data-target="#exampleModal2" onclick="changeBenificiaryId('.$row->id.')">
                                    الغاء الصرف   
                                </a>';
                    $status = '<a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" onclick="changeBenificiaryId('.$row->id.')">
                                    '. $changeToText .'
                                </a>';
                }


                return $status . $cancel . view('partials.datatablesActions', compact(
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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('marrige_status', function ($row) {
                return $row->marrige_status ? Beneficiary::MARRIGE_STATUS_SELECT[$row->marrige_status] : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Beneficiary::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }
        
        $donations = Donation::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.beneficiaries.index',compact('donations'));
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.beneficiaries.create', compact('users'));
    }

    public function store(StoreBeneficiaryRequest $request)
    {
        $beneficiary = Beneficiary::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $beneficiary->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiary->id]);
        }

        return redirect()->route('admin.beneficiaries.index');
    }

    public function edit(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $beneficiary->load('user');

        return view('admin.beneficiaries.edit', compact('beneficiary', 'users'));
    }

    public function update(UpdateBeneficiaryRequest $request, Beneficiary $beneficiary)
    {
        $beneficiary->update($request->all());

        if (count($beneficiary->attachments) > 0) {
            foreach ($beneficiary->attachments as $media) {
                if (! in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $beneficiary->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $beneficiary->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.beneficiaries.index');
    }

    public function show(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiary->load('user');

        return view('admin.beneficiaries.show', compact('beneficiary'));
    }

    public function destroy(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiary->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryRequest $request)
    {
        $beneficiaries = Beneficiary::find(request('ids'));

        foreach ($beneficiaries as $beneficiary) {
            $beneficiary->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('beneficiary_create') && Gate::denies('beneficiary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Beneficiary();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}