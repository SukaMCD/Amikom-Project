<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\publisher::create(['name' => 'Gramedia']);
        \App\Models\publisher::create(['name' => 'Erlangga']);
        \App\Models\publisher::create(['name' => 'Andi Publisher']);
    }
}
