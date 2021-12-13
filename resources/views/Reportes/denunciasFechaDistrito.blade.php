<img style="height:80px;width:120px" src="{{asset('assets/welcome/images/logo_magistratura.png')}}" alt="...">
<h3 style="text-align: center;margin-top:-60px">REGIMEN DICIPLINARIO</h3>
<h3 style="text-align: center;">REPORTE DE DENUNCIAS POR DISTRITO</h3>
<span><strong>Denuncias ingresadas desde el : </strong>{{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y')}}</span>
<span><strong>al : </strong>{{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y')}}</span><span style="float: right;"> <strong>Distrito:</strong> {{$distrito}} </span><br>
<span><strong>Cantidad de denuncias: </strong>{{$cantidad}}</span>
<span style="float: right;"> <strong>Fecha de reporte:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y')}} </span>

<table border="1" style="font-size: 10px;border-collapse: collapse;margin-top:10px">
    <tr style="background-color: lightgrey;">
        <th>FECHA DE INGRESO</th>
        <th>RADICATORIA</th>
        <th>DISTRITO</th>
        <th>N° REGISTRO</th>
        <th>DENUNCIANTE</th>
        <th>DENUNCIADO</th>
        <th>CARGO</th>
        <th>TIPO FALTA</th>
        <th>ESTADO DE LA DENUNCIA</th>
        <th>RESOLUCION 2da INST.</th>
        <th>N° RESOLUCION</th>
        <th>FECHA DE DEVOLUCION</th>
    </tr>
    @foreach($denuncias as $denuncia)
    <tr>
        <td>{{ \Carbon\Carbon::parse($denuncia->fechaIngreso)->format('d/m/Y')}}</td>
        <td>{{$denuncia->radicatoria}}</td>
        <td>{{$denuncia->distrito}}</td>
        <td>{{$denuncia->numeroRegistro}}</td>
        <td>{{$denuncia->denunciante}}</td>
        <td>{{$denuncia->denunciado}}</td>
        <td>{{$denuncia->cargoDenunciado}}</td>
        <td>{{$denuncia->falta->nombreFalta}}</td>
        <td>{{$denuncia->estadoActualDenuncia}}</td>
        <td>{{$denuncia->resolucionSegInst}}</td>
        <td>{{$denuncia->numeroResolucion}}</td>
        <td>{{ \Carbon\Carbon::parse($denuncia->fechaDevolucion)->format('d/m/Y')}}</td>
    </tr>
    @endforeach
</table>