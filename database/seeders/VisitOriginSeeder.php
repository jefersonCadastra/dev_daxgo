<?php

namespace Database\Seeders;

use App\Models\VisitOrigin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VisitOriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VisitOrigin::create([
            'title' => 'Direto',
            'description' => null,
            'paid' => 'N',
        ]);

        VisitOrigin::create([
            'title' => 'SEO',
            'description' => null,
            'paid' => 'N',
        ]);

        VisitOrigin::create([
            'title' => 'Email Marketing',
            'description' => null,
            'paid' => 'N',
        ]);

        VisitOrigin::create([
            'title' => 'Referral',
            'description' => null,
            'paid' => 'N',
        ]);

        VisitOrigin::create([
            'title' => 'Social',
            'description' => null,
            'paid' => 'N',
        ]);

        VisitOrigin::create([
            'title' => 'Google Ads',
            'description' => null,
            'paid' => 'S',
        ]);

        VisitOrigin::create([
            'title' => 'Facebook Ads',
            'description' => null,
            'paid' => 'S',
        ]);

        VisitOrigin::create([
            'title' => 'Instagram Ads',
            'description' => null,
            'paid' => 'S',
        ]);

        // User::factory(10)->create();
    }
}
