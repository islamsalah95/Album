<?php

namespace App\Models;

use App\Models\User;
use App\Models\Picture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'user_id'
    ];


    public function Picture()
    {
         return $this->hasMany(Picture::class, 'album_id'); 
    }

    
    public function User()
    {
         return $this->belongsTo(User::class, 'user_id'); 
    }
}
