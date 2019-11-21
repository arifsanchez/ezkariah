<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMasjidRequest;
use App\Http\Requests\StoreMasjidRequest;
use App\Http\Requests\UpdateMasjidRequest;
use App\Masjid;
use App\Negeri;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MasjidController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('masjid_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $masjids = Masjid::all();

        return view('admin.masjids.index', compact('masjids'));
    }

    public function create()
    {
        abort_if(Gate::denies('masjid_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $negeris = Negeri::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.masjids.create', compact('negeris'));
    }

    public function store(StoreMasjidRequest $request)
    {
        $masjid = Masjid::create($request->all());

        return redirect()->route('admin.masjids.index');
    }

    public function edit(Masjid $masjid)
    {
        abort_if(Gate::denies('masjid_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $negeris = Negeri::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $masjid->load('negeri');

        return view('admin.masjids.edit', compact('negeris', 'masjid'));
    }

    public function update(UpdateMasjidRequest $request, Masjid $masjid)
    {
        $masjid->update($request->all());

        return redirect()->route('admin.masjids.index');
    }

    public function show(Masjid $masjid)
    {
        abort_if(Gate::denies('masjid_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $masjid->load('negeri');

        return view('admin.masjids.show', compact('masjid'));
    }

    public function destroy(Masjid $masjid)
    {
        abort_if(Gate::denies('masjid_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $masjid->delete();

        return back();
    }

    public function massDestroy(MassDestroyMasjidRequest $request)
    {
        Masjid::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
