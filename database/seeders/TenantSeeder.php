<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create([
            'uuid' => Str::uuid(),
            'name' => 'Lovz',
            'email' => 'contato@lovz.com.br',
            'account_ga' => Str::random(30),
        ]);
    }
}
