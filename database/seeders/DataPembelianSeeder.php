<?php

namespace Database\Seeders;

use App\Models\DataPembelian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataPembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seed1 = DataPembelian::updateOrCreate([
            'kode_barang' => 'K001',
            'nama_barang' => 'Mesin Bor',
            'jenis_barang' => 'Alat',
            'merk' => 'makita',
            'jumlah' => '10',
            'harga' => '120000',
            'total' => '120000',
            'tanggal_pembelian' => '2024-05-20'

        ]);
        $seed2 = DataPembelian::updateOrCreate([
            'kode_barang' => 'K002',
            'nama_barang' => 'Mesin Las',
            'jenis_barang' => 'Alat',
            'merk' => 'makita',
            'Jumlah' => '15',
            'harga' => '150000',
            'total' => '2250000',
            'tanggal_pembelian' => '2024-05-20'
        ]);
    }
}
