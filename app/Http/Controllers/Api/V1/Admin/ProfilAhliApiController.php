<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfilAhliRequest;
use App\Http\Requests\UpdateProfilAhliRequest;
use App\Http\Resources\Admin\ProfilAhliResource;
use App\ProfilAhli;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfilAhliApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('profil_ahli_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfilAhliResource(ProfilAhli::with(['ictype', 'jantina', 'team'])->get());
    }

    public function store(StoreProfilAhliRequest $request)
    {
        $profilAhli = ProfilAhli::create($request->all());

        return (new ProfilAhliResource($profilAhli))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProfilAhli $profilAhli)
    {
        abort_if(Gate::denies('profil_ahli_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfilAhliResource($profilAhli->load(['ictype', 'jantina', 'team']));
    }

    public function update(UpdateProfilAhliRequest $request, ProfilAhli $profilAhli)
    {
        $profilAhli->update($request->all());

        return (new ProfilAhliResource($profilAhli))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProfilAhli $profilAhli)
    {
        abort_if(Gate::denies('profil_ahli_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profilAhli->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
