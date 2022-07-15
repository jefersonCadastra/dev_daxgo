<?php

namespace App\Models;

use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceAverage extends Model
{
    use HasFactory, TenantTrait;

    protected $fillable = ['weekday', 'average'];
}
