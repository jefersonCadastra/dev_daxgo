<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitasDetalheModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'visitas_detalhe';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
