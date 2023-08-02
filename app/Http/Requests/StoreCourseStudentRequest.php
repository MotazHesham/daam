<?php

namespace App\Http\Requests;

use App\Models\CourseStudent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourseStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_student_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'identity_num' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'date_of_birth' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'course_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
