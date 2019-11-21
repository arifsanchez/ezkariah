<?php

namespace App\Http\Requests;

use App\ProfilAhli;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProfilAhliRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('profil_ahli_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama_penuh'        => [
                'required',
            ],
            'no_kad_pengenalan' => [
                'required',
                'unique:profil_ahlis',
            ],
        ];
    }
}
