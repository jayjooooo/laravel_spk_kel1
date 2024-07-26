<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'A1', 'A2', 'A3', 'A4', 'A5',
        'A6', 'A7', 'A8', 'A9', 'A10',
        'A11', 'A12', 'A13', 'A14'
    ];
}
