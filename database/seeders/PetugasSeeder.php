<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Mujiono'],
            ['nama' => 'Suprapto'],
            ['nama' => 'Joko'],
            ['nama' => 'Pawiro'],
            ['nama' => 'Darmo'],
            ['nama' => 'Mulyono'],
            ['nama' => 'Edi'],
            ['nama' => 'Rozak'],
            // tambahkan data lainnya sesuai kebutuhan Anda
        ];
        Petugas::insert($data);
    }
}
