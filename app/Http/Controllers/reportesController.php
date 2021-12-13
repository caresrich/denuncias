<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\Falta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class reportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reporteGeneral()
    {
        return view('Reportes.reporteGeneral');
    }

    public function reportePdfFechaIngreso(Request $request)
    {
        $fechaInicio=$request->fechaInicio . " 00:00:00";
        $fechaFin=$request->fechaFinal . " 23:59:59";
        $denuncias=Denuncia::whereBetween('fechaIngreso', [$fechaInicio, $fechaFin])->where('estadoDenuncia',true)->get();
        $cantidad=$denuncias->count();
        $pdf = PDF::loadView('Reportes.denunciasFechaIngreso', compact("denuncias","cantidad","fechaInicio","fechaFin"));
        return $pdf->setPaper('a4', 'landscape')->stream('denunciasFechaIngreso.pdf');
    }

    public function reportePdfGeneral()
    {
        $denuncias = Denuncia::all();
        $cantidad = Denuncia::all()->count();
        if ($denuncias) {
            $pdf = PDF::loadView("Reportes.denunciasPdf", compact("denuncias",'cantidad'));
            return $pdf->setPaper('a4', 'landscape')->stream('denuniasGeneral.pdf');
        }
    }

    //por distrito
    public function reporteDistrito()
    {
        return view('Reportes.reporteDistrito');
    }

    public function reportePdfFechaDistrito(Request $request)
    {
        $fechaInicio=$request->fechaInicio . " 00:00:00";
        $fechaFin=$request->fechaFinal . " 23:59:59";
        $distrito=$request->distrito;
        $denuncias=Denuncia::whereBetween('fechaIngreso', [$fechaInicio, $fechaFin])->where('distrito',$distrito)->where('estadoDenuncia',true)->get();
        $cantidad=$denuncias->count();
        $pdf = PDF::loadView('Reportes.denunciasFechaDistrito', compact("denuncias","cantidad","fechaInicio","fechaFin",'distrito'));
        return $pdf->setPaper('a4', 'landscape')->stream('denunciasFechaDistrito.pdf');
    }

    public function reportePdfAllDistrito(Request $request)
    {
        $distrito=$request->distrito;
        $denuncias = Denuncia::where('distrito',$distrito)->get();
        $cantidad = $denuncias->count();
        if ($denuncias) {
            $pdf = PDF::loadView("Reportes.denunciasPdfAllDistrito", compact("denuncias",'cantidad','distrito'));
            return $pdf->setPaper('a4', 'landscape')->stream('denuniasGeneralDistrito.pdf');
        }
    }

    //reportes por falta
    public function reporteFalta()
    {
        $faltas=Falta::all();
        return view('Reportes.reporteFalta',compact('faltas'));
    }

    public function reportePdfFechaFalta(Request $request)
    {
        $idFalta=$request->idFalta;
        $falta=Falta::find($request->idFalta);
        $fechaInicio=$request->fechaInicio . " 00:00:00";
        $fechaFin=$request->fechaFinal . " 23:59:59";
        $denuncias=Denuncia::whereBetween('fechaIngreso', [$fechaInicio, $fechaFin])->where('idFalta',$idFalta)->where('estadoDenuncia',true)->get();
        $cantidad=$denuncias->count();
        $pdf = PDF::loadView('Reportes.denunciasFechaFalta', compact("denuncias","cantidad","fechaInicio","fechaFin",'falta'));
        return $pdf->setPaper('a4', 'landscape')->stream('denunciasFechaFalta.pdf');
    }

    public function reportePdfAllFalta(Request $request)
    {
        $falta=Falta::find($request->idFalta);
        $denuncias = Denuncia::where('idFalta',$request->idFalta)->get();
        $cantidad = $denuncias->count();
        if ($denuncias) {
            $pdf = PDF::loadView("Reportes.denunciasPdfAllFaltas", compact("denuncias",'cantidad','falta'));
            return $pdf->setPaper('a4', 'landscape')->stream('denuniasFalta.pdf');
        }
    }
}
