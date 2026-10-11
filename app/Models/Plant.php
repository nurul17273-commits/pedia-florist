<?php

// app/Models/Plant.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'nama_populer',
        'nama_latin',
        'kategori',
        'tingkat_kesulitan',
        'status_ai',
        'cover'
    ];
}
