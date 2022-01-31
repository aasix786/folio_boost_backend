<?php

namespace App\Http\Controllers;

use App\Models\Contest;
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
       $description = $request->input('description');

       if (!$name && !$duration && !$slots && !$coins_available && !$contest_fee && !$description && !$start_time){
           return redirect()->back()->with('message','Please fill all fields');
       }
       $add_contest = Contest::create([
           'name' => $name,
           'start_time' => $start_time,
           'duration' => $duration,
           'slots' => $slots,
           'coins_available' => $coins_available,
           'entrance_fee' => $contest_fee,
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
        $name = $request->input('name');
       $duration = $request->input('duration');
       $slots = $request->input('contest_slots');
       $coins_available = $request->input('coins_available');
       $contest_fee = $request->input('contest_fee');
       $description = $request->input('description');

       if (!$name && !$duration && !$slots && !$coins_available && !$contest_fee && !$description){
           return redirect()->back()->with('message','Please fill all fields');
       }

        $update_data = array(
            'name' => $name,
            'duration' => $duration,
            'slots' => $slots,
            'coins_available' => $coins_available,
            'entrance_fee' => $contest_fee,
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
}
