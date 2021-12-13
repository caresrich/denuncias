@extends('layouts.app')

@section('content')
<div>
    <h4 class="modal-title">EDITANDO LA DENUNCIA CON CODIGO N° {{$denuncia->idDenuncia}}</h4>
    <div class="modal-body">

        <form class="form-horizontal" role="form" method="POST" action="{{url('editarDenunciaPost')}}" enctype="multipart/form-data" autocomplete="off">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <strong>FECHA DE INGRESO</strong> <strong style="color: red;">*</strong>
                    <input type="date" value="{{$denuncia->fechaIngreso}}" name="fechaIngreso" class='form-control' >
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <strong>RADICATORIA</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="{{$denuncia->radicatoria}}" name="radicatoria" class='form-control' >
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>DISTRITO</strong> <strong style="color: red;">*</strong>
                    <select name="distrito" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="LA PAZ" {{ ($denuncia->distrito=="LA PAZ") ? 'selected' : '' }} >LA PAZ</option>
                        <option value="ORURO" {{ ($denuncia->distrito=="ORURO") ? 'selected' : '' }} >ORURO</option>
                        <option value="POTOSI" {{ ($denuncia->distrito=="POTOSI") ? 'selected' : '' }} >POTOSI</option>
                        <option value="CHUQUISACA" {{ ($denuncia->distrito=="CHUQUISACA") ? 'selected' : '' }} >CHUQUISACA</option>
                        <option value="COCHABAMBA" {{ ($denuncia->distrito=="COCHABAMBA") ? 'selected' : '' }} >COCHABAMBA</option>
                        <option value="TARIJA" {{ ($denuncia->distrito=="TARIJA") ? 'selected' : '' }} >TARIJA</option>
                        <option value="BENI" {{ ($denuncia->distrito=="BENI") ? 'selected' : '' }} >BENI</option>
                        <option value="PANDO" {{ ($denuncia->distrito=="PANDO") ? 'selected' : '' }} >PANDO</option>
                        <option value="SANTA CRUZ" {{ ($denuncia->distrito=="SANTA CRUZ") ? 'selected' : '' }} >SANTA CRUZ</option>
                        <option value="Otro" {{ ($denuncia->distrito=="Otro") ? 'selected' : '' }} >Otro</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <strong>N° DE REGISTRO</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="{{$denuncia->numeroRegistro}}" name="numeroRegistro" class='form-control' >
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>JUZGADO DICIPLINARIO</strong> <strong style="color: red;">*</strong>
                    <select name="juzgadoDiciplinario" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="JUZGADO DICIPLINARIO 1" {{ ($denuncia->juzgadoDiciplinario=="JUZGADO DICIPLINARIO 1") ? 'selected' : '' }} >JUZGADO DICIPLINARIO 1</option>
                        <option value="JUZGADO DICIPLINARIO 2" {{ ($denuncia->juzgadoDiciplinario=="JUZGADO DICIPLINARIO 2") ? 'selected' : '' }} >JUZGADO DICIPLINARIO 2</option>
                        <option value="JUZGADO DICIPLINARIO 3" {{ ($denuncia->juzgadoDiciplinario=="JUZGADO DICIPLINARIO 3") ? 'selected' : '' }} >JUZGADO DICIPLINARIO 3</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <strong>DENUNCIANTE</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="{{$denuncia->denunciante}}" name="denunciante" class='form-control' >
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <strong>DENUNCIADO</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="{{$denuncia->denunciado}}" name="denunciado" class='form-control' >
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <strong>CARGO DENUNCIADO</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="{{$denuncia->cargoDenunciado}}" name="cargoDenunciado" class='form-control' >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>TIPO FALTA</strong> <strong style="color: red;">*</strong>
                    <select name="idFalta" class="form-control" required>
                        <option value="">Seleccionar...</option>
                        @foreach($faltas as $falta)
                        <option value="{{$falta->idFalta}}" {{ ($falta->idFalta==$denuncia->falta->idFalta) ? 'selected' : '' }}>{{$falta->nombreFalta}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>FALTA QUE INCURRE</strong> <strong style="color: red;">*</strong>
                    <select name="faltaIncurre" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="Numeral(1)" {{ ($denuncia->faltaIncurre=="Numeral(1)") ? 'selected' : '' }}>Numeral(1)</option>
                        <option value="Numeral(2)" {{ ($denuncia->faltaIncurre=="Numeral(2)") ? 'selected' : '' }}>Numeral(2)</option>
                        <option value="Numeral(3)" {{ ($denuncia->faltaIncurre=="Numeral(3)") ? 'selected' : '' }} >Numeral(3)</option>
                        <option value="Numeral(5)" {{ ($denuncia->faltaIncurre=="Numeral(4)") ? 'selected' : '' }} >Numeral(4)</option>
                        <option value="Numeral(4)" {{ ($denuncia->faltaIncurre=="Numeral(5)") ? 'selected' : '' }} >Numeral(5)</option>
                        <option value="Numeral(6)" {{ ($denuncia->faltaIncurre=="Numeral(6)") ? 'selected' : '' }} >Numeral(6)</option>
                        <option value="Numeral(7)" {{ ($denuncia->faltaIncurre=="Numeral(7)") ? 'selected' : '' }} >Numeral(7)</option>
                        <option value="Numeral(8)" {{ ($denuncia->faltaIncurre=="Numeral(8)") ? 'selected' : '' }} >Numeral(8)</option>
                        <option value="Numeral(9)" {{ ($denuncia->faltaIncurre=="Numeral(9)") ? 'selected' : '' }} >Numeral(9)</option>
                        <option value="Numeral(10)" {{ ($denuncia->faltaIncurre=="Numeral(10)") ? 'selected' : '' }} >Numeral(10)</option>
                        <option value="Numeral(11)" {{ ($denuncia->faltaIncurre=="Numeral(11)") ? 'selected' : '' }} >Numeral(11)</option>
                        <option value="Numeral(12)" {{ ($denuncia->faltaIncurre=="Numeral(12)") ? 'selected' : '' }} >Numeral(12)</option>
                        <option value="Numeral(13)" {{ ($denuncia->faltaIncurre=="Numeral(13)") ? 'selected' : '' }} >Numeral(13)</option>
                        <option value="Numeral(14)" {{ ($denuncia->faltaIncurre=="Numeral(14)") ? 'selected' : '' }} >Numeral(14)</option>
                        <option value="Numeral(15)" {{ ($denuncia->faltaIncurre=="Numeral(15)") ? 'selected' : '' }} >Numeral(15)</option>
                        <option value="Numeral(16)" {{ ($denuncia->faltaIncurre=="Numeral(16)") ? 'selected' : '' }} >Numeral(16)</option>
                        <option value="Numeral(17)" {{ ($denuncia->faltaIncurre=="Numeral(17)") ? 'selected' : '' }} >Numeral(17)</option>
                        <option value="Numeral(18)" {{ ($denuncia->faltaIncurre=="Numeral(18)") ? 'selected' : '' }} >Numeral(18)</option>
                        <option value="Numeral(19)" {{ ($denuncia->faltaIncurre=="Numeral(19)") ? 'selected' : '' }} >Numeral(19)</option>
                        <option value="Numeral(20)" {{ ($denuncia->faltaIncurre=="Numeral(20)") ? 'selected' : '' }} >Numeral(20)</option>
                        <option value="Numeral(21)" {{ ($denuncia->faltaIncurre=="Numeral(21)") ? 'selected' : '' }} >Numeral(21)</option>
                        <option value="Numeral(22)" {{ ($denuncia->faltaIncurre=="Numeral(22)") ? 'selected' : '' }} >Numeral(22)</option>
                        <option value="Otro" {{ ($denuncia->faltaIncurre=="Otro") ? 'selected' : '' }} >Otro</option>
                    </select>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <strong>SANCION</strong> <strong style="color: red;">*</strong>
                    <select name="sancion" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="Amonestación escrita" {{ ($denuncia->sancion=="Amonestación escrita") ? 'selected' : '' }} >Amonestación escrita</option>
                        <option value="Multa del veinte por ciento (20%) del haber de un mes" {{ ($denuncia->sancion=="Multa del veinte por ciento (20%) del haber de un mes") ? 'selected' : '' }} >Multa del veinte por ciento (20%) del haber de un mes</option>
                        <option value="Suspensión del ejercicio de sus funciones de un mes, sin goce de haber" {{ ($denuncia->sancion=="Suspensión del ejercicio de sus funciones de un mes, sin goce de haber") ? 'selected' : '' }} >Suspensión del ejercicio de sus funciones de un mes, sin goce de haber</option>
                        <option value="Suspensión del ejercicio de sus funciones de dos meses, sin goce de haberes" {{ ($denuncia->sancion=="Suspensión del ejercicio de sus funciones de dos meses, sin goce de haberes") ? 'selected' : '' }} >Suspensión del ejercicio de sus funciones de dos meses, sin goce de haberes</option>
                        <option value="Suspensión del ejercicio de sus funciones de tres meses, sin goce de haberes" {{ ($denuncia->sancion=="Suspensión del ejercicio de sus funciones de tres meses, sin goce de haberes") ? 'selected' : '' }} >Suspensión del ejercicio de sus funciones de tres meses, sin goce de haberes</option>
                        <option value="Suspensión del ejercicio de sus funciones de cuatro meses, sin goce de haberes" {{ ($denuncia->sancion=="Suspensión del ejercicio de sus funciones de cuatro meses, sin goce de haberes") ? 'selected' : '' }} >Suspensión del ejercicio de sus funciones de cuatro meses, sin goce de haberes</option>
                        <option value="Suspensión del ejercicio de sus funciones de cinco meses, sin goce de haberes" {{ ($denuncia->sancion=="Suspensión del ejercicio de sus funciones de cinco meses, sin goce de haberes") ? 'selected' : '' }} >Suspensión del ejercicio de sus funciones de cinco meses, sin goce de haberes</option>
                        <option value="Suspensión del ejercicio de sus funciones de seis meses, sin goce de haberes" {{ ($denuncia->sancion=="Suspensión del ejercicio de sus funciones de seis meses, sin goce de haberes") ? 'selected' : '' }} >Suspensión del ejercicio de sus funciones de seis meses, sin goce de haberes</option>
                        <option value="Destitución del Cargo" {{ ($denuncia->sancion=="Destitución del Cargo") ? 'selected' : '' }} >Destitución del Cargo</option>
                        <option value="Otro" {{ ($denuncia->sancion=="Otro") ? 'selected' : '' }} >Otro</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <strong>ESTADO ACTUAL DE LA DENUNCIA</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="{{$denuncia->estadoActualDenuncia}}" name="estadoActualDenuncia" class='form-control' >
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <strong>1ra INSTANCIA</strong> <strong style="color: red;">*</strong>
                    <select name="primeraInst" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="SI" {{ ($denuncia->primeraInst=="SI") ? 'selected' : '' }} >SI</option>
                        <option value="NO" {{ ($denuncia->primeraInst=="NO") ? 'selected' : '' }} >NO</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <strong>2da INSTANCIA</strong> <strong style="color: red;">*</strong>
                    <select name="segundaInst" class="form-control" >
                        <option value="">Seleccionar...</option>
                        <option value="SI" {{ ($denuncia->segundaInst=="SI") ? 'selected' : '' }} >SI</option>
                        <option value="NO" {{ ($denuncia->segundaInst=="NO") ? 'selected' : '' }} >NO</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>RESOLUCION 2da INSTANCIA</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="{{$denuncia->resolucionSegInst}}" name="resolucionSegInst" class='form-control' >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>N° DE RESOLUCION</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="{{$denuncia->numeroResolucion}}" name="numeroResolucion" class='form-control' >
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>N° DE CUERPO Y FOJAS</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="{{$denuncia->numeroCuerpoFojas}}" name="numeroCuerpoFojas" class='form-control' >
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>FECHA DE DEVOLUCION</strong> <strong style="color: red;">*</strong>
                    <input type="date" value="{{$denuncia->fechaDevolucion}}" name="fechaDevolucion" class='form-control' >
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <strong>PERSONAL QUE REGISTRA</strong> <strong style="color: red;">*</strong>
                    <input type="text" value="{{$denuncia->personalRegistra}}" name="personalRegistra" class='form-control' >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <strong>NOTA</strong>
                    <textarea type="text" name="obsDenuncia" class='form-control'>{{$denuncia->obsDenuncia}}</textarea>
                </div>
                <input name="idDenuncia" value="{{$denuncia->idDenuncia}}" hidden type="text">
            </div>
            <br>
            <input style="float: right;" type="submit" name="ejecutar" class='btn btn-primary' value="Guardar">

        </form>
    </div>
</div>
@endsection

@section('js')
<script>
</script>
@endsection