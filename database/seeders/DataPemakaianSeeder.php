<?php

namespace Database\Seeders;

use App\Models\DataPemakaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataPemakaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seed1 = DataPemakaian::updateOrCreate([
            'kode_barang' => 'K001',
            'nama_barang' => 'Mesin Bor',
            'jumlah_pakai' => '2',
            'tanggal_pakai' => '2024-03-20',
            'pemakaian' => 'membor tembok',
            'ruangan'=>'Ruangan B',
            'keterangan' => 'digunakan',

        ]);
        $seed2 = DataPemakaian::updateOrCreate([
            'kode_barang' => 'K002',
            'nama_barang' => 'Mesin Las',
            'jumlah_pakai' => '2',
            'tanggal_pakai' => '2024-04-20',
            'pemakaian' => 'mengelas besi',
            'ruangan'=>'Ruangan B',
            'keterangan' => 'tersisah',

        ]);
    }
}
