<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasanbukus extends Model
{
    use HasFactory;
    protected $primaryKey = 'UlasanID';
    protected $table = 'ulasanbukus';

    protected $fillable = ['Ulasan','Rating'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'ulasanbukus_users', 'UlasanID', 'UserID')->withTimestamps();
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'ulasanbukus_books', 'UlasanID', 'BukuID')->withTimestamps();
    }
}