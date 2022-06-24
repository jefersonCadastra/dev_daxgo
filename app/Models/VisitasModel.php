<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitasModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'visitas';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
