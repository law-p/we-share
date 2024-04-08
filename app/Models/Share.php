<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Share extends Model
{
    use HasFactory;
     protected $fillable = ['content', 'user_id'];

     public function comments(){
        return $this->hasMany(comment::class);
     }

     public function User(){
      return $this->belongsTo(User::class);
     }

     public function likes(){
      return $this->belongsToMany(User::class,  'share_like')->withTimestamps();
     }
}
