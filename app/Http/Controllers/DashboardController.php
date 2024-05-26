<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\User;
use App\Models\DataPembelian;
use App\Models\DataPemakaian;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDataBarang = DataBarang::count();
        $totalDataUser = User::count();
        $totalDataPembelian = DataPembelian::count();
        $totalDataPemakaian = DataPemakaian::count();
        
        // Asumsikan bahwa Anda mendapatkan peran pengguna dari model User
        $user = auth()->user(); // Atau cara lain untuk mendapatkan pengguna saat ini
        $role = $user->role;
        $name = $user->name;

        return view('dashboard', compact('totalDataBarang', 'totalDataUser', 'totalDataPembelian', 'totalDataPemakaian', 'role', 'name'));
    }
}
