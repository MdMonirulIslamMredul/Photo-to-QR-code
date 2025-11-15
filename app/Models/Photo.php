<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{

    use HasFactory;

    protected $fillable = [
        'file_path',
        'original_name',
        'qr_url',
    ];

}
