<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo(User::class, 'from_user_id');
    }
    public function usersTo(){
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
