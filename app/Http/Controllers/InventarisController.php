<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\DataPembelian;
use App\Models\DataPemakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Excel;
use App\Exports\ExportInventaris;

class InventarisController extends Controller
{
    public function inventaris(Request $request)
    {
        $role = Auth::user()->role;
        $inventaris = Inventaris::paginate(5);
        $dataPembelian = DataPembelian::paginate(5);
        $dataPemakaian = DataPemakaian::paginate(5);

        return view('inventaris.inventaris', compact('inventaris', 'dataPembelian', 'dataPemakaian', 'role'));
    }

    public function exportInventaris(Excel $excel)
{
    return $excel->download(new ExportInventaris, 'data_inventaris.xlsx');
}
}
