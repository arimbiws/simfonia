<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'nama_kegiatan',
        'instansi',
        'nim',
        'nama_lengkap',
        'email',
        'no_hp',
        'alamat',
        'surat_pengajuan',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
