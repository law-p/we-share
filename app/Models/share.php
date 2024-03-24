<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class share extends Model
{
    use HasFactory;
     protected $fillable = ['content', 'likes', 'user_id'];

     public function comments(){
        return $this->hasMany(comment::class);
     }

     public function User(){
      return $this->belongsTo(User::class);
     }
}
