@extends('layouts.app')

@section('content')
<div>
    <span class="modal-title"><strong>REPORTES POR FECHA DE INGRESO</strong></span>
    <div class="modal-body">
        <div  class="row">
            <div style="border:solid 1px;padding:10px;border-radius:10px" class="col-lg-8 col-md-6 col-sm-12">
                <form class="form-horizontal" role="form" method="GET" action="{{url('reportePdfFechaIngreso')}}" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <strong>FECHA INICIO</strong> <strong style="color: red;">*</strong>
                            <input type="date" name="fechaInicio" class='form-control' required>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <strong>FECHA FINAL</strong> <strong style="color: red;">*</strong>
                            <input type="date" name="fechaFinal" class='form-control' required>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <input style="margin-top: 20px;" type="submit" name="ejecutar" class='btn btn-danger' value="Generar">
                        </div>
                    </div>
                </form>
            </div>
            <div  class="col-lg-1 col-md-6 col-sm-12">
            </div>
            <div style="border:solid 1px;padding:10px;border-radius:10px" class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{url('reportePdfGeneral')}}" style="margin-top: 20px;" class='btn btn-success'>Generar todas las denuncias</a>
            </div>
        </div>
    </div>
</div>
@endsection