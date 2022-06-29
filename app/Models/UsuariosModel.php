<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
