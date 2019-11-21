<?php

namespace App\Http\Requests;

use App\JenisPengenalanDiri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateJenisPengenalanDiriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jenis_pengenalan_diri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
