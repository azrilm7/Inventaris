<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kode_barang',
        'jenis_barang',
        'jumlah',
        'tanggal_pembelian',
        'tanggal_pemakaian',
        'penggunaan',
        'ruang',
        'keterangan',
    ];
}
