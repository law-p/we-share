<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id'];

    public function shares(){
        return $this->hasMany(Share::class);
}

public function user(){
    return $this->belongsTo(User::class);
}


}
