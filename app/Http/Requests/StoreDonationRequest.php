<?php

namespace App\Http\Requests;

use App\Models\Donation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDonationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('donation_create');
    }

    public function rules()
    {
        return [
            'company_name' => [
                'string',
                'nullable',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
