<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJenisPengenalanDiriRequest;
use App\Http\Requests\StoreJenisPengenalanDiriRequest;
use App\Http\Requests\UpdateJenisPengenalanDiriRequest;
use App\JenisPengenalanDiri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JenisPengenalanDiriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jenis_pengenalan_diri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenisPengenalanDiris = JenisPengenalanDiri::all();

        return view('admin.jenisPengenalanDiris.index', compact('jenisPengenalanDiris'));
    }

    public function create()
    {
        abort_if(Gate::denies('jenis_pengenalan_diri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenisPengenalanDiris.create');
    }

    public function store(StoreJenisPengenalanDiriRequest $request)
    {
        $jenisPengenalanDiri = JenisPengenalanDiri::create($request->all());

        return redirect()->route('admin.jenis-pengenalan-diris.index');
    }

    public function edit(JenisPengenalanDiri $jenisPengenalanDiri)
    {
        abort_if(Gate::denies('jenis_pengenalan_diri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jenisPengenalanDiris.edit', compact('jenisPengenalanDiri'));
    }

    public function update(UpdateJenisPengenalanDiriRequest $request, JenisPengenalanDiri $jenisPengenalanDiri)
    {
        $jenisPengenalanDiri->update($request->all());

        return redirect()->route('admin.jenis-pengenalan-diris.index');
    }

    public function destroy(JenisPengenalanDiri $jenisPengenalanDiri)
    {
        abort_if(Gate::denies('jenis_pengenalan_diri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jenisPengenalanDiri->delete();

        return back();
    }

    public function massDestroy(MassDestroyJenisPengenalanDiriRequest $request)
    {
        JenisPengenalanDiri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
