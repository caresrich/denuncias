@extends('layouts.app')

@section('content')
<br>
<div>
    <div>
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <br>
                    <div class="ibox-content">
                        <div class="row">
                            <div style="font-size: 12px;" class="col-lg-12 col-md-6 col-sm-12">
                                <div style="background-color: #D5D8DC;" class="card  mb-3">
                                    <div class="card-header"><span class="float-right"><strong>FECHA DE INGRESO: </strong>{{ \Carbon\Carbon::parse($denuncia->fechaIngreso)->format('d/m/Y')}}</span></div>
                                    <div style="margin:5px;margin-top:10px" class="row">
                                        <div class="col-7 col-lg-12 col-md-7 col-sm-7">
                                            <strong>RADICATORIA: </strong><span> {{$denuncia->radicatoria}}</span> <span style="font-size: 12px;" class="float-right badge bg-light"><strong>RADICATORIA: </strong>{{$denuncia->distrito}}</span><br><br>
                                            <strong>N° DE REGISTRO: </strong><span> {{$denuncia->numeroRegistro}}</span><span style="font-size: 12px;" class="float-right badge bg-light"><strong>JUZGADO DICIPLINARIO: </strong>{{$denuncia->juzgadoDiciplinario}}</span><br><br>
                                            <span class="badge bg-light"><strong>DENUNCIANTE: </strong></span><span> {{$denuncia->denunciante}}</span><br><br>
                                            <span class="badge bg-dark"><strong>DENUNCIADO: </strong></span><span> {{$denuncia->denunciado}}</span><span class="float-right"><span class="badge bg-dark"><strong>CARGO DEL DENUNCIADO: </strong></span><span> {{$denuncia->cargoDenunciado}}</span></span><br><br>
                                            <span style="font-size: 12px;" class="badge bg-light"><strong>TIPO FALTA: </strong><span> {{$denuncia->falta->nombreFalta}}</span></span> <span style="font-size: 12px;" class="badge bg-light float-right"><strong>SANCION: </strong>{{$denuncia->sancion}}</span><br><br>
                                            <strong>FALTA QUE INCURRE: </strong><span> {{$denuncia->faltaIncurre}}</span><br><br>
                                            <strong>ESTADO ACTUAL: </strong><span> {{$denuncia->estadoActualDenuncia}}</span><br><br>
                                        </div>
                                    </div>
                                    <div style="margin:2px" class="row">
                                        <div class="col-7 col-lg-2 col-md-7 col-sm-7">
                                            <strong>1ra INSTANCIA: </strong><span> {{$denuncia->primeraInst}}</span><br><br>
                                        </div>
                                        <div class="col-7 col-lg-2 col-md-7 col-sm-7">
                                            <strong>2da INSTANCIA: </strong><span> {{$denuncia->segundaInst}}</span><br><br>
                                        </div>
                                        <div class="col-7 col-lg-3 col-md-7 col-sm-7">
                                            <strong>RESOLUCION 2da INSTANCIA: </strong><span> {{$denuncia->resolucionSegInst}}</span><br><br>
                                        </div>
                                        <div class="col-7 col-lg-5 col-md-7 col-sm-7">
                                            <strong>N° CUERPOS Y FOJAS: </strong><span> {{$denuncia->numeroCuerpoFojas}}</span><br><br>
                                        </div>
                                    </div>
                                    <div style="margin:2px" class="row">
                                        <div class="col-7 col-lg-4 col-md-7 col-sm-7">
                                            <strong>N° DE RESOLUCION: </strong><span> {{$denuncia->numeroResolucion}}</span><br><br>
                                        </div>
                                        <div class="col-7 col-lg-4 col-md-7 col-sm-7">
                                            <strong>FECHA DE DEVOLUCION: </strong><span> {{ \Carbon\Carbon::parse($denuncia->fechaDevolucion)->format('d/m/Y')}}</span><br><br>
                                        </div>
                                        <div class="col-7 col-lg-4 col-md-7 col-sm-7">
                                            <strong>PERSONAL QUE REGISTRA: </strong><span> {{$denuncia->personalRegistra}}</span><br><br>
                                        </div>
                                    </div>
                                    <div style="margin:2px" class="row">
                                        <div class="col-7 col-lg-12 col-md-7 col-sm-7">
                                            <span><strong>NOTA: </strong>{{$denuncia->obsDenuncia}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body text-dark">
                                    <hr>
                                    <strong>FECHA DE REGISTRO: </strong><span>{{ \Carbon\Carbon::parse($denuncia->created_at)->format('d/m/Y')}}</span>
                                    <div style="float: right;"><a title="Editar denuncia" href="{{ url('/editarDenunciaGet/'.$denuncia->idDenuncia) }}" type="button" class="btn btn-primary btn-sm" type="button">Editar Denuncia <i class="glyphicon glyphicon-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')


<script>
    function copyIdProductoForDisponibilidad(id) {
        $(document).ready(function() {
            $("#idProductoForDisponibilidad").val(id)
        });
    }

    $(document).ready(function() {
        $("#buscadorAutomovil").keyup(function() {
            var parametros = $(this).val();

            $.ajax({
                data: parametros,
                url: '{{ asset("/index.php/buscadorAutomovil")}}/' + parametros,
                type: 'get',
                success: function(response) {

                    $("#divCargaAutomoviles").html(response);


                },
                error: function(error) {
                    $.ajax({
                        data: parametros,
                        url: '{{ asset("/index.php/buscardorTodosAutomoviles")}}',
                        type: 'get',
                        success: function(response) {

                            $("#divCargaAutomoviles").html(response);


                        },
                        error: function(error) {
                            console.log(error);

                        }
                    });
                }
            });
        })
    });


    function EditarAudiencia(id) {
        url = '{{ asset("/index.php/editarAudiencia")}}/' + id;
        $.getJSON(url, null, function(data) {
            if (data.length > 0) {

                $.each(data, function(field, e) {
                    $('#idAudiencia').val(e.idAudiencia);
                    $('#fecha').val(e.fecha);
                    $('#idHora').val(e.idHora);
                    $('#detalle').val(e.detalle);
                });
                $("#editarAudiencia").modal('show');
            }
        });
    }
</script>

@endsection