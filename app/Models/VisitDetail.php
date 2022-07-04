<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitDetail extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'origin', 'paid', 'cpc'];

}
