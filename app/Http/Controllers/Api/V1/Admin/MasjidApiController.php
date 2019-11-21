<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMasjidRequest;
use App\Http\Requests\UpdateMasjidRequest;
use App\Http\Resources\Admin\MasjidResource;
use App\Masjid;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MasjidApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('masjid_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MasjidResource(Masjid::with(['negeri'])->get());
    }

    public function store(StoreMasjidRequest $request)
    {
        $masjid = Masjid::create($request->all());

        return (new MasjidResource($masjid))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Masjid $masjid)
    {
        abort_if(Gate::denies('masjid_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MasjidResource($masjid->load(['negeri']));
    }

    public function update(UpdateMasjidRequest $request, Masjid $masjid)
    {
        $masjid->update($request->all());

        return (new MasjidResource($masjid))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Masjid $masjid)
    {
        abort_if(Gate::denies('masjid_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $masjid->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
