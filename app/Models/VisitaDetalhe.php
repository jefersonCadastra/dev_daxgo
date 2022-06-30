<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaDetalhe extends Model
{
    use HasFactory;

    protected $table = 'visitas_detalhe';

    protected $fillable = ['quantidade', 'origem_visita', 'visita_paga', 'cpc'];

    public $timestamps = false;

}
