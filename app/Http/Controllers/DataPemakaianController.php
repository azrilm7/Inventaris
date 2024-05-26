<?php

namespace App\Http\Controllers;

use App\Models\DataPemakaian;
use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Auth;

class DataPemakaianController extends Controller
{
    public function datapemakaian(Request $request)
    {
        $role = Auth::user()->role;
        $data = DataPemakaian::all();
        return view('datapemakaian/datapemakaian', compact('data'), [
            'role' => $role
        ]);
    }

    public function tambahPemakaian(Request $request)
    {
        $barang = DataBarang::all();
        $ruang = Ruangan::all();
        $data = [
            'pageTitle' => 'Tambah Pemakaian',
            'barang' => $barang,
            'ruangan' => $ruang
        ];
        return view('datapemakaian/tambah-pemakaian', $data);
    }

    public function simpanPemakaian(Request $request)
    {
        // Validasi
        $request->validate([
            'kode_barang' => 'required|exists:data_barang,kode_barang',
            'nama_barang' => 'required|exists:data_barang,nama_barang',
            'jumlah_pakai' => 'required',
            'tanggal_pakai' => 'required',
            'pemakaian' => 'required',
            'ruangan_id' => 'required|exists:ruangan,id',
            'keterangan' => 'required'
        ], [
            'kode_barang.required' => 'Nama barang tidak boleh kosong',
            'kode_barang.exists' => 'Nama barang tidak ditemukan',
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'nama_barang.exists' => 'Nama barang tidak ditemukan',
            'jumlah_pakai.required' => 'Jumlah pakai tidak boleh kosong',
            'tanggal_pakai.required' => 'Tanggal pakai tidak boleh kosong',
            'pemakaian.required' => 'Pemakaian tidak boleh kosong',
            'ruangan_id.required' => 'Ruangan tidak boleh kosong',
            'ruangan_id.exists' => 'Ruangan tidak ditemukan',
            'keterangan.required' => 'Keterangan tidak boleh kosong'
        ]);

        // Menyimpan data ke database menggunakan array atribut
        $tambahpemakaian = DataPemakaian::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah_pakai' => $request->jumlah_pakai,
            'tanggal_pakai' => $request->tanggal_pakai,
            'pemakaian' => $request->pemakaian,
            'ruangan_id' => $request->ruangan_id,
            'keterangan' => $request->keterangan
        ]);

        if ($tambahpemakaian) {
            // Update atau buat data barang
            $cekbarang = DataBarang::where('kode_barang', $request->kode_barang)->first();
            if ($cekbarang) {
                // Jika barang sudah ada, update jumlah
                $cekbarang->jumlah -= $request->jumlah_pakai;
                $cekbarang->save();
            }
            return redirect()->route('tambah-pemakaian')->with('success', 'Data Pemakaian berhasil ditambahkan');
        } else {
            return redirect()->route('tambah-pemakaian')->with('fail', 'Data Pemakaian gagal ditambahkan');
        }
    }

    public function editPemakaian($id) {
        $pemakaian = DataPemakaian::findOrFail($id);
        $data = [
            'pageTitle' => 'Edit data pemakaian',
            'barang' => DataBarang::all(),
            'pemakaian' => $pemakaian,
            'ruangan' => Ruangan::all()
        ];
        return view('datapemakaian.edit-pemakaian', $data);
    }
    
    public function updatePemakaian(Request $request)
    {
        $pemakaian_id = $request->id;
        $pemakaian = DataPemakaian::findOrFail($pemakaian_id);

        // Validasi
        $request->validate([
            'kode_barang' => 'required|exists:data_barang,kode_barang',
            'nama_barang' => 'required|exists:data_barang,nama_barang',
            'jumlah_pakai' => 'required|integer|min:1',
            'tanggal_pakai' => 'required',
            'pemakaian' => 'required',
            'ruangan_id' => 'required|exists:ruangan,id',
            'keterangan' => 'required'
        ], [
            'kode_barang.required' => 'Kode barang tidak boleh kosong',
            'kode_barang.exists' => 'Kode barang tidak ditemukan',
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'nama_barang.exists' => 'Nama barang tidak ditemukan',
            'jumlah_pakai.required' => 'Jumlah pakai tidak boleh kosong',
            'jumlah_pakai.integer' => 'Jumlah pakai harus berupa angka',
            'jumlah_pakai.min' => 'Jumlah pakai harus minimal 1',
            'tanggal_pakai.required' => 'Tanggal pakai tidak boleh kosong',
            'pemakaian.required' => 'Pemakaian tidak boleh kosong',
            'ruangan_id.required' => 'Ruangan tidak boleh kosong',
            'ruangan_id.exists' => 'Ruangan tidak ditemukan',
            'keterangan.required' => 'Keterangan tidak boleh kosong'
        ]);

        // Menghitung selisih jumlah pemakaian baru dan lama
        $selisih_jumlah = $request->jumlah_pakai - $pemakaian->jumlah_pakai;

        // Memperbarui data pemakaian
        $pemakaian->jumlah_pakai = $request->jumlah_pakai;
        $pemakaian->tanggal_pakai = $request->tanggal_pakai;
        $pemakaian->pemakaian = $request->pemakaian;
        $pemakaian->ruangan_id = $request->ruangan_id;
        $pemakaian->keterangan = $request->keterangan;
        $saved = $pemakaian->save();

        // Memperbarui jumlah barang jika pemakaian berhasil disimpan
        if ($saved) {
            $barang = DataBarang::where('kode_barang', $request->kode_barang)->first();
            if ($barang) {
                // Update jumlah barang dengan menambahkan selisih jumlah
                $barang->jumlah -= $selisih_jumlah;
                $barang->save();
            }
            return redirect()->route('edit-pemakaian', ['id' => $pemakaian_id])->with('success', '<b>' . ucfirst($request->nama_barang) . '</b> data pemakaian berhasil diperbaharui');
        } else {
            return redirect()->route('edit-pemakaian', ['id' => $pemakaian_id])->with('fail', 'Ada kendala, coba lagi');
        }
    }

    public function destroy($id)
    {
        $data = DataPemakaian::findOrFail($id);
        $kodebarang = $data->kode_barang;
        $jumlah_pakai = $data->jumlah_pakai;

        // Mengembalikan jumlah barang ke nilai semula sebelum menghapus data pemakaian
        $barang = DataBarang::where('kode_barang', $kodebarang)->first();
        if ($barang) {
            $barang->jumlah += $jumlah_pakai;
            $barang->save();
        }

        if ($data->delete()) {
            return redirect()->back()->with('success-delete', 'Data pemakaian ' . $kodebarang . ' berhasil dihapus');
        } else {
            return redirect()->back()->with('fail', 'Data pemakaian gagal dihapus');
        }
    }

    public function getBarangByKode($kode_barang)
    {
        $barang = DataBarang::where('kode_barang', $kode_barang)->first();

        if ($barang) {
            return response()->json(['nama_barang' => $barang->nama_barang]);
        } else {
            return response()->json(['nama_barang' => '']);
        }
    }
}

