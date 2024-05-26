<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPemakaianController;
use App\Http\Controllers\DataPembelianController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuanganController;
use App\Models\DataBarang;
use App\Models\DataPembelian;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('/example-page','example-page');
Route::view('/example-auth','example-auth');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
Route::get('/get-barang-by-kode/{kode_barang}', [DataPemakaianController::class, 'getBarangByKode']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/datauser',[DataUserController::class,'datauser'])->name('datauser');
Route::get('/edit-user',[DataUserController::class,'editUser'])->name('edit-user');
Route::post('/update-user',[DataUserController::class,'updateUser'])->name('update-user');
Route::delete('/datauser/delete/{id}', [DataUserController::class,'destroy'])->name('delete-user');
Route::get('/datauser/export/',[DataUserController::class,'exportUser'])->name('export-user');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/databarang', [DataBarangController::class, 'databarang'])->name('databarang');
Route::get('/tambah-barang',[DataBarangController::class, 'tambahBarang'])->name('tambah-barang');
Route::post('/simpan-barang',[DataBarangController::class, 'simpanBarang'])->name('simpan-barang');
Route::get('/edit-barang/{id}',[DataBarangController::class, 'editBarang'])->name('edit-barang');
Route::post('/update-barang',[DataBarangController::class, 'updateBarang'])->name('update-barang');
Route::delete('/databarang/delete/{id}', [DataBarangController::class,'destroy'])->name('delete-barang');
Route::get('/databarang/export/',[DataBarangController::class,'exportBarang'])->name('export-barang');

Route::get('/datapemakaian', [DataPemakaianController::class, 'datapemakaian'])->name('datapemakaian');
Route::get('/tambah-pemakaian', [DataPemakaianController::class, 'tambahPemakaian'])->name('tambah-pemakaian');
Route::post('/simpan-pemakaian',[DataPemakaianController::class, 'simpanPemakaian'])->name('simpan-pemakaian');
Route::get('/edit-pemakaian/{id}',[DataPemakaianController::class, 'editPemakaian'])->name('edit-pemakaian');
Route::post('/update-pemakaian',[DataPemakaianController::class, 'updatePemakaian'])->name('update-pemakaian');
Route::delete('/datapemakaian/delete/{id}', [DataPemakaianController::class,'destroy'])->name('delete-pemakaian');
Route::get('/datapemakaian/export/',[DataPemakaianController::class,'exportPemakaian'])->name('export-pemakaian');

Route::get('/datapembelian', [DataPembelianController::class, 'datapembelian'])->name('datapembelian');
Route::get('/tambah-pembelian', [DataPembelianController::class, 'tambahPembelian'])->name('tambah-pembelian');
Route::post('/simpan-pembelian',[DataPembelianController::class, 'simpanPembelian'])->name('simpan-pembelian');
Route::get('/edit-pembelian/{id}',[DataPembelianController::class, 'editPembelian'])->name('edit-pembelian');
Route::post('/update-pembelian',[DataPembelianController::class, 'updatePembelian'])->name('update-pembelian');
Route::delete('/datapembelian/delete/{id}', [DataPembelianController::class, 'deletePembelian'])->name('delete-pembelian');
Route::get('/datapembelian/export/',[DataPembelianController::class,'exportPembelian'])->name('export-pembelian');

Route::get('/ruangan', [RuanganController::class, 'ruangan'])->name('ruangan');
Route::get('/tambah-ruangan',[RuanganController::class,'tambahRuangan'])->name('tambah-ruangan');
Route::post('/simpan-ruangan',[RuanganController::class,'simpanRuangan'])->name('simpan-ruangan');
Route::get('/edit-ruangan/{id}',[RuanganController::class, 'editRuangan'])->name('edit-ruangan');
Route::post('/update-ruangan',[RuanganController::class, 'updateRuangan'])->name('update-ruangan');
Route::delete('/ruangan/delete/{id}', [RuanganController::class, 'deleteRuangan'])->name('delete-ruangan');
Route::get('/ruangan/export/',[RuanganController::class,'exportRuangan'])->name('export-ruangan');

Route::get('/inventaris', [InventarisController::class, 'inventaris'])->name('inventaris');
Route::get('/inventaris/export/',[InventarisController::class,'exportInventaris'])->name('export-inventaris');




require __DIR__.'/auth.php';
