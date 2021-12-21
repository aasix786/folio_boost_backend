@section('title') 
Hospital
@endsection 
@extends('layouts.main')
@section('style')
<!-- Apex css -->
<link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
<!-- Slick css -->
<link href="{{ asset('assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Contentbar -->    
<div class="contentbar">              
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body py-0">
                            <div class="row align-items-center no-gutters">
                                <div class="col-7 col-sm-5">
                                    <p class="font-15">Appointment</p>
                                    <h4 class="card-title mb-0">125</h4>
                                </div>
                                <div class="col-5 col-sm-7">
                                    <div id="apex-line-chart1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-b-30">
                       <div class="card-body py-0">
                            <div class="row align-items-center no-gutters">
                                <div class="col-7 col-sm-5">
                                    <p class="font-15">Operations</p>
                                    <h4 class="card-title mb-0">95</h4>
                                </div>
                                <div class="col-5 col-sm-7">
                                    <div id="apex-line-chart2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-body py-0">
                            <div class="row align-items-center no-gutters">
                                <div class="col-7 col-sm-5">
                                    <p class="font-15">Consultations</p>
                                    <h4 class="card-title mb-0">986</h4>
                                </div>
                                <div class="col-5 col-sm-7">
                                    <div id="apex-line-chart3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                                    
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-8">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-6 col-lg-9">
                            <h5 class="card-title mb-0">New Patients vs Recovered</h5>
                        </div>
                        <div class="col-6 col-lg-3">
                            <select class="form-control font-12">
                                <option value="class1" selected>Last Week</option>
                                <option value="class2">Last Month</option>
                                <option value="class3">Last Year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div id="apex-line-data-chart"></div>
                </div>
            </div>            
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <h5 class="card-title mb-5">Patient Statistics</h5>
                    <div class="row align-items-center no-gutters">
                        <div class="col-8">
                            <h4>298</h4>
                            <p class="mb-0">Total Attended</p>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#" class="btn btn-primary"><i class="ri-download-2-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body py-0 pl-0 pr-2">                                
                    <div id="apex-stacked-chart"></div>
                </div>
            </div>            
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h5 class="card-title mb-0">Activity</h5>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-outline-light text-muted btn-sm float-right font-12">View</button>
                        </div>
                    </div>
                </div>
                 <div class="card-body p-0">
                    <div class="ecom-notification-box">
                        <ul class="list-unstyled mb-0">
                            <li class="media">
                                <span class="mr-3 action-icon badge badge-primary"><i class="ri-user-6-line"></i></span>
                                <div class="media-body">
                                    <h5 class="action-title">New patient admitted.</h5>
                                    <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <p><span class="font-13">12 min ago</span></p>
                                </div>
                            </li>
                            <li class="media">
                                <span class="mr-3 action-icon badge badge-success"><i class="ri-check-line"></i></span>
                                <div class="media-body">
                                    <h5 class="action-title">Lot no 24 of medicine received.</h5>
                                    <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <p><span class="font-13">14 March 2020</span></p>
                                </div>
                            </li>
                            <li class="media">
                                <span class="mr-3 action-icon badge badge-secondary"><i class="ri-emotion-happy-line"></i></span>
                                <div class="media-body">
                                    <h5 class="action-title">Adam Discharged</h5>
                                    <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <p><span class="font-13">28 Feb 2020</span></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                 </div>
            </div>            
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">Doctors</h5>
                        </div>
                        <div class="card-body">
                            <div class="orders-country-slider">
                                <div class="orders-country-item">
                                    <div class="media">
                                        <img src="assets/images/users/boy.svg" class="img-fluid mr-3" alt="doctor">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">Dr. James Fauci</h5>
                                            <p class="mb-4">M.D. Neurosurgen, University of Michigan</p>
                                            <a href="#" class="btn btn-primary">Call Now</a>
                                        </div>                                                    
                                    </div>
                                </div>
                                <div class="orders-country-item">
                                    <div class="media">
                                        <img src="assets/images/users/girl.svg" class="img-fluid mr-3" alt="doctor">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">Dr. Meghan Abo</h5>
                                            <p class="mb-4">M.D (Cardiac), University of South Carolina</p>
                                            <a href="#" class="btn btn-success">Call Now</a>
                                        </div>                                                    
                                    </div>
                                </div>
                                <div class="orders-country-item">
                                    <div class="media">
                                        <img src="assets/images/users/men.svg" class="img-fluid mr-3" alt="doctor">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1">Dr. Neil Aaron</h5>
                                            <p class="mb-4">M.D (Cosmet), University of Memphis</p>
                                            <a href="#" class="btn btn-warning">Call Now</a>
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header text-center">                                
                            <h5 class="card-title mb-0">Happiness Survey</h5>
                        </div>
                        <div class="card-body py-0 px-0">    
                            <div id="apex-circle-chart"></div>
                        </div>
                    </div>
                </div>
            </div>                                    
        </div>
        <!-- End col -->
        
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- Apex js -->
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
<!-- Slick js -->
<script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
<!-- Dashboard js -->
<script src="{{ asset('assets/js/custom/custom-dashboard-hospital.js') }}"></script>
@endsection 