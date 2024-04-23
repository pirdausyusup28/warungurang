<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModels extends Model
{
    use HasFactory;
    protected $table = 'kxs_master_supplier';
    protected $primaryKey = 'id_supplier';
    protected $fillable = [
        'nama_supplier',
        'kontak',
        'deskripsi',
        'flag_status',
    ];
}
