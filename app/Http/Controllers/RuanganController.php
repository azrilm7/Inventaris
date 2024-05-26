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

    public function tambahRuangan(Request $request){
        $data = [
            'pageTitle' => 'Tambah ruangan',
        ];
        return view('ruangan/tambah-ruangan', $data);
    }

    public function simpanRuangan(Request $request){
        $request->validate([
            'ruangan'=>'required|unique:ruangan,ruangan',
        ], [
            'ruangan.required' => 'nama ruangan tidak boleh kosong',
            'ruangan.unique' => 'nama ruangan tidak boleh sama'
        ]);

        $tambahruangan = new Ruangan();
        $tambahruangan->ruangan = $request->ruangan;

        // Menyimpan data ke database
        $saved = $tambahruangan->save();

        // Mengarahkan pengguna kembali dengan pesan sukses atau gagal
        if ($saved) {
            return redirect()->route('tambah-ruangan')->with('success', 'Ruangan berhasil ditambahkan.');
        } else {
            return redirect()->route('tambah-ruangan')->with('fail', 'Terjadi kesalahan, coba lagi.');
        }
    }
    
    public function editRuangan(Request $request){
        $ruangan_id = $request->id;
        $ruangan = Ruangan::findOrFail($ruangan_id);
        
        $data = [
            'pageTitle'=>'Edit data ruangan',
            'ruangan'=>$ruangan
        ];
        return view('ruangan/edit-ruangan',$data);
    }

    public function updateRuangan(Request $request){
        $ruangan_id = $request->id;
        $ruangan = Ruangan::findOrFail($ruangan_id);

        $request->validate([
            'ruangan'=>'required|unique:ruangan,ruangan',
        ], [
            'ruangan.required' => 'nama ruangan tidak boleh kosong',
            'ruangan.unique' => 'nama ruangan tidak boleh sama'
        ]);
        $ruangan->ruangan = $request->ruangan;

        // Menyimpan data ke database
        $saved = $ruangan->save();

        // Mengarahkan pengguna kembali dengan pesan sukses atau gagal
        if ($saved) {
            return redirect()->route('edit-ruangan',['id'=>$ruangan_id])->with('success','<b>'.ucfirst($request->ruangan).'</b> data ruangan berhasil diperbarui');
        } else {
            return redirect()->route('edit-ruangan',['id'=>$ruangan_id])->with('fail', 'Terjadi kesalahan, coba lagi.');
        }
    }

    public function deleteRuangan(Request $request, $id){
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();

        return redirect()->route('ruangan')->with('success-delete', 'Data berhasil dihapus');
    }

}
