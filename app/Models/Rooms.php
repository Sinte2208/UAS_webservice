<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = ['no_kamar', 'tipe_kamar', 'tipe_kasur', 'jumlah_kamar', 'harga'];
}
