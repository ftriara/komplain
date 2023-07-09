<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Merk;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Merk::create([
            'nama' => 'Samsung',
        ]);
        Merk::create([
            'nama' => 'Xiaomi',
        ]);
        Merk::create([
            'nama' => 'Oppo',
        ]);
        Merk::create([
            'nama' => 'Samsung',
        ]);
    }
}
