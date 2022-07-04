<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class WizardController extends Controller
{
    public function index(Faker $faker, Tenant $tenant)
    {
        $tenant->create([
            'name'  => $faker->name(),
            'email' => $faker->email(),
            'account_ga' => Str::random(30),
        ]);

        return view('painel.wizard.index');
    }
}
