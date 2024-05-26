<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemakaian extends Model
{
    use HasFactory;

    protected $table = 'data_pemakaian';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jumlah_pakai',
        'tanggal_pakai',
        'pemakaian',
        'ruangan',
        'keterangan',
    ];
}
