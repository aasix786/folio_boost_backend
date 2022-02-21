<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestCoin extends Model
{
    use HasFactory;
    protected $table = "contest_coins";
    protected $fillable = ['id', 'user_id','symbol','contest_submission_id','coin_id','name','price','cmc_rank','market_cap','market_cap_dominance','created_at','updated_at'];
    protected $hidden = [];
}
