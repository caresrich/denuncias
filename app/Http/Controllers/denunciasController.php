<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\Falta;
use Illuminate\Http\Request;

class denunciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllDenuncias()
    {
        $cantidad = Denuncia::All()->count();
        $denuncias = Denuncia::OrderBy('idDenuncia', 'DESC')->get();
        return view('Denuncias.listaDenuncias', compact('denuncias', 'cantidad'));
    }

    public function createDenunciaGet()
    {
        $faltas = Falta::all();
        return view('Denuncias.newDenuncia', compact('faltas'));
    }

    public function createDenunciaPost(Request $request)
    {
        $denuncia = new Denuncia();
        $denuncia->fechaIngreso = $request->fechaIngreso;
        $denuncia->radicatoria = $request->radicatoria;
        $denuncia->distrito = $request->distrito;
        $denuncia->numeroRegistro = $request->numeroRegistro;
        $denuncia->juzgadoDiciplinario = $request->juzgadoDiciplinario;
        $denuncia->denunciante = $request->denunciante;
        $denuncia->denunciado = $request->denunciado;
        $denuncia->cargoDenunciado = $request->cargoDenunciado;
        $denuncia->faltaIncurre = $request->faltaIncurre;
        $denuncia->sancion = $request->sancion;
        $denuncia->estadoActualDenuncia = $request->estadoActualDenuncia;
        $denuncia->primeraInst = $request->primeraInst;
        $denuncia->segundaInst = $request->segundaInst;
        $denuncia->resolucionSegInst = $request->resolucionSegInst;
        $denuncia->numeroResolucion = $request->numeroResolucion;
        $denuncia->numeroCuerpoFojas = $request->numeroCuerpoFojas;
        $denuncia->fechaDevolucion = $request->fechaDevolucion;
        $denuncia->personalRegistra = $request->personalRegistra;
        $denuncia->obsDenuncia = $request->obsDenuncia;
        $denuncia->estadoDenuncia = true;
        $denuncia->idFalta = $request->idFalta;

        $denuncia->save();

        return redirect('getAllDenuncias');
    }

    public function detalleDenuncia($id)
    {
        $denuncia = Denuncia::find($id);
        return view('Denuncias.detalleDenuncia', compact('denuncia'));
    }

    public function editarDenunciaGet($id)
    {
        $faltas=Falta::all();
        $denuncia = Denuncia::find($id);
        return view('Denuncias.editarDenuncia', compact('denuncia','faltas'));
    }

    public function editarDenunciaPost(Request $request)
    {
        Denuncia::find($request->idDenuncia)->update($request->all());
        return redirect('getAllDenuncias')->with('success', 'Denuncia actualizada satisfactoriamente');
    }

    public function buscarDenuncia(Request $request)
    {
        $valor=$request->radicatoria;
        $cantidad=Denuncia::all()->count();
        $denuncias = Denuncia::where('radicatoria', 'LIKE', "$valor%")->take(12)->get();
        return view('Denuncias.listaDenuncias',compact('denuncias','cantidad'));
    }
}
