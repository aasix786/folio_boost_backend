<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\ContestCoin;
use App\Models\ContestSubmission;
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

}
