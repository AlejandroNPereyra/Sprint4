<?php

namespace Database\Seeders;

use App\Models\Duel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Duel::factory(100)->create();
    }
}
