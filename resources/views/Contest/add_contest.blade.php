@section('title') 
Form Inputs
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"> @if(@$contest_data) Edit @else Add @endif Contest</h4>
        </div>
        {{--<div class="col-md-4 col-lg-4">--}}
            {{--<div class="widgetbar">--}}
                {{--<button class="btn btn-primary"><i class="ri-add-line align-middle mr-2"></i>ADD</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
<div class="contentbar">

    <!-- Start row -->
    @if(@$contest_data)
        <form method="post" action="{{url("update-contest")}}">
            @csrf
            <input type="hidden" name="contest_id" value="{{$contest_data->id}}">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="contest_name">Contest Name</label>
                    <input type="text" class="form-control" id="contest_name" name="name" placeholder="Enter Contest Name" value="{{$contest_data->name}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="contest_duration">Contest Duration</label>
                    <select class="form-control" id="contest_duration" name="duration">
                        <option disabled>Select Duration</option>
                        <option @if($contest_data->duration == "12 Hours") selected @endif>12 Hours</option>
                        <option @if($contest_data->duration == "24 Hours") selected @endif>24 Hours</option>
                        <option @if($contest_data->duration == "3 Days") selected @endif>3 Days</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="contest_start_time">Contest Start Time</label>

                    <input type="datetime-local" class="form-control" id="contest_start_time" name="start_time" placeholder="Contest Start time" value="{{\Carbon\Carbon::parse($contest_data->start_time)->format('Y-m-d\TH:i')}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="contest_slots">Slots available</label>
                    <input type="number" class="form-control" id="contest_slots" name="contest_slots" placeholder="Enter Contest Slots" value="{{@$contest_data->slots}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="contest_coins">Coins Available to the contestants to pick</label>
                    <select class="form-control" id="contest_coins" name="coins_available">
                        <option @if($contest_data->coins_available == "Low Cap") selected @endif>Low Cap</option>
                        <option @if($contest_data->coins_available == "Large Cap") selected @endif>Large Cap</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="contest_fee">Entrance Fee (in Boost Tokens)</label>
                    <select class="form-control" id="contest_fee" name="contest_fee">
                        <option @if($contest_data->entrance_fee == "1 Token") selected @endif>1 Token</option>
                        <option @if($contest_data->entrance_fee == "$5") selected @endif>$5</option>

                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="contest_slots">Contest Salary Cap</label>
                    <input type="number" class="form-control" id="contest_salary_cap" name="contest_salary_cap" placeholder="Enter Contest Salary Cap" value="{{@$contest_data->contest_salary_cap}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="contest_slots">Contest Salary</label>
                    <input type="number" class="form-control" id="contest_salary" name="contest_salary" required placeholder="Enter Contest Salary" value="{{@$contest_data->salary}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="contest_coins">Multiplier slot amount</label>
                    <select class="form-control" id="multiplier" name="multiplier_amount">
                        <option value="1" @if($contest_data->multiplier_amount == "1") selected @endif>1x</option>
                        <option value="2" @if($contest_data->multiplier_amount == "2") selected @endif>2x</option>
                        <option value="3" @if($contest_data->multiplier_amount == "3") selected @endif>3x</option>
                        <option value="4" @if($contest_data->multiplier_amount == "4") selected @endif>4x</option>
                        <option value="5" @if($contest_data->multiplier_amount == "5") selected @endif>5x</option>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="contest_desc">Contest Short Description</label>
                    <textarea class="form-control" id="contest_desc" name="description" placeholder="Enter description">{{@$contest_data->description}}</textarea>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>


    @else
    <form method="post" action="{{url("submit-contest")}}">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="contest_name">Contest Name</label>
                <input type="text" class="form-control" id="contest_name" name="name" placeholder="Enter Contest Name" required>
            </div>
            <div class="form-group col-md-4">
                <label for="contest_duration">Contest Duration</label>
                <select class="form-control" id="contest_duration" name="duration" required>
                    <option disabled>Select Duration</option>
                    <option>12 Hours</option>
                    <option>24 Hours</option>
                    <option>3 Days</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="contest_start_time">Start time</label>
                <input type="datetime-local" class="form-control" id="contest_start_time" required name="start_time" placeholder="Contest Start time">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="contest_slots">Contest Slots</label>
                <input type="number" class="form-control" id="contest_slots" name="contest_slots" required placeholder="Enter Contest Slots">
            </div>
            <div class="form-group col-md-4">
                <label for="contest_coins">Coins Available to the contestants to pick</label>
                <select class="form-control" id="contest_coins" name="coins_available" required>
                    <option >Low Cap</option>
                    <option >Large Cap</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="contest_fee">Entrance Fee</label>
                <select class="form-control" id="contest_fee" name="contest_fee" required>
                    <option >1 Token</option>
                    <option >$5</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="contest_slots">Contest Salary Cap</label>
                <input type="number" class="form-control" id="contest_salary_cap" name="contest_salary_cap" required placeholder="Enter Contest Salary Cap">
            </div>
            <div class="form-group col-md-4">
                <label for="contest_slots">Contest Salary</label>
                <input type="number" class="form-control" id="contest_salary" name="contest_salary" required placeholder="Enter Contest Salary">
            </div>
            <div class="form-group col-md-4">
                <label for="contest_coins">Multiplier slot amount</label>
                <select class="form-control" id="multiplier" name="multiplier_amount" required>
                    <option value="1">1x</option>
                    <option value="2">2x</option>
                    <option value="3">3x</option>
                    <option value="4">4x</option>
                    <option value="5">5x</option>
                </select>
            </div>


        </div>


        <div class="row">
            <div class="form-group col-md-12">
                <label for="contest_desc">Contest Description</label>
                <textarea class="form-control" required id="contest_desc" name="description" placeholder="Enter description"></textarea>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        @endif
</div>
<!-- End Contentbar -->
@endsection 
@section('script')

@endsection 