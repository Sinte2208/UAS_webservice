<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['tanggal_pesan', 'tanggal_check_in', 'tanggal_check_out', 'lama_menginap', 'total_biaya'];

public function costumers()
{
    return $this->belongsTo(Costumers::class, 'costumers_id');
}

public function rooms()
{
    return $this->belongsTo(Rooms::class, 'rooms_id');
}
}

