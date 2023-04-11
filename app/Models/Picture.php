<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
      protected $fillable = [
        'id',
        'name',
        'album_id',
    ];




    public function Album()
    {
         return $this->belongsTo(Album::class, 'album_id'); 
    }
}
