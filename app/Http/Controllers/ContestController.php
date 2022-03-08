<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\ContestCoin;
use App\Models\ContestEndData;
use App\Models\ContestStartData;
use App\Models\ContestSubmission;
use App\Models\ContestWinner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContestController extends Controller
{
   public function index(){
       $user_data = Auth::user();

       if ($user_data){
           $contests_arr = Contest::all();
       }else{
           return redirect('login');
       }
       return view('Contest.index', compact('contests_arr'));
   }
    public function add_contest(){
        return view('Contest.add_contest');
    }
    public function edit_contest($id = null){
       $user_data = Auth::user();
       if ($user_data){
           if ($id){
               $contest_data = Contest::query()->where('id',$id)->first();
               return view('Contest.add_contest',compact('contest_data'));

           }

       }

           return redirect('login');

    }
    public function submit_contest(Request $request){
       $name = $request->input('name');
       $start_time = $request->input('start_time');
       $duration = $request->input('duration');
       $slots = $request->input('contest_slots');
       $coins_available = $request->input('coins_available');
       $contest_fee = $request->input('contest_fee');
       $salary = $request->input('contest_salary');
       $contest_salary_cap = $request->input('contest_salary_cap');
       $multiplier_amount = $request->input('multiplier_amount');
       $description = $request->input('description');


       if (!$name && !$duration && !$slots && !$coins_available && !$contest_fee && !$description && !$start_time && !$salary){
           return redirect()->back()->with('message','Please fill all fields');
       }

        $duration_int = (int) filter_var($duration, FILTER_SANITIZE_NUMBER_INT);
        $hour = "Hours";
        $day = "Days";
        $end_time = null;
        if(strpos($duration, $hour) !== false){
            $end_time = Carbon::parse($start_time)->addHours($duration_int);
        } else if(strpos($duration, $day) !== false){
            $end_time = Carbon::parse($start_time)->addDays($duration_int);
        }else{

        }


        $ex = (int) filter_var($contest_fee, FILTER_SANITIZE_NUMBER_INT);
        $prize = $slots * $ex;

       $add_contest = Contest::create([
           'name' => $name,
           'start_time' => $start_time,
           'end_time' => $end_time,
           'duration' => $duration,
           'slots' => $slots,
           'coins_available' => $coins_available,
           'entrance_fee' => $contest_fee,
           'salary' => $salary,
           'contest_salary_cap' => $contest_salary_cap,
           'multiplier_amount' => $multiplier_amount,
           'prize' => $prize,
           'description' => $description,
       ]);
       if ($add_contest){
           return redirect('contests');
       }else{
           return redirect()->back();

       }

    }
    public function update_contest(Request $request){

        $contest_id = $request->input('contest_id');
        $start_time = $request->input('start_time');
        $name = $request->input('name');
       $duration = $request->input('duration');
       $slots = $request->input('contest_slots');
       $coins_available = $request->input('coins_available');
       $contest_fee = $request->input('contest_fee');
        $salary = $request->input('contest_salary');
        $contest_salary_cap = $request->input('contest_salary_cap');
        $multiplier_amount = $request->input('multiplier_amount');
       $description = $request->input('description');

        if (!$name && !$duration && !$slots && !$coins_available && !$contest_fee && !$description && !$start_time && !$salary){
           return redirect()->back()->with('message','Please fill all fields');
       }
        $duration_int = (int) filter_var($duration, FILTER_SANITIZE_NUMBER_INT);
        $hour = "Hours";
        $day = "Days";
        $end_time = null;
        if(strpos($duration, $hour) !== false){
            $end_time = Carbon::parse($start_time)->addHours($duration_int);
        } else if(strpos($duration, $day) !== false){
            $end_time = Carbon::parse($start_time)->addDays($duration_int);
        }else{

        }


        $ex = (int) filter_var($contest_fee, FILTER_SANITIZE_NUMBER_INT);
        $prize = $slots * $ex;
        $update_data = array(
            'name' => $name,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'duration' => $duration,
            'slots' => $slots,
            'coins_available' => $coins_available,
            'entrance_fee' => $contest_fee,
            'salary' => $salary,
            'contest_salary_cap' => $contest_salary_cap,
            'multiplier_amount' => $multiplier_amount,
            'prize' => $prize,
            'description' => $description,
        );
        $update_contest = Contest::query()
            ->where('id',$contest_id)
            ->update($update_data);

       if ($update_contest){
           return redirect('contests');
       }else{
           return redirect()->back();
       }

    }
    public function contest_start(){
       $contests_pending = Contest::query()->where('status',0)->get();
       if (sizeof($contests_pending) > 0){
           foreach ($contests_pending as $contest_p){
               $start_time = $contest_p->start_time;
               $current_time = Carbon::now();

               $result = $current_time->gt($start_time);
               // contest start logic
               if($result){
                   $update_contest_data = array(
                       'status'=>1
//                       'status'=>1
                   );
                   $update_contest_status = Contest::query()
                       ->where('id',$contest_p->id)
                       ->update($update_contest_data);
                   if ($update_contest_status){
                       $coins_data = $this->get_coins_data();
                      if ($coins_data){
                          $coins_arr = $coins_data;
                          if (sizeof($coins_arr) > 0) {
                              foreach ($coins_arr as $key => $coin) {
                                  $add_coin_data = ContestStartData::create([
                                      'contest_id' => $contest_p->id,
                                      'symbol' => $coin->symbol,
                                      'coin_id' => $coin->id,
                                      'name' => $coin->name,
                                      'price' => @$coin->quote->USD->price ? @$coin->quote->USD->price : @$coin->price,
                                      'cmc_rank' => $coin->cmc_rank,
                                      'market_cap' => @$coin->quote->USD->market_cap ? $coin->quote->USD->market_cap : $coin->market_cap,
                                      'market_cap_dominance' => @$coin->quote->USD->market_cap_dominance ? @$coin->quote->USD->market_cap_dominance : @$coin->market_cap_dominance,
                                  ]);
                                  if ($add_coin_data){
                                      $contest_submission_id = ContestSubmission::query()->where('contest_id',$contest_p->id)->pluck('id')->first();
                                      if ($contest_submission_id){
                                          $update_contest_coins_data = array(
                                              'price' => @$coin->quote->USD->price ? @$coin->quote->USD->price : @$coin->price,
                                              'cmc_rank' => $coin->cmc_rank,
                                              'market_cap' => @$coin->quote->USD->market_cap ? $coin->quote->USD->market_cap : $coin->market_cap,
                                              'market_cap_dominance' => @$coin->quote->USD->market_cap_dominance ? @$coin->quote->USD->market_cap_dominance : @$coin->market_cap_dominance,
                                          );
                                          $update_contest_coins = ContestCoin::query()
                                              ->where('contest_submission_id',$contest_submission_id)
                                              ->where('symbol',$coin->symbol)
                                              ->update($update_contest_coins_data);

                                      }

                                  }

                              }
                          }

                      }else{
                          echo "failed to fetch coins data";
                      }

                   }



               }
               // contest end logic

           }
       }
       $contests_started = Contest::query()->where('status',1)->get();
       if (sizeof($contests_started) > 0){
           foreach ($contests_started as $contest_s){
               $end_time = $contest_s->end_time;
               $current_time = Carbon::now();

               $result = $current_time->gt($end_time);
               if($result){
                   $update_contest_data = array(
                       'status'=>2
                   );
                   $update_contest_status = Contest::query()
                       ->where('id',$contest_s->id)
                       ->update($update_contest_data);
                   if ($update_contest_status){
                       $coins_data = $this->get_coins_data();
                       if ($coins_data){
                           $coins_arr = $coins_data;
                           if (sizeof($coins_arr) > 0) {
                               foreach ($coins_arr as $key => $coin) {
                                   $add_coin_data = ContestEndData::create([
                                       'contest_id' => $contest_s->id,
                                       'symbol' => $coin->symbol,
                                       'coin_id' => $coin->id,
                                       'name' => $coin->name,
                                       'price' => @$coin->quote->USD->price ? @$coin->quote->USD->price : @$coin->price,
                                       'cmc_rank' => $coin->cmc_rank,
                                       'market_cap' => @$coin->quote->USD->market_cap ? $coin->quote->USD->market_cap : $coin->market_cap,
                                       'market_cap_dominance' => @$coin->quote->USD->market_cap_dominance ? @$coin->quote->USD->market_cap_dominance : @$coin->market_cap_dominance,
                                   ]);

                               }
                           }

                       }else{
                           echo "failed to fetch coins data";
                       }

                   }




               }

               $contest_starting_data = ContestSubmission::query()->where('contest_id',$contest_s->id)->get();
               if (sizeof($contest_starting_data) > 0){
                   $final_arr = [];
                   foreach ($contest_starting_data as $submission){
                       $submitted_coins = ContestCoin::query()
                           ->where('contest_submission_id', $submission->id)
                           ->where('user_id', $submission->user_id)
                           ->get();

                       if (sizeof($submitted_coins) > 0){
                           $user_total_portfolio_change = 0;
                           foreach ($submitted_coins as $submitted_coin){
                               $coin_symbol = $submitted_coin->symbol;
                               $coin_price = $submitted_coin->price;
                               $coin_investment = $submitted_coin->investment;

                               $closed_coin_data = ContestEndData::query()
                                   ->where('contest_id',$contest_s->id)
                                   ->where('symbol',$coin_symbol)
                                   ->first();

                               if ($closed_coin_data){
                                   $coin_price_closed = $closed_coin_data->price;

                                   $difference_price_coin = (int)$coin_price_closed - (int)$coin_price;
                                   $user_total_portfolio_change = $user_total_portfolio_change + $difference_price_coin;

                               }else{
                                   break;
                               }


                           }
                           $obj = [
                               'user_id' => $submission->user_id,
                               'portfolio' => $user_total_portfolio_change
                           ];
                           array_push($final_arr,$obj);
                       }

                   }
                   $final_arr = json_encode($final_arr);
                   $final_arr = json_decode($final_arr);
                   if(sizeof($final_arr) > 0){
                       usort($final_arr,function($a, $b) {
                           return $a->portfolio < $b->portfolio;
                       });

                       $winner_obj = @$final_arr[0];
                       if ($winner_obj){
                           $add_winner = ContestWinner::create([
                               'contest_id' => $contest_s->id,
                               'user_id' => $winner_obj->user_id,
                               'portfolio' => $winner_obj->portfolio + $contest_s->contest_salary_cap,
                           ]);

                       }
                   }


               }
           }
       }
    }
    private function get_coins_data(){

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://sandbox-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=10&convert=USD',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'X-CMC_PRO_API_KEY: b54bcf4d-1bca-4e8e-9a24-22ff2c3d462c'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
$res_json = json_decode($response);
if ($res_json->status->error_code == 0){
    return $res_json->data;
}else{
    return false;
}


    }
    public function test(){
        dd(3 - 6) ;

    }
}
