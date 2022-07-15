<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGoal extends Model
{
    use HasFactory;

    protected $fillable = ['average_price', 'percentage_goal', 'price_goal', 'price_u', 'month', 'year'];
}
