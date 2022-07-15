<?php

namespace App\Models;

use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, TenantTrait;

    protected $filled = ['sku', 'name', 'price'];

    public function goals()
    {
        return $this->hasMany(ProductGoal::class);
    }
}
