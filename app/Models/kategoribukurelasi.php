<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoribukurelasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'KategoriBukuID';
    protected $fillable = [
        'KategoriID', 'BukuID',
    ];
}