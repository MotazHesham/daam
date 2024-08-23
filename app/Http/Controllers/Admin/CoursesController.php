<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Mail\CertificateMail2;
use App\Models\Course;
use App\Models\CourseStudent;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller
{
    use MediaUploadingTrait;

    public function update_statuses(Request $request){ 
        $type = $request->type;
        $course = Course::findOrFail($request->id);
        $course->$type = $request->status; 
        $course->save();
        return 1;
    }

    
    public function get_certificate($id){
        $courseStudent = CourseStudent::findOrFail($id);
        $path = certificate_store($id);
        return Storage::download($path);   
    } 

    public function send_certificate($id){
        $courseStudent = CourseStudent::findOrFail($id); 
        Mail::to($courseStudent->email_certificate)->send(new CertificateMail2($courseStudent)); 
        alert('تم الارسال بنجاح','','success');
        return redirect()->back();  
    }

    
    public function qr_attendance($id){
        $course = Course::findOrFail(decrypt($id));
        return view('admin.courses.qr_attendance',compact('course'));
    }
    
    public function qr_certificate($id){
        $course = Course::findOrFail(decrypt($id));
        return view('admin.courses.qr_certificate',compact('course'));
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Course::query()->select(sprintf('%s.*', (new Course)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'course_show';
                $editGate      = 'course_edit';
                $deleteGate    = 'course_delete';
                $crudRoutePart = 'courses';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('trainer', function ($row) {
                return $row->trainer ? $row->trainer : '';
            });
            $table->editColumn('attend_type', function ($row) {
                return $row->attend_type ? Course::ATTEND_TYPE_SELECT[$row->attend_type] : '';
            });
            $table->editColumn('certificate', function ($row) {
                return $row->certificate ? Course::CERTIFICATE_SELECT[$row->certificate] : '';
            });
            $table->editColumn('published', function ($row) {
                return '
                <label class="c-switch c-switch-pill c-switch-success">
                    <input onchange="update_statuses(this,\'published\')" value="' . $row->id . '" type="checkbox" class="c-switch-input" '. ($row->published ? "checked" : null) .'>
                    <span class="c-switch-slider"></span>
                </label>';
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('short_description', function ($row) {
                return $row->short_description ? $row->short_description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published', 'photo']);

            return $table->make(true);
        }

        return view('admin.courses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());

        if ($request->input('photo', false)) {
            $course->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $course->id]);
        }

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());

        if ($request->input('photo', false)) {
            if (! $course->photo || $request->input('photo') !== $course->photo->file_name) {
                if ($course->photo) {
                    $course->photo->delete();
                }
                $course->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($course->photo) {
            $course->photo->delete();
        }

        return redirect()->route('admin.courses.index');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->load('courseCourseStudents.attendance');

        return view('admin.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        $courses = Course::find(request('ids'));

        foreach ($courses as $course) {
            $course->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('course_create') && Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Course();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
