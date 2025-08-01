<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'pembeli_id',
        'tanggal_mulai',
        'tanggal_kembali',
        'nama_kegiatan',
        'instansi',
        'nama_lengkap',
        'email',
        'no_hp',
        'alamat',
        'surat_pengajuan',
        'status',
        'nik_nim',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'booking_id');
    }

    public function updateStatusBasedOnTime()
    {
        $now = \Carbon\Carbon::now();

        if ($this->status === 'disetujui') {
            if ($now->between($this->tanggal_mulai, $this->tanggal_kembali)) {
                $this->status = 'sedang digunakan';
            } elseif ($now->greaterThan($this->tanggal_kembali)) {
                $this->status = 'pengembalian';
            }
            $this->save();
        }
    }
}
