<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;
    protected $table = "contests";
    protected $fillable = ['id', 'name','duration','start_time','slots','coins_available', 'entrance_fee','description','created_at','updated_at'];
    protected $hidden = [];
}
