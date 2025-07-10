<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'penjual_id',
        'product_id',
        'pembeli_id',
        'total_harga',
        'status_transaksi',
        'bukti_bayar',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'pembeli_id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    protected static function booted()
    {
        static::updated(function ($transaction) {
            if ($transaction->status_transaksi == 1 && $transaction->booking_id) {
                $transaction->booking->update(['status' => 'disetujui']);
            }
        });
    }
}
