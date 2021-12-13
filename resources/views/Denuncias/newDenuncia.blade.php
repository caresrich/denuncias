@extends('layouts.app')

@section('content')
<div>
    <h4 class="modal-title">NUEVA DENUNCIA</h4>
    <div class="modal-body">

        <form class="form-horizontal" role="form" method="POST" action="{{('createDenunciaPost')}}" enctype="multipart/form-data" autocomplete="off">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <strong>FECHA DE INGRESO</strong> <strong style="color: red;">*</strong>
                    <input type="date" name="fechaIngreso" class='form-control' >
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <strong>RADICATORIA</strong> <strong style="color: red;">*</strong>
                    <input type="text" name="radicatoria" class='form-control' >
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>DISTRITO</strong> <strong style="color: red;">*</strong>
                    <select name="distrito" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="LA PAZ">LA PAZ</option>
                        <option value="ORURO">ORURO</option>
                        <option value="POTOSI">POTOSI</option>
                        <option value="CHUQUISACA">CHUQUISACA</option>
                        <option value="COCHABAMBA">COCHABAMBA</option>
                        <option value="TARIJA">TARIJA</option>
                        <option value="BENI">BENI</option>
                        <option value="PANDO">PANDO</option>
                        <option value="SANTA CRUZ">SANTA CRUZ</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <strong>N° DE REGISTRO</strong> <strong style="color: red;">*</strong>
                    <input type="text" name="numeroRegistro" class='form-control' >
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>JUZGADO DICIPLINARIO</strong> <strong style="color: red;">*</strong>
                    <select name="juzgadoDiciplinario" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="JUZGADO DICIPLINARIO 1">JUZGADO DICIPLINARIO 1</option>
                        <option value="JUZGADO DICIPLINARIO 2">JUZGADO DICIPLINARIO 2</option>
                        <option value="JUZGADO DICIPLINARIO 3">JUZGADO DICIPLINARIO 3</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <strong>DENUNCIANTE</strong> <strong style="color: red;">*</strong>
                    <input type="text" name="denunciante" class='form-control' >
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <strong>DENUNCIADO</strong> <strong style="color: red;">*</strong>
                    <input type="text" name="denunciado" class='form-control' >
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <strong>CARGO DENUNCIADO</strong> <strong style="color: red;">*</strong>
                    <input type="text" name="cargoDenunciado" class='form-control' >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>TIPO FALTA</strong> <strong style="color: red;">*</strong>
                    <select name="idFalta" class="form-control" required>
                        <option value="">Seleccionar...</option>
                        @foreach($faltas as $falta)
                        <option value="{{$falta->idFalta}}">{{$falta->nombreFalta}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>FALTA QUE INCURRE</strong> <strong style="color: red;">*</strong>
                    <select name="faltaIncurre" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="Numeral(1)">Numeral(1)</option>
                        <option value="Numeral(2)">Numeral(2)</option>
                        <option value="Numeral(3)">Numeral(3)</option>
                        <option value="Numeral(4)">Numeral(4)</option>
                        <option value="Numeral(5)">Numeral(5)</option>
                        <option value="Numeral(6)">Numeral(6)</option>
                        <option value="Numeral(7)">Numeral(7)</option>
                        <option value="Numeral(8)">Numeral(8)</option>
                        <option value="Numeral(9)">Numeral(9)</option>
                        <option value="Numeral(10)">Numeral(10)</option>
                        <option value="Numeral(11)">Numeral(11)</option>
                        <option value="Numeral(12)">Numeral(12)</option>
                        <option value="Numeral(13)">Numeral(13)</option>
                        <option value="Numeral(14)">Numeral(14)</option>
                        <option value="Numeral(15)">Numeral(15)</option>
                        <option value="Numeral(16)">Numeral(16)</option>
                        <option value="Numeral(17)">Numeral(17)</option>
                        <option value="Numeral(18)">Numeral(18)</option>
                        <option value="Numeral(19)">Numeral(19)</option>
                        <option value="Numeral(20)">Numeral(20)</option>
                        <option value="Numeral(21)">Numeral(21)</option>
                        <option value="Numeral(22)">Numeral(22)</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <strong>SANCION</strong> <strong style="color: red;">*</strong>
                    <select name="sancion" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="Amonestación escrita">Amonestación escrita</option>
                        <option value="Multa del veinte por ciento (20%) del haber de un mes">Multa del veinte por ciento (20%) del haber de un mes</option>
                        <option value="Suspensión del ejercicio de sus funciones de un mes, sin goce de haber">Suspensión del ejercicio de sus funciones de un mes, sin goce de haber</option>
                        <option value="Suspensión del ejercicio de sus funciones de dos meses, sin goce de haberes">Suspensión del ejercicio de sus funciones de dos meses, sin goce de haberes</option>
                        <option value="Suspensión del ejercicio de sus funciones de tres meses, sin goce de haberes">Suspensión del ejercicio de sus funciones de tres meses, sin goce de haberes</option>
                        <option value="Suspensión del ejercicio de sus funciones de cuatro meses, sin goce de haberes">Suspensión del ejercicio de sus funciones de cuatro meses, sin goce de haberes</option>
                        <option value="Suspensión del ejercicio de sus funciones de cinco meses, sin goce de haberes">Suspensión del ejercicio de sus funciones de cinco meses, sin goce de haberes</option>
                        <option value="Suspensión del ejercicio de sus funciones de seis meses, sin goce de haberes">Suspensión del ejercicio de sus funciones de seis meses, sin goce de haberes</option>
                        <option value="Destitución del Cargo">Destitución del Cargo</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <strong>ESTADO ACTUAL DE LA DENUNCIA</strong> <strong style="color: red;">*</strong>
                    <input type="text" name="estadoActualDenuncia" class='form-control' >
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <strong>1ra INSTANCIA</strong> <strong style="color: red;">*</strong>
                    <select name="primeraInst" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <strong>2da INSTANCIA</strong> <strong style="color: red;">*</strong>
                    <select name="segundaInst" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>RESOLUCION 2da INSTANCIA</strong> <strong style="color: red;">*</strong>
                    <input type="text" name="resolucionSegInst" class='form-control' >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>N° DE RESOLUCION</strong> <strong style="color: red;">*</strong>
                    <input type="text" name="numeroResolucion" class='form-control' >
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>N° DE CUERPO Y FOJAS</strong> <strong style="color: red;">*</strong>
                    <input type="text" name="numeroCuerpoFojas" class='form-control' >
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>FECHA DE DEVOLUCION</strong> <strong style="color: red;">*</strong>
                    <input type="date" name="fechaDevolucion" class='form-control' >
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>PERSONAL QUE REGISTRA</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="Julia Paredes" name="personalRegistra" class='form-control' >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <strong>NOTA</strong>
                    <textarea type="text" name="obsDenuncia" class='form-control'>Ninguna</textarea>
                </div>
            </div>
            <br>
            <input style="float: right;" type="submit" name="ejecutar" class='btn btn-success' value="Registrar">

        </form>
    </div>
</div>
@endsection

@section('js')
<script>
</script>
@endsection