<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use simpanBarang;

class DataBarangController extends Controller
{
    public function databarang(Request $request)
    {
        $role = Auth::user()->role;
        $data = DataBarang::all();
        return view('databarang/databarang', compact('data'), [
            'role' => $role,
        ]);
    }

    public function tambahBarang(Request $request)
    {
        $data = [
            'pageTitle' => 'Tambah Barang'
        ];
        return view('databarang/tambah-barang', $data);
    }

    public function simpanBarang(Request $request)
    {
        // Validasi
        $request->validate([
            'kode_barang'=>'required|unique:data_barang,kode_barang',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'merk'=>'required',
            'jumlah' => 'required',
            'harga' => 'required'
        ], [
            'kode_barang.required' => 'Kode barang tidak boleh kosong',
            'kode_barang.unique' => 'kode barang tidak boleh sama',
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'jenis_barang.required' => 'Jenis barang tidak boleh kosong',
            'merk.required' => 'Merk tidak boleh kosong',
            'jumlah.required' => 'Jumlah barang tidak boleh kosong',
            'harga.required' => 'Harga barang tidak boleh kosong'
        ]);

        // Membuat instance baru dari model DataBarang
        $tambahbarang = new DataBarang();
        $tambahbarang->kode_barang = $request->kode_barang;
        $tambahbarang->nama_barang = $request->nama_barang;
        $tambahbarang->jenis_barang = $request->jenis_barang;
        $tambahbarang->merk = $request->merk;
        $tambahbarang->jumlah = $request->jumlah;
        $tambahbarang->harga = $request->harga;

        // Menyimpan data ke database
        $saved = $tambahbarang->save();

        // Mengarahkan pengguna kembali dengan pesan sukses atau gagal
        if ($saved) {
            return redirect()->route('tambah-barang')->with('success', 'Barang berhasil ditambahkan.');
        } else {
            return redirect()->route('tambah-barang')->with('fail', 'Terjadi kesalahan, coba lagi.');
        }
    }

    public function editBarang(Request $request){
        $barang_id = $request->id;
        $barang = DataBarang::findOrFail($barang_id);
        
        $data = [
            'pageTitle'=>'Edit data barang',
            'barang' => $barang
        ];
        return view('databarang/edit-barang',$data);
    }

    public function updateBarang(Request $request){
        $barang_id = $request->id;
        $barang = DataBarang::findOrFail($barang_id);

        //validasi
        $request->validate([
            'kode_barang'=>'required|unique:data_barang,kode_barang,'.$barang_id,
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'harga' => 'required'
        ],[
            'kode_barang.required' => 'Kode barang tidak boleh kosong',
            'kode_barang.unique' => 'kode barang tidak boleh sama',
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'jenis_barang.required' => 'Jenis barang tidak boleh kosong',
            'merk.required' => 'merk tidak boleh kosong',
            'jumlah.required' => 'Jumlah barang tidak boleh kosong',
            'harga.required' => 'Harga barang tidak boleh kosong'
        ]);
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->merk = $request->merk;
        $barang->jumlah = $request->jumlah;
        $barang->harga = $request->harga;
        $saved = $barang->save();

        if($saved){
           return redirect()->route('edit-barang',['id'=>$barang_id])->with('success','<b>'.ucfirst($request->nama_barang).'</b> data barang berhasil di perbaharui');
        }else{
            return redirect()->route('edit-barang',['id'=>$barang_id])->with('fail','ada kendala,coba lagi');
         }
    }

    // app/Http/Controllers/BarangController.php
    public function destroy($id)
    {
      $data = DataBarang::findOrFail($id);
      $kodebarang = $data->kode_barang;

      if ($data->delete()) {
        return redirect()->back()->with('success-delete', 'Data barang ' . $kodebarang . ' berhasil dihapus');
        } else {
        return redirect()->back()->with('fail', 'Data pemakaian gagal dihapus');
        }
    }


}
