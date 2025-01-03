<?php

namespace Database\Seeders;

use App\Models\Sample;
use Illuminate\Database\Seeder;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sample::factory(10)->create();
    }
}
