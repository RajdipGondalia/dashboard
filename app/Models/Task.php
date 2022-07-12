<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    protected $table = 'task';
    use HasFactory;

    public function user_name(){
        return $this->belongsTo(User::class,'user_id');
    }
}
