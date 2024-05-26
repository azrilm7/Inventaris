<?php

namespace Database\Seeders;

use App\Models\DataBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seed1 = DataBarang::updateOrCreate([
            'kode_barang' => 'K001',
            'nama_barang' => 'Mesin Bor',
            'jenis_barang' => 'Alat',
            'merk' => 'makita',
            'jumlah' => '10',
            'harga' => '120000',
        ]);
        $seed2 = DataBarang::updateOrCreate([
            'kode_barang' => 'K002',
            'nama_barang' => 'Mesin Las',
            'jenis_barang' => 'Alat',
            'merk' =>'makita',
            'Jumlah' => '15',
            'harga' => '150000',
        ]);
    }
}
