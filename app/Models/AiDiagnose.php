<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiDiagnose extends Model
{
    protected $fillable = [
        'image',
        'plant_name',
        'confidence',
        'health_status',
        'result',
        'review_status'
    ];
}
