@extends('layouts.app')

@section('content')
<div>
    <span class="modal-title"><strong>REPORTES POR TIPO DE FALTA</strong></span>
    <div class="modal-body">
        <div class="row">
            <div style="border:solid 1px;padding:10px;border-radius:10px" class="col-lg-8 col-md-6 col-sm-12">
                <form class="form-horizontal" role="form" method="GET" action="{{url('reportePdfFechaFalta')}}" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <strong>FECHA INICIO</strong> <strong style="color: red;">*</strong>
                            <input type="date" name="fechaInicio" class='form-control' required>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <strong>FECHA FINAL</strong> <strong style="color: red;">*</strong>
                            <input type="date" name="fechaFinal" class='form-control' required>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <strong>TIPO FALTA</strong> <strong style="color: red;">*</strong>
                            <select name="idFalta" class="form-control" required>
                                <option value="">Seleccionar...</option>
                                @foreach($faltas as $falta)
                                <option value="{{$falta->idFalta}}">{{$falta->nombreFalta}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <input style="margin-top: 20px;" type="submit" name="ejecutar" class='btn btn-danger' value="Generar">
                        </div>
                    </div>
                </form>
            </div>

            <div style="border:solid 1px;padding:10px;border-radius:10px" class="col-lg-4 col-md-6 col-sm-12">
                <form class="form-horizontal" role="form" method="GET" action="{{url('reportePdfAllFalta')}}" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <strong>TIPO FALTA</strong> <strong style="color: red;">*</strong>
                            <select name="idFalta" class="form-control" required>
                                <option value="">Seleccionar...</option>
                                @foreach($faltas as $falta)
                                <option value="{{$falta->idFalta}}">{{$falta->nombreFalta}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <input style="margin-top: 20px;" type="submit" name="ejecutar" class='btn btn-success' value="Generar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection