<?php

namespace App\Http\Requests;

use App\ProfilAhli;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProfilAhliRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('profil_ahli_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:profil_ahlis,no_kad_pengenalan,' . request()->route('profil_ahli')->id,
            ],
        ];
    }
}
