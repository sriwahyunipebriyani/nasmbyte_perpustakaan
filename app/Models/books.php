<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class books extends Model
{

    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $primaryKey = 'BukuID';

    protected $fillable = [
        'Judul', 'slug', 'Penulis', 'Penerbit', 'TahunTerbit', 'status', 'cover','description'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'Judul',
            ],
        ];
    }

    /**
     * The roles that belong to the books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(kategoribuku::class, 'kategoribuku_relasi', 'BukuID', 'KategoriID');
    }
    /**
     * Get the user that owns the books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTso
    {
        return $this->belongsTo(kategoribuku::class, 'KategoriID', 'BukuID');
    }
}