<?php

namespace App\Http\Requests;

use App\JenisPengenalanDiri;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJenisPengenalanDiriRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jenis_pengenalan_diri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:jenis_pengenalan_diris,id',
        ];
    }
}
