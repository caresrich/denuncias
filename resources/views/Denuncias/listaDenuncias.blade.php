@extends('layouts.app')

@section('ruta')


<h2>DENUNCIAS</h2>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-info">
    {{Session::get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@endsection

@section('content')
<br>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-lg-8">
                            <a href="{{'createDenunciaGet'}}" class="config"><button class='btn btn-primary dim'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Denuncia</button></a>

                            <button type="button" class="btn btn-secondary">
                                <span id="total" class="badge bg-warning">{{$cantidad}}</span> Denuncias registradas
                            </button>
                         </div>
                        <div class="col-lg-4">
                            <form action="{{url('buscarDenuncia')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="radicatoria" placeholder="Buscar por radicatoria">
                                    <div class="input-group-btn">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div id="divCargaAutomoviles" class="ibox-content">

                        <div class="row">
                            @foreach($denuncias as $denuncia)
                            <div style="font-size: 10px;" class="col-lg-4 col-md-6 col-sm-12">
                                <div style="background-color: #D5D8DC;" class="card  mb-3">
                                    <div class="card-header"><span style="font-size: 12px;border:solid 1px;border-radius:5px;padding:2px"><strong>{{$denuncia->radicatoria}}</strong></span> <span class="float-right"><strong>FECHA DE INGRESO: </strong>{{ \Carbon\Carbon::parse($denuncia->fechaIngreso)->format('d/m/Y')}}</span></div>
                                    <div style="margin:2px" class="row">
                                        <div class="col-7 col-lg-12 col-md-7 col-sm-7">
                                            <span style="font-size: 11px;" class="float-right badge bg-light"><strong>{{$denuncia->distrito}}</strong></span>
                                            <strong>N° DE REGISTRO: </strong><span> {{$denuncia->numeroRegistro}}</span><br>
                                            <span style="font-size: 11px;" class="badge bg-light"><strong>DENUNCIANTE: </strong></span><span> {{$denuncia->denunciante}}</span><br>
                                            <span style="font-size: 11px;" class="badge bg-dark"><strong>DENUNCIADO: </strong></span><span> {{$denuncia->denunciado}}</span><br>
                                            <span style="font-size: 11px;" class="badge bg-light"><strong>TIPO FALTA: </strong><span> {{$denuncia->falta->nombreFalta}}</span></span><br>
                                            <strong>ESTADO ACTUAL: </strong><span> {{$denuncia->estadoActualDenuncia}}</span>
                                        </div>
                                    </div>

                                    <div class="card-body text-dark">
                                        <hr>
                                        <strong>FECHA DE REGISTRO: </strong><span>{{ \Carbon\Carbon::parse($denuncia->created_at)->format('d/m/Y')}}</span>
                                        <div style="float: right;">
                                            <a title="Detalle de la denuncia" href="{{ url('/detalleDenuncia/'.$denuncia->idDenuncia) }}" type="button" class="btn btn-success btn-sm" type="button" id="{{$denuncia->idAutomovil}}"><i class="glyphicon glyphicon-list-alt"></i></a>
                                            <a title="Editar denuncia" href="{{ url('/editarDenunciaGet/'.$denuncia->idDenuncia) }}" type="button" class="btn btn-primary btn-sm" type="button"><i class="glyphicon glyphicon-pencil"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')

<!-- Modal para cambiar la disponibilidad-->
<div class="modal fade" id="modalDisponibilidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">RESTAURANT LA ESQUINA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta Seguro de Cambiar la Disponibilidad?.
            </div>
            <div class="modal-footer">
                <form class="form-horizontal" role="form" method="POST" action="{{url('cambiarDisponibilidad')}}" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <input hidden id="idProductoForDisponibilidad" name="idProducto">
                        </div>
                        <div class="col-lg-3">
                            <button style="float: right;" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                        <div class="col-lg-3">
                            <input style="float: right;" type="submit" name="ejecutar" class='btn btn-primary' value="Si">
                        </div>
                    </div>
                </form>

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