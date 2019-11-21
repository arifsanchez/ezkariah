<?php

namespace App\Http\Requests;

use App\Masjid;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateMasjidRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('masjid_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama' => [
                'required',
            ],
        ];
    }
}
