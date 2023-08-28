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
            'nom' => 'Nos fruits',
            'image' => 'fruits.jpg'
          ]);
          Gamme::create([
            'nom' => 'Nos légumes',
            'image' => 'legumes.jpg'
          ]);
          Gamme::create([
            'nom' => 'Nos fromages',
            'image' => 'fromages.jpg'
          ]);
    }
}
