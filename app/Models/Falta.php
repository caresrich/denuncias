<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    protected $primaryKey = 'idFalta';
    protected $table = 'faltas';
    protected $fillable = array('nombreFalta','estadoFalta');
}
