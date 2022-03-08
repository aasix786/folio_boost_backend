<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestEndData extends Model
{
    use HasFactory;
    protected $table = "contest_end_coin_data";
    protected $fillable = ['id','contest_id','symbol','coin_id','name','price','cmc_rank','market_cap','market_cap_dominance','created_at','updated_at'];
    protected $hidden = [];
}
