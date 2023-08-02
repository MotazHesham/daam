<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_edit');
    }

    public function rules()
    {
        return [
            'website_name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'facebook' => [
                'string',
                'required',
            ],
            'instagram' => [
                'string',
                'required',
            ],
            'logo' => [
                'required',
            ],
            'address' => [
                'required',
            ],
            'tiktok' => [
                'string',
                'required',
            ],
            'youtube' => [
                'string',
                'required',
            ],
            'divorced_count' => [
                'string',
                'nullable',
            ],
            'widow_count' => [
                'string',
                'nullable',
            ],
            'child_count' => [
                'string',
                'nullable',
            ],
            'unit_count' => [
                'string',
                'nullable',
            ],
            'building_count' => [
                'string',
                'nullable',
            ],
            'beneficiary_count' => [
                'string',
                'nullable',
            ],
        ];
    }
}
