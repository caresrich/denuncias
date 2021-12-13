<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $primaryKey = 'idDenuncia';
    protected $table = 'denuncias';
    protected $fillable = array('fechaIngreso', 'radicatoria', 'distrito', 'numeroRegistro', 'juzgadoDiciplinario','denunciante','denunciado','cargoDenunciado','faltaIncurre', 'sancion', 'estadoActualDenuncia', 'primeraInst', 'segundaInst', 'resolucionSegInst', 'numeroResolucion','numeroCuerpoFojas','fechaDevolucion', 'personalRegistra', 'obsDenuncia', 'estadoDenuncia', 'idFalta');

    public function falta()
    {
        return $this->belongsTo('App\Models\Falta', 'idFalta');
    }
}
