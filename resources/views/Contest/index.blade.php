@section('title') 
Bootstrap Table
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Contests</h4>
        </div>
        <div class="col-md-4 col-lg-4">
        <div class="widgetbar">
        <a href="{{url('add-contest')}}" class="btn btn-primary"><i class="ri-add-line align-middle mr-2"></i>ADD</a>
        </div>
        </div>
    </div>
</div>
<div class="contentbar">                
    <!-- Start row -->
    <div class="table-responsive m-b-30">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Duration</th>
                <th scope="col">Slots</th>
                <th scope="col">Coins Av.</th>
                <th scope="col">Entrance Fee</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @if(sizeof($contests_arr) > 0)
                @foreach(@$contests_arr as $key => $contest)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$contest->name}}</td>
                <td>{{$contest->duration}}</td>
                <td>{{$contest->slots}}</td>
                <td>{{$contest->coins_available}}</td>
                <td>{{$contest->entrance_fee}}</td>
                <td>
                    <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                        <div class="btn-group btn-group-sm" style="float: none;">
                            <a href="{{url('edit-contest/'.$contest->id)}}" type="button" class=" btn btn-sm btn-info" style="float: none; margin: 5px;">
                                <span class="ti-pencil"></span>
                            </a>
                            <a href="{{url('delete-contest/'.$contest->id)}}" type="button" class=" btn btn-sm btn-danger" style="float: none; margin: 5px;">
                                <span class="ti-trash"></span>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>


</div>
<!-- End Contentbar -->
@endsection 
@section('script')

@endsection 