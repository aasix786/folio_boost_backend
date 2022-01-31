<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\ContestCoin;
use App\Models\ContestSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContestController extends Controller
{
    public function index(){
        $contests = Contest::query()->where('status',0)->get();

        $response = [
            'success'=>true,
            'data'=>$contests,
        ];
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
    public function submit_contest(Request $request){
        $user_id = $request->input('user_id');
        $contest_id = $request->input('contest_id');
        $selected_coins = $request->input('coins_arr');
        if ($user_id){
            if ($contest_id){
            if (count($selected_coins) > 0){

                $add_submission = ContestSubmission::create([
                    'user_id' => $user_id,
                    'contest_id' => $contest_id,
                ]);
                if ($add_submission){
                    $submission_id = $add_submission['id'];

                    foreach ($selected_coins as $key => $selected_coin){
                        $add_coin_data = ContestCoin::create([
                            'user_id' => $user_id,
                            'contest_submission_id' => $submission_id,
                            'coin_id' => $selected_coin['id'],
                            'name' => $selected_coin['name'],
                            'price' => @$selected_coin['quote']['USD']['price'],
                            'cmc_rank' => $selected_coin['cmc_rank'],
                            'market_cap' => @$selected_coin['quote']['USD']['market_cap'],
                            'market_cap_dominance' => @$selected_coin['quote']['USD']['market_cap_dominance'],
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
