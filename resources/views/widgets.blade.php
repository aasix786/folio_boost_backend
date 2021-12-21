@section('title') 
Widgets
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
            <div class="card m-b-30">
                <div class="card-header">                                
                    <h5 class="card-title mb-0">Leads</h5>
                </div>
                <div class="card-body pb-0">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h4>125</h4>
                        </div>
                        <div class="col-6 text-right">
                            <p class="mb-0"><i class="ri-arrow-right-up-line text-success align-middle font-18 mr-1"></i>5%</p>
                            <p class="mb-0">This week</p>
                        </div>
                    </div>
                    <div id="apex-line-chart1"></div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <h5 class="card-title mb-0">Projects</h5>
                </div>
                <div class="card-body pb-0">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h4>1,345</h4>
                        </div>
                        <div class="col-6 text-right">
                            <p class="mb-0"><i class="ri-arrow-right-down-line text-danger align-middle font-18 mr-1"></i>15%</p>
                            <p class="mb-0">This week</p>
                        </div>
                    </div>
                    <div id="apex-line-chart2"></div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <h5 class="card-title mb-0">Clients</h5>
                </div>
                <div class="card-body pb-0">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h4>57</h4>
                        </div>
                        <div class="col-6 text-right">
                            <p class="mb-0"><i class="ri-arrow-right-up-line text-success align-middle font-18 mr-1"></i>45%</p>
                            <p class="mb-0">This week</p>
                        </div>
                    </div>
                    <div id="apex-line-chart3"></div>
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
                <div class="card-header text-center">                                
                    <h5 class="card-title mb-0">Top Employees</h5>
                </div>
                <div class="card-body">
                    <div class="user-slider">
                        <div class="user-slider-item">
                            <div class="card-body text-center">
                                <span class="action-icon badge badge-primary-inverse">JD</span>
                                <h5>John Doe</h5>
                                <p>Palo Alto, CA</p>
                                <p class="mt-3 mb-0"><span class="badge badge-primary font-weight-normal font-14 py-1 px-2">Designer</span></p>
                            </div>
                        </div>
                        <div class="user-slider-item">
                            <div class="card-body text-center">
                                <span class="action-icon badge badge-success-inverse">LS</span>
                                <h5>Lauren Smith</h5>
                                <p>New Parks, FL</p>
                                <p class="mt-3 mb-0"><span class="badge badge-success font-weight-normal font-14 py-1 px-2">Developer</span></p>
                            </div>
                        </div>
                        <div class="user-slider-item">
                            <div class="card-body text-center">
                                <span class="action-icon badge badge-secondary-inverse">MC</span>
                                <h5>Maria Carey</h5>
                                <p>Avenue Park, NY</p>
                                <p class="mt-3 mb-0"><span class="badge badge-secondary font-weight-normal font-14 py-1 px-2">HR</span></p>
                            </div>
                        </div>                               
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <div class="card bg-secondary-rgba text-center m-b-30">
                <div class="card-header">                                
                    <h5 class="card-title mb-0">Achievements</h5>
                </div>
                <div class="card-body">
                    <img src="assets/images/general/winner.svg" class="img-fluid img-winner" alt="achievements">
                    <h5 class="my-0">Worked more than 40 hours for 3 weeks.</h5>
                </div>
            </div>
        </div>
        <!-- End col -->
         <!-- Start col -->
        <div class="col-lg-12 col-xl-4">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">Orders by Country</h5>
                        </div>
                        <div class="card-body">
                            <div class="orders-country-slider">
                                <div class="orders-country-item">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="mt-0 mb-1">$2,59,875</h4>
                                            <p class="mb-0">1,298 Orders</p>
                                        </div>
                                        <i class="flag flag-icon-au flag-icon-squared ml-3"></i>
                                    </div>
                                </div>
                                <div class="orders-country-item">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="mt-0 mb-1">$2,59,875</h4>
                                            <p class="mb-0">1,298 Orders</p>
                                        </div>
                                        <i class="flag flag-icon-us flag-icon-squared ml-3"></i>
                                    </div>
                                </div>
                                <div class="orders-country-item">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="mt-0 mb-1">$2,59,875</h4>
                                            <p class="mb-0">1,298 Orders</p>
                                        </div>
                                        <i class="flag flag-icon-de flag-icon-squared ml-3"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12 col-xl-12">
                    <div class="card bg-secondary-rgba m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title font-16 mb-5">Download New Orders</h5>
                                    <p class="mb-0 text-primary font-30"><a href="#"><i class="ri-file-download-line"></i></a></p>
                                </div>
                                <div class="col-4 text-right">
                                    <img src="assets/images/general/order-download.svg" class="img-fluid" alt="order-download">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
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
<!-- Custom Widget js -->
<script src="{{ asset('assets/js/custom/custom-widgets.js') }}"></script>
@endsection 