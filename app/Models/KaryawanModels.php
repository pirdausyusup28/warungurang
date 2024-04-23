<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModels extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $fillable = [
        'nik_karyawan',
        'nama_karyawan',
        'tgl_lahir_karyawan',
        'jk_karyawan',
        'no_hp_karyawan',
        'alamat_karyawan',
        'photo',
        'tgl_mulai_kerja_karyawan',
        'status_karyawan',
    ];
}
