<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseStudentRequest;
use App\Http\Requests\StoreCourseStudentRequest;
use App\Http\Requests\UpdateCourseStudentRequest;
use App\Models\Course;
use App\Models\CourseStudent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourseStudentsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('course_student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CourseStudent::with(['course'])->select(sprintf('%s.*', (new CourseStudent)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'course_student_show';
                $editGate      = 'course_student_edit';
                $deleteGate    = 'course_student_delete';
                $crudRoutePart = 'course-students';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('phone_number', function ($row) {
                return $row->phone_number ? $row->phone_number : '';
            });
            $table->editColumn('registered', function ($row) {
                return $row->registered ? CourseStudent::REGISTERED_RADIO[$row->registered] : '';
            });
            $table->editColumn('certificate', function ($row) {
                return $row->certificate ? CourseStudent::CERTIFICATE_RADIO[$row->certificate] : '';
            });
            $table->addColumn('course_title', function ($row) {
                return $row->course ? $row->course->title : '';
            });

            $table->editColumn('course.title', function ($row) {
                return $row->course ? (is_string($row->course) ? $row->course : $row->course->title) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'course']);

            return $table->make(true);
        }

        return view('admin.courseStudents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courseStudents.create', compact('courses'));
    }

    public function store(StoreCourseStudentRequest $request)
    {
        $courseStudent = CourseStudent::create($request->all());

        return redirect()->route('admin.course-students.index');
    }

    public function edit(CourseStudent $courseStudent)
    {
        abort_if(Gate::denies('course_student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseStudent->load('course');

        return view('admin.courseStudents.edit', compact('courseStudent', 'courses'));
    }

    public function update(UpdateCourseStudentRequest $request, CourseStudent $courseStudent)
    {
        $courseStudent->update($request->all());

        return redirect()->route('admin.courses.show',$courseStudent->course_id);
    }

    public function show(CourseStudent $courseStudent)
    {
        abort_if(Gate::denies('course_student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseStudent->load('course');

        return view('admin.courseStudents.show', compact('courseStudent'));
    }

    public function destroy(CourseStudent $courseStudent)
    {
        abort_if(Gate::denies('course_student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseStudent->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseStudentRequest $request)
    {
        $courseStudents = CourseStudent::find(request('ids'));

        foreach ($courseStudents as $courseStudent) {
            $courseStudent->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
