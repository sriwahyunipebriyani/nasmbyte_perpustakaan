<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategoribuku extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Sluggable;

    protected $primaryKey = 'KategoriID';
    protected $fillable = [
        'NamaKategori', 'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'NamaKategori',
            ],
        ];
    }
}
