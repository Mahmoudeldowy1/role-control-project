<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaravelEntrustSeeder::class);
        \App\Models\Candidate::factory()->count(10)->create();
        \App\Models\Product::factory()->count(10)->create();

    }
}
