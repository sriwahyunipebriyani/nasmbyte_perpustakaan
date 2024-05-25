<?php

namespace App\Models;

use App\Models\koleksipribadi;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Sluggable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'UserID';

    protected $fillable = [
        // 'UserID',
        'username',
        'password',
        'email',
        'namaLengkap',
        'status',
        'alamat',
        'RolesID'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $attributes = [
        'RolesID' => 2,
        'status' => 'inactive',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'username',
            ],
        ];
    }
    public function koleksipribadi()
    {
        return $this->belongsToMany(books::class, 'koleksipribadi', 'UserID', 'BukuID');
    }

    public function books()  {
        return $this->belongsToMany(books::class, 'peminjaman', 'UserID', 'BukuID')
        ->withPivot('TanggalPeminjaman')
        ->withTimestamps();
    }
    public function users()
{
    return $this->belongsToMany(User::class, 'peminjaman', 'BukuID', 'UserID')
                ->withPivot('TanggalPeminajaman')
                ->withTimestamps();
}
}