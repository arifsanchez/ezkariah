<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProfilAhliRequest;
use App\Http\Requests\StoreProfilAhliRequest;
use App\Http\Requests\UpdateProfilAhliRequest;
use App\Jantina;
use App\JenisPengenalanDiri;
use App\ProfilAhli;
use App\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProfilAhliController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ProfilAhli::with(['ictype', 'jantina', 'team'])->select(sprintf('%s.*', (new ProfilAhli)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'profil_ahli_show';
                $editGate      = 'profil_ahli_edit';
                $deleteGate    = 'profil_ahli_delete';
                $crudRoutePart = 'profil-ahlis';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('nama_penuh', function ($row) {
                return $row->nama_penuh ? $row->nama_penuh : "";
            });
            $table->editColumn('no_kad_pengenalan', function ($row) {
                return $row->no_kad_pengenalan ? $row->no_kad_pengenalan : "";
            });
            $table->addColumn('ictype_nama', function ($row) {
                return $row->ictype ? $row->ictype->nama : '';
            });

            $table->addColumn('jantina_nama', function ($row) {
                return $row->jantina ? $row->jantina->nama : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'ictype', 'jantina']);

            return $table->make(true);
        }

        return view('admin.profilAhlis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('profil_ahli_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ictypes = JenisPengenalanDiri::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jantinas = Jantina::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.profilAhlis.create', compact('ictypes', 'jantinas'));
    }

    public function store(StoreProfilAhliRequest $request)
    {
        $profilAhli = ProfilAhli::create($request->all());

        return redirect()->route('admin.profil-ahlis.index');
    }

    public function edit(ProfilAhli $profilAhli)
    {
        abort_if(Gate::denies('profil_ahli_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ictypes = JenisPengenalanDiri::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jantinas = Jantina::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profilAhli->load('ictype', 'jantina', 'team');

        return view('admin.profilAhlis.edit', compact('ictypes', 'jantinas', 'teams', 'profilAhli'));
    }

    public function update(UpdateProfilAhliRequest $request, ProfilAhli $profilAhli)
    {
        $profilAhli->update($request->all());

        return redirect()->route('admin.profil-ahlis.index');
    }

    public function show(ProfilAhli $profilAhli)
    {
        abort_if(Gate::denies('profil_ahli_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profilAhli->load('ictype', 'jantina', 'team');

        return view('admin.profilAhlis.show', compact('profilAhli'));
    }

    public function destroy(ProfilAhli $profilAhli)
    {
        abort_if(Gate::denies('profil_ahli_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profilAhli->delete();

        return back();
    }

    public function massDestroy(MassDestroyProfilAhliRequest $request)
    {
        ProfilAhli::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
