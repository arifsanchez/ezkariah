<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNegeriRequest;
use App\Http\Requests\StoreNegeriRequest;
use App\Http\Requests\UpdateNegeriRequest;
use App\Negeri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NegeriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('negeri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $negeris = Negeri::all();

        return view('admin.negeris.index', compact('negeris'));
    }

    public function create()
    {
        abort_if(Gate::denies('negeri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.negeris.create');
    }

    public function store(StoreNegeriRequest $request)
    {
        $negeri = Negeri::create($request->all());

        return redirect()->route('admin.negeris.index');
    }

    public function edit(Negeri $negeri)
    {
        abort_if(Gate::denies('negeri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.negeris.edit', compact('negeri'));
    }

    public function update(UpdateNegeriRequest $request, Negeri $negeri)
    {
        $negeri->update($request->all());

        return redirect()->route('admin.negeris.index');
    }

    public function show(Negeri $negeri)
    {
        abort_if(Gate::denies('negeri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.negeris.show', compact('negeri'));
    }

    public function destroy(Negeri $negeri)
    {
        abort_if(Gate::denies('negeri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $negeri->delete();

        return back();
    }

    public function massDestroy(MassDestroyNegeriRequest $request)
    {
        Negeri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
