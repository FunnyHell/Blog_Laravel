<?php

namespace Database\Seeders;

use App\Models\LevelAccess;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level_accesses = LevelAccess::factory(20)->create();
    }
}
