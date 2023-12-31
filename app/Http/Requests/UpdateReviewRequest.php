<?php

namespace App\Http\Requests;

use App\Models\Review;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('review_edit');
    }

    public function rules()
    {
        return [
            'role' => [
                'string',
                'required',
            ],
            'identity_number' => [
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
