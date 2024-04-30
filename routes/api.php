<?php

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Route;
use App\Models\KaryawanModels;
use App\Models\SupplierModels;
use App\Models\BarangModels;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', 'AuthController@login');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/karyawan/{id}', function ($id) {
    $data = KaryawanModels::where('id_karyawan', $id)->first();
    return response()->json($data);
});

Route::get('/supplier/{id}', function ($id) {
    $data = SupplierModels::where('id_supplier', $id)->first();
    return response()->json($data);
});

Route::get('/barang/{id}', function ($id) {
    // $data = BarangModels::with('supplier')->get();
    $data = BarangModels::with('supplier')->where('id_barang', $id)->first();
    return response()->json($data);
});

// Route::middleware('auth:api')->group(function () {
    Route::get('/barangAll', function () {
        $data = BarangModels::with('supplier')->get();
        return response()->json(['data' => $data]);
    });
// });