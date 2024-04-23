<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Karyawan;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Login;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Kasir;
use App\Http\Controllers\ProfilWarung;
use App\Http\Controllers\Stock;
use App\Http\Controllers\Supplier;
use App\Http\Controllers\Barang;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// routes/web.php

Route::get('/', [Login::class, 'index'])->name('loginauth');
Route::get('login', [Login::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::middleware(['jwt.check'])->get('/test-middleware', function () {
    return response()->json(['message' => 'Middleware is working']);
});
// Route::middleware(['jwt.check'])->group(function () {
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('profil-warung', [ProfilWarung::class, 'index'])->name('profil-warung');
    
    Route::get('karyawan', [Karyawan::class, 'index'])->name('karyawan');
    Route::post('karyawan', [Karyawan::class, 'store'])->name('karyawan.store');
    Route::put('karyawan', [Karyawan::class, 'update'])->name('karyawan.update');
    Route::delete('/karyawan/{id}', [Karyawan::class, 'destroy'])->name('karyawan.destroy');

    Route::get('supplier', [Supplier::class, 'index'])->name('supplier');
    Route::post('supplier', [Supplier::class, 'store'])->name('supplier.store');
    Route::put('supplier', [Supplier::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/{id}', [Supplier::class, 'destroy'])->name('supplier.destroy');

    Route::get('barang', [Barang::class, 'index'])->name('barang');
    Route::post('barang', [Barang::class, 'store'])->name('barang.store');
    Route::put('barang', [Barang::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [Barang::class, 'destroy'])->name('barang.destroy');

    Route::get('stock', [Stock::class, 'index'])->name('stock');
    Route::get('kasir', [Kasir::class, 'index'])->name('kasir');
});
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

