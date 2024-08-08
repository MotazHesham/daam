<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMempershipRequest;
use App\Http\Requests\StoreMempershipRequest;
use App\Http\Requests\UpdateMempershipRequest;
use App\Mail\CertificateMail;
use App\Models\Mempership;
use Barryvdh\DomPDF\Facade\Pdf;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MempershipsController extends Controller
{
    use MediaUploadingTrait;

    public function update_certificate(Request $request){
        $mempership = Mempership::findOrFail($request->id);
        $data = [
            'session_num' => $request->session_num ,
            'session_date' => $request->session_date ,
            'accepted_from' => $request->accepted_from ,
            'mempership_num' => $request->mempership_num ,
        ];
        $pdf = PDF::loadView('admin.memperships.certificate',$data);
        $pdf->save('memperships/mempership_'.$mempership->id.'.pdf','public'); 
        return redirect()->back();  
    }
    public function send_certificate(Request $request){
        $mempership = Mempership::findOrFail($request->id); 
        Mail::to($mempership->email)->send(new CertificateMail($mempership));
        $mempership->certificate_sent = 1;
        $mempership->save();
        return redirect()->back();  
    }
    public function index(Request $request)
    { 

        if ($request->ajax()) {
            $query = Mempership::query()->select(sprintf('%s.*', (new Mempership)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $actions = '<a class="btn btn-xs btn-dark" href="'. route('admin.memperships.print', $row->id) .'">
                                طباعة
                            </a>'; 
                            
                $actions .= '<a class="btn btn-xs btn-primary" href="'. route('admin.memperships.show', $row->id) .'">
                                عرض
                            </a>'; 
                if(file_exists( public_path() . '/storage/memperships/mempership_'.$row->id.'.pdf')){
                    $text_button = 'تعديل الشهادة';
                    $class_button = 'info';
                }else{
                    $text_button = 'أضافة الشهادة';
                    $class_button = 'warning';
                    
                }
                    $actions .= '<a class="btn btn-xs btn-'.$class_button.'" href="#" onclick="send_certificate('.$row->id.')">
                    '.$text_button.'
                    </a>'; 
                return $actions;
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('identity_num', function ($row) {
                return $row->identity_num ? $row->identity_num : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('job', function ($row) {
                return $row->job ? $row->job : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('certificate_sent', function ($row) {  
                if(file_exists( public_path() . '/storage/memperships/mempership_'.$row->id.'.pdf')){

                    $form = '<form method="post" action="'.route('admin.memperships.send_certificate').'">';
                    $form .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
                    $form .= '<input type="hidden" name="id" value="'.$row->id.'">';
                    $form .= '<button type="submit" class="btn btn-xs btn-success">ارسال الشهادة</button>';
                    $form .= '</form>';
                }else{
                    $form ='';
                }
                $output =  $row->certificate_sent ? 'تم الأرسال' : $form;
                $output .= '<br>';
                $output .= file_exists( public_path() . '/storage/memperships/mempership_'.$row->id.'.pdf') ?  '<a href="'. asset('storage/memperships/mempership_'.$row->id.'.pdf') .'" class="btn btn-xs btn-warning">عرض الشهادة</a>' : '';
                return $output;
            });

            $table->rawColumns(['actions', 'placeholder', 'certificate_sent']);

            return $table->make(true);
        }

        return view('admin.memperships.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mempership_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.memperships.create');
    }

    public function store(Request $request)
    {
        $mempership = Mempership::create($request->all());

        if ($request->input('identity_photo', false)) {
            $mempership->addMedia(storage_path('tmp/uploads/' . basename($request->input('identity_photo'))))->toMediaCollection('identity_photo');
        }

        if ($request->input('receipt_photo', false)) {
            $mempership->addMedia(storage_path('tmp/uploads/' . basename($request->input('receipt_photo'))))->toMediaCollection('receipt_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mempership->id]);
        }

        return redirect()->route('admin.memperships.index');
    } 

    public function edit(Mempership $mempership)
    { 

        return view('admin.memperships.certificate');
    }
    public function show(Mempership $mempership)
    { 

        return view('admin.memperships.show', compact('mempership'));
    }
    public function print($id)
    { 
        $mempership = Mempership::findOrFail($id);
        return view('admin.memperships.print', compact('mempership'));
    }

    public function destroy(Mempership $mempership)
    {
        abort_if(Gate::denies('mempership_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mempership->delete();

        return back();
    } 

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mempership_create') && Gate::denies('mempership_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Mempership();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}