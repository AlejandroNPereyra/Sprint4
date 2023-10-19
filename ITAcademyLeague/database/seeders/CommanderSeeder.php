<?php

namespace Database\Seeders;

use App\Models\Commander;
use Illuminate\Database\Seeder;

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
