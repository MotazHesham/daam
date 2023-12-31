<?php

namespace App\Http\Requests;

use App\Models\HawkamCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHawkamCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hawkam_category_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
