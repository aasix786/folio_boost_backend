<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\ContestCoin;
use App\Models\ContestEndData;
use App\Models\ContestStartData;
use App\Models\ContestSubmission;
use App\Models\ContestWinner;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContestController extends Controller
{
    public function index(Request $request){
        $user_id = $request->input('user_id');
        if($user_id){
            $contests_arr = [];
            $current_time = Carbon::now();
            $contests = Contest::query()->where('status',0)->whereDate('start_time','>=', $current_time)->get();
            if (sizeof($contests) > 0){
                foreach ($contests as $contest){
                    $if_submitted = ContestSubmission::query()
                        ->where('user_id',$user_id)
                        ->where('contest_id',$contest->id)
                        ->first();
                    if ($if_submitted){
                        $slots_filled = ContestSubmission::query()->where('contest_id',$contest->id)->count();
                        $selected_coins = ContestCoin::query()
                            ->where('contest_submission_id',$if_submitted->id)
                            ->where('user_id',$user_id)
                            ->get();
                        $contest->selected_coins = $selected_coins;
                        $contest->slots_filled = $slots_filled;
                    }
                    array_push($contests_arr,$contest);
            }
            }

            $response = [
                'success'=>true,
                'data'=>$contests_arr,
                'time'=>$current_time,
            ];
        }else{
            $response = [
                'success'=>false,
                'message'=>"Params missing",
            ];
        }

        return json_encode($response);
    }
    public function contest_details(Request $request){
        $user_id = $request->input('user_id');
        $contest_id = $request->input('contest_id');
        if ($user_id){
            if ($contest_id){


                $contest_details = Contest::query()->where('id',$contest_id)->first();
                if ($contest_details){
                    $response = [
                        'success' => true,
                        'data' => $contest_details,
                    ];
                }else{

                $response = [
                    'success' => true,
                    'message' => "No contest found",
                ];
                }
            }else{
                $response = [
                    'success' => false,
                    'message' => "Please select contest",
                ];
            }

        }else{
            $response = [
                'code' => 401,
                'success' => false,
                'message' => "Please login to continue",
            ];
        }

        return json_encode($response);
    }
    public function my_contests(Request $request){
        $user_id = $request->input('user_id');

        if ($user_id){
$my_contests = [];
                $contest_submissions = ContestSubmission::query()->where('user_id',$user_id)->get();
                if (sizeof($contest_submissions) > 0){
                    foreach ($contest_submissions as $contest_submission){
                        $contest_details = Contest::query()->where('id',$contest_submission->contest_id)->first();
                        if ($contest_details){
                            $slots_filled = ContestSubmission::query()->where('contest_id',$contest_details->id)->count();

                            $selected_coins = ContestCoin::query()
                                ->where('contest_submission_id',$contest_submission->id)
                                ->where('user_id',$user_id)
                                ->get();
                            $contest_details->selected_coins = $selected_coins;
                            $contest_details->slots_filled = $slots_filled;
                            array_push($my_contests,$contest_details);
                        }
                    }

                }
            $response = [
                'success' => true,
                'data' => $my_contests,
            ];

        }else{
            $response = [
                'code' => 401,
                'success' => false,
                'message' => "Please login to continue",
            ];
        }

        return json_encode($response);
    }
    public function check_contest_winner(Request $request){
        $contest_id = $request->input('contest_id');

        if ($contest_id){

            $contest_winner = ContestWinner::query()->where('contest_id',$contest_id)->first();
            if ($contest_winner){
                $winner_data = User::query()->where('id',$contest_winner->user_id)->first();
                $contest_winner->user_data = $winner_data;
                $response = [
                    'success' => true,
                    'message' => $winner_data->name." has won the contest with a Portfolio : $ ".$contest_winner->portfolio,
                ];
            }else{
                $response = [
                    'success' => false,
                    'message' => "No Winner",
                ];
            }



        }else{
            $response = [
                'code' => 401,
                'success' => false,
                'message' => "Contest missing",
            ];
        }

        return json_encode($response);
    }
    public function submit_contest(Request $request){
        $user_id = $request->input('user_id');
        $contest_id = $request->input('contest_id');
        $selected_coins = $request->input('coins_arr');
        if ($user_id){
            if ($contest_id){
            if (count($selected_coins) > 0){

                $if_already  = ContestSubmission::query()->where('user_id',$user_id)->where('contest_id',$contest_id)->first();
               $c_id = null;
                if(!$if_already){
                    $add_submission = ContestSubmission::create([
                        'user_id' => $user_id,
                        'contest_id' => $contest_id,
                    ]);
                    $c_id = $add_submission['id'];
                }else{
                    $c_id = $if_already->id;
                }

                if ($c_id){
                    $submission_id = $c_id;

                    if ($if_already){
                        $change_previous = ContestCoin::query()
                            ->where('contest_submission_id',$c_id)
                            ->where('user_id',$user_id)
                            ->delete();
                    }
                    foreach ($selected_coins as $key => $selected_coin){
                        $add_coin_data = ContestCoin::create([
                            'user_id' => $user_id,
                            'contest_submission_id' => $submission_id,
                            'symbol' => $selected_coin['symbol'],
                            'coin_id' => $selected_coin['id'],
                            'name' => $selected_coin['name'],
                            'investment' => @$selected_coin['investment'],
                            'price' => @$selected_coin['quote']['USD']['price'] ? @$selected_coin['quote']['USD']['price'] : @$selected_coin['price'],
                            'cmc_rank' => $selected_coin['cmc_rank'],
                            'market_cap' => @$selected_coin['quote']['USD']['market_cap'] ? $selected_coin['quote']['USD']['market_cap'] : $selected_coin['market_cap'],
                            'market_cap_dominance' => @$selected_coin['quote']['USD']['market_cap_dominance'] ? @$selected_coin['quote']['USD']['market_cap_dominance'] : @$selected_coin['market_cap_dominance'],
                        ]);
                    }
                    $response = [
                        'success' => true,
                        'data' => "done",
                    ];
                }else{
                    $response = [
                        'success' => false,
                        'data' => "Contest not submitted",
                    ];
                }


            }else{
                $response = [
                    'success' => false,
                    'message' => "Please select coins",
                ];
            }


            }else{
                $response = [
                    'success' => false,
                    'message' => "Please select contest",
                ];
            }

        }else{
            $response = [
                'code' => 401,
                'success' => false,
                'message' => "Please login to continue",
            ];
        }

        return json_encode($response);
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

                                        if((int)$coin_price_closed > (int)$coin_price){
                                            $percent_gain = 100 - (((int)$coin_price / (int)$coin_price_closed) * 100);

                                            $val_from_investment = ((int)$coin_investment *  (int)$percent_gain) / 100;
                                            $user_total_portfolio_change = $user_total_portfolio_change + $val_from_investment;

                                        }
//                                    if((int)$coin_price_closed < (int)$coin_price){
//                                        $percent_loss = 100 - (((int)$coin_price_closed / (int)$coin_price) * 100);
//                                    }


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
        $response = [
            'success' => true,
        ];
        return json_encode($response);
    }
    private function get_coins_data(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=10&convert=USD',
//            CURLOPT_URL => 'https://sandbox-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=10&convert=USD',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'X-CMC_PRO_API_KEY: b7603765-62b7-44d1-827c-75e0ab60b116'
//                'X-CMC_PRO_API_KEY: b54bcf4d-1bca-4e8e-9a24-22ff2c3d462c'
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

}
