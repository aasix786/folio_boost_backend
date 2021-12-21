@section('title') 
Order List
@endsection 
@extends('layouts.main')
@section('style')

@endsection 
@section('rightbar-content')
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title mb-0">All Orders</h5>
                        </div>
                        <div class="col-6">
                            <ul class="list-inline-group text-right mb-0 pl-0">
                                <li class="list-inline-item">
                                      <div class="form-group mb-0 amount-spent-select">
                                        <select class="form-control" id="formControlSelect">
                                          <option>All</option>
                                          <option>Last Week</option>
                                          <option>Last Month</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>                                        
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Invoice</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Warehouse</th>
                                    <th>Status</th>                                                
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">#o2101</th>
                                    <td>01</td>
                                    <td>Amy Adams</td>
                                    <td>01/04/2020</td>
                                    <td>$1,70,000</td>
                                    <td>Boston</td>
                                    <td><span class="badge badge-primary-inverse">Processing</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-primary-rgba"><i class="ri-save-line"></i></a>
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2102</th>
                                    <td>02</td>
                                    <td>Shiva Radharaman</td>
                                    <td>28/03/2020</td>
                                    <td>$60,000</td>
                                    <td>Washington DC</td>
                                    <td><span class="badge badge-secondary-inverse">Shipped</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-primary-rgba"><i class="ri-save-line"></i></a>
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2103</th>
                                    <td>03</td>
                                    <td>Ryan Smith</td>
                                    <td>22/03/2020</td>
                                    <td>$82,000</td>
                                    <td>San Francisco</td>
                                    <td><span class="badge badge-success-inverse">Completed</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-primary-rgba"><i class="ri-save-line"></i></a>
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2104</th>
                                    <td>04</td>
                                    <td>James Witherspon</td>
                                    <td>18/03/2020</td>
                                    <td>$55,000</td>
                                    <td>Las Vegas</td>
                                    <td><span class="badge badge-warning-inverse">Refunded</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-primary-rgba"><i class="ri-save-line"></i></a>
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2105</th>
                                    <td>05</td>
                                    <td>Courney Berry</td>
                                    <td>11/03/2020</td>
                                    <td>$98,000</td>
                                    <td>Los Angeles</td>
                                    <td><span class="badge badge-danger-inverse">Cancelled</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-primary-rgba"><i class="ri-save-line"></i></a>
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2106</th>
                                    <td>06</td>
                                    <td>Lisa Perry</td>
                                    <td>03/03/2020</td>
                                    <td>$56,000</td>
                                    <td>Chicago</td>
                                    <td><span class="badge badge-info-inverse">Delivered</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-primary-rgba"><i class="ri-save-line"></i></a>
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#o2107</th>
                                    <td>07</td>
                                    <td>John Doe</td>
                                    <td>27/02/2020</td>
                                    <td>$75,000</td>
                                    <td>New York</td>
                                    <td><span class="badge badge-success-inverse">Completed</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-primary-rgba"><i class="ri-save-line"></i></a>
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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

@endsection 