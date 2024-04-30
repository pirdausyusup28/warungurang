<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangRakModels extends Model
{
    use HasFactory;
    
    protected $table = 'kxs_master_gudang';
    protected $primaryKey = 'id_gudang';
    protected $fillable = [
        'nama_gudang',
        'lokasi',
        'longitude',
        'latitude ',
        'deskripsi',
        'flag_status',
    ];
}
