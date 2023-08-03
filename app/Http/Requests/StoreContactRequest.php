<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
                'in:'.implode(',',array_keys(Contact::TYPE_SELECT))
            ],
            'name' => [
                'string',
                'required',
            ],
            'job' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
