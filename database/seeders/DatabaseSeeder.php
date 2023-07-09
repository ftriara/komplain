<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call([
            UserSeeder::class,
        ]);
        $this->call([
            MerkSeeder::class,
        ]);
        $this->call([
            BarangSeeder::class,
        ]);
        $this->call([
            PetugasSeeder::class,
        ]);

        // $this->call([
        //     BarangSeeder::class,
        // ]);

        /*$this->call([
            Riwayat_Pengajuan_GaransiSeeder::class,
        ]);
        */

        // $this->call([
        //     Riwayat_TindakanSeeder::class,
        // ]);

    }
}
