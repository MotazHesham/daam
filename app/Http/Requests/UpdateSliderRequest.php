<?php

namespace App\Http\Requests;

use App\Models\Slider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slider_edit');
    }

    public function rules()
    {
        return [
            'text_1' => [
                'string',
                'nullable',
            ],
            'text_2' => [
                'string',
                'nullable',
            ],
            'image' => [
                'required',
            ], 
            'link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
