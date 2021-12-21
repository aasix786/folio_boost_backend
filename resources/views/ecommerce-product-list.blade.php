@section('title') 
Product List
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
                            <h5 class="card-title mb-0">All Products</h5>
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
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Categories</th>
                                    <th>Tags</th>
                                    <th>Orders</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">#1</th>
                                    <td><img src="assets/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Apple MacBook Pro</td>
                                    <td class="text-success">In Stock</td>
                                    <td>$1,70,000</td>
                                    <td>Electronics</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Gaming</span><span class="badge badge-secondary-inverse">Popular</span></td>
                                    <td>180</td>
                                    <td>01/04/2020</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#2</th>
                                    <td><img src="assets/images/ecommerce/product_02.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Dell Alienware</td>
                                    <td class="text-danger">Out of Stock</td>
                                    <td>$60,000</td>
                                    <td>Electronics, Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Old</span><span class="badge badge-secondary-inverse">Sale</span></td>
                                    <td>525</td>
                                    <td>28/03/2020</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#3</th>
                                    <td><img src="assets/images/ecommerce/product_03.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Acer Predator Helios</td>
                                    <td class="text-success">In Stock</td>
                                    <td>$82,000</td>
                                    <td>Electronics, Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Pupular</span><span class="badge badge-secondary-inverse">Gaming</span></td>
                                    <td>991</td>
                                    <td>22/03/2020</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#4</th>
                                    <td><img src="assets/images/ecommerce/product_04.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Asus ROG Strix</td>
                                    <td class="text-success">In Stock</td>
                                    <td>$55,000</td>
                                    <td>Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Trending</span><span class="badge badge-secondary-inverse">Latest</span></td>
                                    <td>630</td>
                                    <td>18/03/2020</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#5</th>
                                    <td><img src="assets/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Razer Blade Pro 17</td>
                                    <td class="text-danger">Out of Stock</td>
                                    <td>$98,000</td>
                                    <td>Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Popular</span><span class="badge badge-secondary-inverse">New</span></td>
                                    <td>710</td>
                                    <td>11/03/2020</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#6</th>
                                    <td><img src="assets/images/ecommerce/product_02.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>HP Spectre x360</td>
                                    <td class="text-success">In Stock</td>
                                    <td>$56,000</td>
                                    <td>Electronics, Computers</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Featured</span><span class="badge badge-secondary-inverse">Trending</span></td>
                                    <td>480</td>
                                    <td>03/03/2020</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-success-rgba"><i class="ri-pencil-line"></i></a>
                                            <a href="#" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#7</th>
                                    <td><img src="assets/images/ecommerce/product_03.svg" class="img-fluid" width="35" alt="product"></td>
                                    <td>Lenovo Legion Y530</td>
                                    <td class="text-success">In Stock</td>
                                    <td>$75,000</td>
                                    <td>Electronics</td>
                                    <td><span class="badge badge-secondary-inverse mr-2">Latest</span><span class="badge badge-secondary-inverse">New</span></td>
                                    <td>223</td>
                                    <td>27/02/2020</td>
                                    <td>
                                        <div class="button-list">
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