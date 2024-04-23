<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModels extends Model
{
    use HasFactory;
    protected $table = 'kxs_master_barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'kd_barang',
        'kategori_barang',
        'nama_barang',
        'id_supplier',
        'deskripsi',
        'satuan_barang',
        'harga_barang',
        'gambar',
        'flag_status',
    ];

    public function supplier()
    {
        return $this->belongsTo(SupplierModels::class, 'supplier_id', 'id_supplier');
    }
}
