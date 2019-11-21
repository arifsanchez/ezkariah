<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNegeriRequest;
use App\Http\Requests\UpdateNegeriRequest;
use App\Http\Resources\Admin\NegeriResource;
use App\Negeri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NegeriApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('negeri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NegeriResource(Negeri::all());
    }

    public function store(StoreNegeriRequest $request)
    {
        $negeri = Negeri::create($request->all());

        return (new NegeriResource($negeri))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Negeri $negeri)
    {
        abort_if(Gate::denies('negeri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NegeriResource($negeri);
    }

    public function update(UpdateNegeriRequest $request, Negeri $negeri)
    {
        $negeri->update($request->all());

        return (new NegeriResource($negeri))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Negeri $negeri)
    {
        abort_if(Gate::denies('negeri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $negeri->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
