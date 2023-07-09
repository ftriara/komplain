<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Barang::factory()
            ->count(10)
            ->create();
        */
        $data = [
            ['nama' => 'Headphone', 'harga' => '250000', 'id_merk' => '1'],
            ['nama' => 'Earphone', 'harga' => '100000', 'id_merk' => '2'],
            ['nama' => 'Speaker', 'harga' => '700000', 'id_merk' => '3'],
            ['nama' => 'Charger', 'harga' => '360000', 'id_merk' => '4'],
            ['nama' => 'LCD', 'harga' => '2000000', 'id_merk' => '1'],
            ['nama' => 'Proyektor', 'harga' => '1500000', 'id_merk' => '2'],
            ['nama' => 'Headphone', 'harga' => '250000', 'id_merk' => '3'],
            ['nama' => 'TWS', 'harga' => '180000', 'id_merk' => '4'],
            ['nama' => 'Keyboard', 'harga' => '200000', 'id_merk' => '1'],
            ['nama' => 'Charger', 'harga' => '350000', 'id_merk' => '2'],
            // tambahkan data lainnya sesuai kebutuhan Anda
        ];
        Barang::insert($data);
    }
}
