<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestWinner extends Model
{
    use HasFactory;
    protected $table = "contest_winner";
    protected $fillable = ['id', 'contest_id','user_id','portfolio','created_at','updated_at'];
    protected $hidden = [];
}
