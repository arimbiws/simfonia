<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit_Bisnis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'unit_bisnis';

    protected $fillable = ['gambar', 'nama_unit', 'slug', 'deskripsi'];
}
