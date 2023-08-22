<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gamme;

class GammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gamme::create([
            'nom' => 'Nos fruits'
          ]);
          Gamme::create([
            'nom' => 'Nos légumes'
          ]);
          Gamme::create([
            'nom' => 'Nos jus de fruits'
          ]);
          Gamme::create([
            'nom' => 'Nos fromages'
          ]);
    }
}
