<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Unit_BisnisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unit_bisnis')->insert([
            [
                'gambar' => 'images/gambar_ruangan.png',
                'nama_unit' => 'Ruangan',
                'slug' => 'ruangan',
                'deskripsi' => 'Unit ini bertanggung jawab atas pengelolaan ruang-ruang yang tersedia di lingkungan kampus, seperti ruang kelas, laboratorium, aula, dan lahan yang dapat disewakan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'gambar' => 'images/gambar_inventaris.png',
                'nama_unit' => 'Inventaris',
                'slug' => 'inventaris',
                'deskripsi' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'gambar' => 'images/gambar_atk_print.png',
                'nama_unit' => 'Alat Tulis & Printing',
                'slug' => 'atk_print',
                'deskripsi' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'gambar' => 'images/gambar_software.png',
                'nama_unit' => 'Pengembangan Software',
                'slug' => 'software',
                'deskripsi' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'gambar' => 'images/gambar_kewirausahaan.png',
                'nama_unit' => 'Kewirausahaan',
                'slug' => 'kewirausahaan',
                'deskripsi' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
