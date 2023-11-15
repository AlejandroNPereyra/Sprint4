<?php

namespace Database\Seeders;

use App\Models\Commander;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommanderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commander::factory(20)->create();
    }
}
