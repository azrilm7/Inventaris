<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\DataPembelian;
use App\Models\DataPemakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventarisController extends Controller
{
    public function inventaris(Request $request)
    {
        $role = Auth::user()->role;
        $inventaris = Inventaris::all();
        $dataPembelian = DataPembelian::all();
        $dataPemakaian = DataPemakaian::all();

        return view('inventaris.inventaris', compact('inventaris', 'dataPembelian', 'dataPemakaian', 'role'));
    }
}
