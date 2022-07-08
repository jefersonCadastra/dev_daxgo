<?php

namespace App\Models;

use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitOrigin extends Model
{
    use HasFactory, TenantTrait;

    protected $fillable = ['title', 'paid'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
