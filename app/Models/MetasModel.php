<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetasModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'metas';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
