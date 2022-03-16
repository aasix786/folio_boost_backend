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
       $contest_salary_cap = $request->input('contest_salary_cap');
       $multiplier_amount = $request->input('multiplier_amount');
       $description = $request->input('description');


       if (!$name && !$duration && !$slots && !$coins_available && !$contest_fee && !$description && !$start_time){
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
        $contest_salary_cap = $request->input('contest_salary_cap');
        $multiplier_amount = $request->input('multiplier_amount');
       $description = $request->input('description');

        if (!$name && !$duration && !$slots && !$coins_available && !$contest_fee && !$description && !$start_time ){
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
