<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitDetail extends Model
{
    use HasFactory;

    protected $fillable = ['visit_id', 'quantity', 'origin', 'cpc'];

    protected $nullable = [
        'cpc'
    ];

    protected $with = ['visit'];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
