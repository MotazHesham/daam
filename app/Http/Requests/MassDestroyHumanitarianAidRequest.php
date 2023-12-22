<?php

namespace App\Http\Requests;

use App\Models\HumanitarianAid;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHumanitarianAidRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('humanitarian_aid_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:humanitarian_aids,id',
        ];
    }
}
