<?php

namespace App\Http\Requests;

use App\Jantina;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateJantinaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jantina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
