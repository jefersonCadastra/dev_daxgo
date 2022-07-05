<?php

namespace App\Models;

use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Goal extends Model
{
    use HasFactory, TenantTrait;

    protected $fillable = ['title', 'month', 'year', 'value'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function findByYearMonth($year, $month)
    {
        return $this->where("year", $year)->where("month", $month);
    }
}
