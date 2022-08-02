<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumers extends Model
{
    use HasFactory;

    protected $table = 'costumers';
    protected $fillable = ['nama', 'no_ktp', 'alamat', 'umur', 'no_telfon'];
}
