<?php

namespace App\Http\Requests;

use App\Models\HumanitarianAid;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHumanitarianAidRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('humanitarian_aid_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'required',
            ],
            'aid_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'unit_of_aid' => [
                'string',
                'required',
            ],
            'icon' => [
                'required',
            ],
        ];
    }
}
