<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function ruangan(Request $request)
    {
        $role = Auth::user()->role;
        $data = Ruangan::all();
        return view('ruangan/ruangan', compact('data'), [
            'role' => $role,
        ]);
    }
}
