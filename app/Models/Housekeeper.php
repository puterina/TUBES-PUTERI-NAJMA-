<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Housekeeper extends Model
{
    protected $fillable = [
    'nama', 'no_hp', 'alamat', 'shift',
    'tugas_harian', 'area_penanganan', 'status',
];
}
