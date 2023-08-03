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
                'nullable',
            ],
            'email' => [
                'nullable',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'logo' => [
                'nullable',
            ],
            'address' => [
                'nullable',
            ],
            'tiktok' => [
                'string',
                'nullable',
            ],
            'youtube' => [
                'string',
                'nullable',
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
