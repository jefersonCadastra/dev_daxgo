<?php

namespace App\Models;

use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory, TenantTrait;

    protected $fillable = ['quantity', 'month', 'year'];

    protected $with = ['detail'];

    public function detail()
    {
        return $this->hasMany(VisitDetail::class);
    }
}
