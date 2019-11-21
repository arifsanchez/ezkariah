<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJantinaRequest;
use App\Http\Requests\StoreJantinaRequest;
use App\Http\Requests\UpdateJantinaRequest;
use App\Jantina;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JantinaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jantina_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jantinas = Jantina::all();

        return view('admin.jantinas.index', compact('jantinas'));
    }

    public function create()
    {
        abort_if(Gate::denies('jantina_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jantinas.create');
    }

    public function store(StoreJantinaRequest $request)
    {
        $jantina = Jantina::create($request->all());

        return redirect()->route('admin.jantinas.index');
    }

    public function edit(Jantina $jantina)
    {
        abort_if(Gate::denies('jantina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jantinas.edit', compact('jantina'));
    }

    public function update(UpdateJantinaRequest $request, Jantina $jantina)
    {
        $jantina->update($request->all());

        return redirect()->route('admin.jantinas.index');
    }

    public function destroy(Jantina $jantina)
    {
        abort_if(Gate::denies('jantina_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jantina->delete();

        return back();
    }

    public function massDestroy(MassDestroyJantinaRequest $request)
    {
        Jantina::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
