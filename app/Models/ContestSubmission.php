<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestSubmission extends Model
{
    use HasFactory;
    protected $table = "contest_submissions";
    protected $fillable = ['id', 'contest_id','user_id','coin_id','created_at','updated_at'];
    protected $hidden = [];
}
