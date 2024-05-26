<?php

namespace App\Http\Controllers;

use App\Models\DataPembelian;
use Illuminate\Http\Request;
use App\Models\DataBarang;
use Illuminate\Support\Facades\Auth;

class DataPembelianController extends Controller
{
    public function datapembelian(Request $request)
    {
        $role = Auth::user()->role;
        $data = DataPembelian::all();
        return view('datapembelian/datapembelian',compact('data'),[
            'role' => $role
        ]);
    }

    public function tambahPembelian(Request $request){
        $barang = DataBarang::all();
        $data = [
            'pageTitle' => 'Tambah Pembelian',
            'barang'=>$barang
        ];
        return view('datapembelian/tambah-pembelian', $data);
    }

    public function simpanPembelian(Request $request)
    {
        // Validasi data pembelian
        $request->validate([
            'kode_barang' => 'nullable|exists:data_barang,kode_barang|required_without:kode_barang_input',
            'kode_barang_input' => 'nullable|required_without:kode_barang',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'harga' => 'required', // Pastikan kolom harga diisi
            'total' => 'required',
            'tanggal_pembelian'=>'required'
        ], [
            'kode_barang.required_without' => 'Kode barang atau input manual kode barang tidak boleh kosong',
            'kode_barang.exists' => 'Kode barang tidak ditemukan',
            'kode_barang_input.required_without' => 'Kode barang atau input manual kode barang tidak boleh kosong',
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'jenis_barang.required' => 'Jenis barang tidak boleh kosong',
            'merk.required' => 'Merk tidak boleh kosong',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'total.required' => 'Total tidak boleh kosong',
            'tanggal_pembelian.required' => 'Tanggal tidak boleh kosong'
        ]);
    
        // Mendapatkan kode barang dari request
        $kode_barang = $request->kode_barang ?: $request->kode_barang_input;
        $nama_barang = $request->nama_barang;
    
        // Melakukan pengecekan apakah barang sudah ada di tabel data_barang
        $existing_barang = DataBarang::where('kode_barang', $kode_barang)->first();
    
        if ($existing_barang) {
            // Jika barang sudah ada, tambahkan jumlah barang dan total pembelian
            $existing_barang->jumlah += $request->jumlah;
            $existing_barang->save();
    
            // Melakukan pengecekan apakah pembelian sudah ada untuk barang ini di tabel data_pembelian
            $existing_pembelian = DataPembelian::where('kode_barang', $kode_barang)->first();
            if ($existing_pembelian) {
                // Jika pembelian sudah ada, tambahkan jumlah dan total pembelian
                $existing_pembelian->jumlah += $request->jumlah;
                $existing_pembelian->total += $request->total;
                $existing_pembelian->save();
            } else {
                // Jika pembelian belum ada, buat entri baru di tabel data_pembelian
                DataPembelian::create([
                    'kode_barang' => $kode_barang,
                    'nama_barang' => $nama_barang,
                    'jenis_barang' => $request->jenis_barang,
                    'merk' => $request->merk,
                    'jumlah' => $request->jumlah,
                    'harga' => $request->harga, // Memasukkan nilai untuk kolom harga
                    'total' => $request->total,
                    'tanggal_pembelian'=>$request->tanggal_pembelian
                ]);
            }
        } else {
            // Jika barang belum ada, buat entri baru di tabel data_barang dan data_pembelian
            $new_barang = DataBarang::create([
                'kode_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'jenis_barang' => $request->jenis_barang,
                'merk' => $request->merk,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga // Pastikan harga juga dimasukkan
            ]);
    
            if ($new_barang) {
                // Jika entri barang berhasil dibuat, buat entri pembelian baru di tabel data_pembelian
                DataPembelian::create([
                    'kode_barang' => $kode_barang,
                    'nama_barang' => $nama_barang,
                    'jenis_barang' => $request->jenis_barang,
                    'merk' => $request->merk,
                    'jumlah' => $request->jumlah,
                    'harga' => $request->harga, // Memasukkan nilai untuk kolom harga
                    'total' => $request->total,
                    'tanggal_pembelian'=>$request->tanggal_pembelian
                ]);
            } else {
                return redirect()->route('tambah-pembelian')->with('fail', 'Data pembelian gagal ditambahkan');
            }
        }
    
        return redirect()->route('tambah-pembelian')->with('success', 'Data Pembelian berhasil ditambahkan');
    }



    

    public function editPembelian(Request $request){
        $pembelian_id = $request->id;
        $pembelian = DataPembelian::findOrFail($pembelian_id);
        
        $data = [
            'pageTitle'=>'Edit data pembelian',
            'barang' => DataBarang::all(),
            'pembelian'=>$pembelian
        ];
        return view('datapembelian/edit-pembelian',$data);
    }

    public function updatePembelian(Request $request){
        $pembelian_id = $request->id;
        $pembelian = DataPembelian::findOrFail($pembelian_id);
    
        $request->validate([
            'kode_barang' => 'nullable|exists:data_barang,kode_barang|required_without:kode_barang_input',
            'kode_barang_input' => 'nullable|required_without:kode_barang',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'harga' => 'required', // Pastikan kolom harga diisi
            'total' => 'required'
        ], [
            'kode_barang.required_without' => 'Kode barang atau input manual kode barang tidak boleh kosong',
            'kode_barang.exists' => 'Kode barang tidak ditemukan',
            'kode_barang_input.required_without' => 'Kode barang atau input manual kode barang tidak boleh kosong',
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'jenis_barang.required' => 'Jenis barang tidak boleh kosong',
            'merk.required' => 'Merk tidak boleh kosong',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'total.required' => 'Total tidak boleh kosong'
        ]);
    
        // Simpan jumlah barang sebelumnya untuk perhitungan nanti
        $old_quantity = $pembelian->jumlah;
        
        $pembelian->kode_barang = $request->kode_barang_input;
        $pembelian->nama_barang = $request->nama_barang;
        $pembelian->jenis_barang = $request->jenis_barang;
        $pembelian->merk = $request->merk;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->harga = $request->harga;
        $pembelian->total = $request->total;
        $pembelian->tanggal_pembelian = $request->tanggal_pembelian;
        $saved = $pembelian->save();
    
        if($saved){
            // Update data barang terkait
            $kode_barang = $request->kode_barang_input;
            $barang = DataBarang::where('kode_barang', $kode_barang)->first();
            
            if ($barang) {
                // Jika barang ditemukan, perbarui detail barang
                $barang->nama_barang = $request->nama_barang;
                $barang->jenis_barang = $request->jenis_barang;
                $barang->merk = $request->merk;
                $barang->jumlah += ($request->jumlah - $old_quantity); // Perbarui jumlah
                $barang->save();
            } else {
                // Jika barang belum ada, buat entri baru
                DataBarang::create([
                    'kode_barang' => $kode_barang,
                    'nama_barang' => $request->nama_barang,
                    'jenis_barang' => $request->jenis_barang,
                    'merk' => $request->merk,
                    'jumlah' => $request->jumlah,
                    'harga' => $request->harga
                ]);
            }
    
            return redirect()->route('edit-pembelian',['id'=>$pembelian_id])->with('success','<b>'.ucfirst($request->nama_barang).'</b> data pembelian berhasil diperbarui');
        } else {
            return redirect()->route('edit-pembelian',['id'=>$pembelian_id])->with('fail','Ada kendala, coba lagi');
        }
    }
    
    

    public function deletePembelian(Request $request, $id)
    {
        $pembelian = DataPembelian::findOrFail($id);
        $kode_barang = $pembelian->kode_barang;

        // Hapus data pembelian
        $pembelian->delete();

        // Hapus data barang terkait jika tidak ada pembelian lain yang menggunakan barang ini
        $remaining_pembelian = DataPembelian::where('kode_barang', $kode_barang)->count();
        if ($remaining_pembelian == 0) {
            DataBarang::where('kode_barang', $kode_barang)->delete();
        }

        return redirect()->route('datapembelian')->with('success-delete', 'Data Pembelian dan barang terkait berhasil dihapus');
    }
}
