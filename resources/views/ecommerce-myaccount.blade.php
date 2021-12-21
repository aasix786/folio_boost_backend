@section('title') 
My Account
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
        <div class="col-lg-5 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <h5 class="card-title mb-0">My Account</h5>
                </div>
                <div class="card-body">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-2 active" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="ri-dashboard-line mr-2"></i>Dashboard</a>
                        <a class="nav-link mb-2" id="v-pills-order-tab" data-toggle="pill" href="#v-pills-order" role="tab" aria-controls="v-pills-order" aria-selected="false"><i class="ri-dropbox-line mr-2"></i>My Orders</a>
                        <a class="nav-link mb-2" id="v-pills-addresses-tab" data-toggle="pill" href="#v-pills-addresses" role="tab" aria-controls="v-pills-addresses" aria-selected="false"><i class="ri-map-pin-2-line mr-2"></i>My Addresses</a>
                        <a class="nav-link mb-2" id="v-pills-wishlist-tab" data-toggle="pill" href="#v-pills-wishlist" role="tab" aria-controls="v-pills-wishlist" aria-selected="false"><i class="ri-heart-2-line mr-2"></i>Wishlist</a>
                        <a class="nav-link mb-2" id="v-pills-wallet-tab" data-toggle="pill" href="#v-pills-wallet" role="tab" aria-controls="v-pills-wallet" aria-selected="true"><i class="ri-wallet-line mr-2"></i>Wallet</a>
                        <a class="nav-link mb-2" id="v-pills-chat-tab" data-toggle="pill" href="#v-pills-chat" role="tab" aria-controls="v-pills-chat" aria-selected="false"><i class="ri-message-3-line mr-2"></i>My Chat</a>
                        <a class="nav-link mb-2" id="v-pills-notifications-tab" data-toggle="pill" href="#v-pills-notifications" role="tab" aria-controls="v-pills-notifications" aria-selected="false"><i class="ri-notification-line mr-2"></i>Notifications</a>
                        <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="ri-user-settings-line mr-2"></i>My Profile</a>
                        <a class="nav-link text-danger" id="v-pills-logout-tab" data-toggle="pill" href="#v-pills-logout" role="tab" aria-controls="v-pills-logout" aria-selected="false"><i class="ri-shut-down-line mr-2"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-7 col-xl-9">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- Dashboard Start -->
                <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">Dashboard</h5>
                        </div>
                        <div class="card-body">
                            <div class="profilebox py-4 text-center">
                                <img src="assets/images/users/profile.svg" class="img-fluid mb-3" alt="profile">
                                <div class="profilename">
                                    <h5>John Doe</h5>
                                    <p class="text-muted my-3"><a href="{{url('/my-account')}}"><i class="ri-pencil-line mr-2"></i>Edit Profile</a></p>
                                </div>
                                <div class="button-list">
                                    <a href="#" class="btn btn-primary rounded-circle font-18"><i class="ri-facebook-line"></i></a>
                                    <a href="#" class="btn btn-info rounded-circle font-18"><i class="ri-twitter-line"></i></a>
                                    <a href="#" class="btn btn-danger rounded-circle font-18"><i class="ri-instagram-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start row -->
                    <div class="row">
                        <!-- Start col -->
                        <div class="col-lg-12 col-xl-4">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <div class="ecom-dashboard-widget">
                                        <div class="media">
                                            <i class="ri-dropbox-line"></i>
                                            <div class="media-body">
                                                <h5>My Orders</h5>
                                                <p>Pending (2)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End col -->
                        <!-- Start col -->
                        <div class="col-lg-12 col-xl-4">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <div class="ecom-dashboard-widget">
                                        <div class="media">
                                            <i class="ri-heart-2-line"></i>
                                            <div class="media-body">
                                                <h5>My Wishlist</h5>
                                                <p>Items (8)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End col -->
                        <!-- Start col -->
                        <div class="col-lg-12 col-xl-4">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <div class="ecom-dashboard-widget">
                                        <div class="media">
                                            <i class="ri-wallet-line"></i>
                                            <div class="media-body">
                                                <h5>My Wallet</h5>
                                                <p>Balance ($95)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End col -->
                    </div>  
                    <!-- End row -->
                </div>
                <!-- Dashboard End -->
                <!-- My Orders Start -->
                <div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">My Orders</h5>
                        </div>
                        <div class="card-body">
                            <div class="order-box">
                                <div class="card border m-b-30">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <h5>ID : #O2101</h5>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">Total : <strong>$500</strong></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>    
                                                        <th scope="col">Photo</th>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col" class="text-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td><img src="assets/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product"></td>
                                                        <td>Apple Watch</td>
                                                        <td>1</td>
                                                        <td>$100</td>
                                                        <td class="text-right">$100</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td><img src="assets/images/ecommerce/product_02.svg" class="img-fluid" width="35" alt="product"></td>
                                                        <td>Apple iPhone</td>
                                                        <td>2</td>
                                                        <td>$200</td>
                                                        <td class="text-right">$400</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <h5>Status : <span class="badge badge-info-inverse font-14">Shipped</span></h5>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="mb-0"><button class="btn btn-success font-16"><i class="ri-file-text-line mr-2"></i>Invoice</button></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-box">
                                <div class="card border m-b-30">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <h5>ID : #O2102</h5>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="mb-0">Total : <strong>$100</strong></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>    
                                                        <th scope="col">Photo</th>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col" class="text-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td><img src="assets/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product"></td>
                                                        <td>Apple iPad</td>
                                                        <td>1</td>
                                                        <td>$100</td>
                                                        <td class="text-right">$100</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <h5>Status : <span class="badge badge-primary-inverse font-14">Delivered</span></h5>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="mb-0"><button class="btn btn-success font-16"><i class="ri-file-text-line mr-2"></i>Invoice</button></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- My Orders End -->
                <!-- My Addresses Start -->
                <div class="tab-pane fade" id="v-pills-addresses" role="tabpanel" aria-labelledby="v-pills-addresses-tab">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">My Addresses</h5>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="address-box">
                                        <div class="card border m-b-30">
                                            <div class="card-body text-center py-5">
                                                <p><button type="button" class="btn btn-round btn-primary"><i class="ri-add-line"></i></button></p>
                                                <h5 class="mt-4 mb-0">Add New Address</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                            
                                <div class="col-lg-12 col-xl-6">
                                    <div class="address-box">
                                        <div class="card border m-b-30">
                                            <div class="card-header">
                                                <h5 class="mb-0">Amy Adams</h5>
                                            </div>
                                            <div class="card-body">
                                                <p>+1 9876543210</p>
                                                <p>4209 Public Work Drive, 24th Street, Near Oklahoma Building, Cleveland, Tennessee, USA.</p>
                                                <p class="mb-0">demo@example.com</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="button-list">
                                                    <a href="#" class="btn btn-round btn-success mb-1"><i class="ri-pencil-line"></i></a>
                                                    <a href="#" class="btn btn-round btn-danger mb-1"><i class="ri-delete-bin-3-line"></i></a>
                                                    <a href="#" class="btn btn-primary font-16 mb-0">Default</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="address-box">
                                        <div class="card border m-b-30">
                                            <div class="card-header">
                                                <h5 class="mb-0">Amy Adams</h5>
                                            </div>
                                            <div class="card-body">
                                                <p>+1 9876543210</p>
                                                <p>4209 Public Work Drive, 24th Street, Near Oklahoma Building, Cleveland, Tennessee, USA.</p>
                                                <p class="mb-0">demo@example.com</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="button-list">
                                                    <a href="#" class="btn btn-round btn-success mb-1"><i class="ri-pencil-line"></i></a>
                                                    <a href="#" class="btn btn-round btn-danger mb-1"><i class="ri-delete-bin-3-line"></i></a>
                                                    <a href="#" class="btn btn-primary font-16 mb-0">Default</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- My Addresses End -->
                <!-- My Wishlist Start -->
                <div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel" aria-labelledby="v-pills-wishlist-tab">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">My Wishlist</h5>
                        </div>
                        <div class="card-body">
                            <div class="wishlist-box">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>                            
                                                <th scope="col">Photo</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>                
                                                <td><img src="assets/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product"></td>
                                                <td>Apple Watch</td>
                                                <td>
                                                    <div class="form-group mb-0">
                                                        <input type="number" class="form-control cart-qty" name="cartQty1" id="cartQty1" value="1">
                                                    </div>
                                                </td>
                                                <td>$10</td>
                                                <td>$500</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary-rgba mb-1 mr-1"><i class="ri-shopping-cart-line"></i></button>
                                                    <button type="button" class="btn btn-danger-rgba mb-1"><i class="ri-delete-bin-3-line"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td><img src="assets/images/ecommerce/product_02.svg" class="img-fluid" width="35" alt="product"></td>
                                                <td>Apple iPhone</td>
                                                <td>
                                                    <div class="form-group mb-0">
                                                        <input type="number" class="form-control cart-qty" name="cartQty2" id="cartQty2" value="1">
                                                    </div>
                                                </td>
                                                <td>$20</td>
                                                <td>$200</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary-rgba mb-1 mr-1"><i class="ri-shopping-cart-line"></i></button>
                                                    <button type="button" class="btn btn-danger-rgba mb-1"><i class="ri-delete-bin-3-line"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td><img src="assets/images/ecommerce/product_03.svg" class="img-fluid" width="35" alt="product"></td>
                                                <td>Apple iPad</td>
                                                <td>
                                                    <div class="form-group mb-0">
                                                        <input type="number" class="form-control cart-qty" name="cartQty3" id="cartQty3" value="1">
                                                    </div>
                                                </td>
                                                <td>$30</td>
                                                <td>$300</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary-rgba mb-1 mr-1"><i class="ri-shopping-cart-line"></i></button>
                                                    <button type="button" class="btn btn-danger-rgba mb-1"><i class="ri-delete-bin-3-line"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- My Wishlist End -->
                <!-- My Wallet Start -->
                <div class="tab-pane fade" id="v-pills-wallet" role="tabpanel" aria-labelledby="v-pills-wallet-tab">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">My Wallet</h5>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-sm-6 col-md-6 col-lg-4">
                                    <img src="assets/images/ecommerce/wallet.svg" class="img-fluid" alt="wallet">
                                </div>
                            </div>
                            <div class="wallet-box">
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <h4 class="text-primary"><i class="ri-bank-card-2-line mr-2"></i>$95 <span class="font-14">Balance</span></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-0"><button class="btn btn-success font-16"><i class="ri-add-line mr-2"></i>Add Money</button></p>
                                    </div>
                                </div>
                            </div>                                        
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title mb-0">Transactions</h5>
                                </div>
                                <div class="col-4">
                                    <ul class="list-inline-group text-right mb-0 pl-0">
                                        <li class="list-inline-item mr-0 font-12"><button type="button" class="btn btn-sm btn-primary-rgba px-2">Export</button></li>
                                    </ul>                                        
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="wallet-transaction-box">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>     
                                                <th scope="col">Name</th>
                                                <th scope="col">Withdraw</th>
                                                <th scope="col">Deposit</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Comment</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>              
                                                <td>Apple Inc.</td>
                                                <td>$1,85,000</td>
                                                <td>-</td>
                                                <td><span class="badge badge-success-inverse">Success</span></td>
                                                <td>Transaction ID : 9875648951</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>                
                                                <td>Dell</td>
                                                <td>-</td>
                                                <td>$2,05,000</td>
                                                <td><span class="badge badge-danger-inverse">Reject</span></td>
                                                <td>Bank Transaction ID : 2458615478</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>                
                                                <td>HP Care</td>
                                                <td>$5,000</td>
                                                <td>-</td>
                                                <td><span class="badge badge-success-inverse">Success</span></td>
                                                <td>Battery Replacement</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                                        
                        </div>
                    </div>
                </div>
                <!-- My Wallet End -->
                <!-- My Chat Start -->
                <div class="tab-pane fade" id="v-pills-chat" role="tabpanel" aria-labelledby="v-pills-chat-tab">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title mb-0">My Chat</h5>
                                </div>
                                <div class="col-4">
                                    <ul class="list-inline-group text-right mb-0 pl-0">
                                        <li class="list-inline-item mr-0 font-12">
                                            <div class="form-group mb-0 amount-spent-select">
                                                <select class="form-control" id="formControlSelect">
                                                  <option>Order #1</option>
                                                  <option>Order #2</option>
                                                  <option>Order #3</option>
                                                  <option>Order #4</option>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>                                        
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="chat-detail border-0 mb-0">
                                <div class="chat-body">
                                    <div class="chat-day text-center mb-3">
                                        <span class="badge badge-secondary">Today</span>
                                    </div>                                
                                    <div class="chat-message chat-message-right">
                                        <div class="chat-message-text">
                                            <span>Hello! please, let me know the status about project after school.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:18 pm<i class="ri-check-line ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-left">
                                        <div class="chat-message-text">
                                            <span>I have completed 4 stages 5 stages remaining.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:20 pm<i class="ri-check-line ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-right">
                                        <div class="chat-message-text">
                                            <span>I request you to schedule demo at 3 pm after 2 days for the better progress.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:25 pm<i class="ri-check-line ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-left">
                                        <div class="chat-message-text">
                                            <span>Sure, I will prepare for the same.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:27 pm<i class="ri-check-line ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-right">
                                        <div class="chat-message-text">
                                            <span>Great. Thanks</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:30 pm<i class="ri-check-line ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-left">
                                        <div class="chat-message-text">
                                            <span>I have completed 4 stages 5 stages remaining.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:20 pm<i class="ri-check-line ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-right">
                                        <div class="chat-message-text">
                                            <span>I request you to schedule demo at 3 pm after 2 days for the better progress.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:25 pm<i class="ri-check-line ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-left">
                                        <div class="chat-message-text">
                                            <span>Sure, I will prepare for the same.</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:27 pm<i class="ri-check-line ml-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="chat-message chat-message-right">
                                        <div class="chat-message-text">
                                            <span>Great. Thanks</span>
                                        </div>
                                        <div class="chat-message-meta">
                                            <span>4:30 pm<i class="ri-check-line ml-2"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-bottom">
                                    <div class="chat-messagebar">
                                        <form>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary-rgba" type="button" id="button-addonmic"><i class="ri-mic-2-line"></i></button>
                                                </div>  
                                                <input type="text" class="form-control" placeholder="Type a message..." aria-label="Text">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary-rgba" type="submit" id="button-addonlink"><i class="ri-links-line"></i></button>
                                                    <button class="btn btn-primary-rgba" type="button" id="button-addonsend"><i class="ri-send-plane-line"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- My Chat End -->
                <!-- My Notifications Start -->
                <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel" aria-labelledby="v-pills-notifications-tab">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">Notifications</h5>
                        </div>
                        <div class="card-body">
                            <div class="ecom-notification-box">
                                <ul class="list-unstyled">
                                    <li class="media">
                                        <span class="mr-3 action-icon badge badge-success"><i class="ri-check-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="action-title">Payment Success !!!</h5>
                                            <p class="my-3">We have received your payment toward ad Account : 9876543210. Your Ad is Running.</p>
                                            <p><span class="badge badge-danger-inverse">INFO</span><span class="badge badge-info-inverse">STATUS</span><span class="timing">Today, 09:39 PM</span></p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <span class="mr-3 action-icon badge badge-primary"><i class="ri-calendar-2-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="action-title">Nobita Applied for Leave.</h5>
                                            <p class="my-3">Nobita applied for leave due to personal reasons on 22nd Feb.</p>
                                            <p><span class="badge badge-success">APPROVE</span><span class="badge badge-danger">REJECT</span><span class="timing">Yesterday, 05:25 PM</span></p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <span class="mr-3 action-icon badge badge-danger"><i class="ri-spam-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="action-title">Alert</h5>
                                            <p class="my-3">There has been new Log in fron your account at Melbourne. Mark it safe or report.</p>
                                            <p><i class="ri-check-line text-success mr-3"></i><a href="#" class="mr-2">Report Now</a><span class="timing">5 Jan 2019, 02:13 PM</span></p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <span class="mr-3 action-icon badge badge-warning"><i class="ri-award-line"></i></span>
                                        <div class="media-body">
                                            <h5 class="action-title">Congratulations !!!</h5>
                                            <p class="my-3">Your role in the organization has been changed from Editor to Chief Strategist.</p>
                                            <p><span class="badge badge-danger-inverse">ACTIVITY</span><span class="timing">10 Jan 2019, 08:49 PM</span></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- My Notifications End -->
                <!-- My Profile Start -->
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">My Profile</h5>
                        </div>
                        <div class="card-body">
                            <div class="profilebox pt-4 text-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-success-rgba font-18"><i class="ri-edit-circle-line"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <img src="assets/images/users/profile.svg" class="img-fluid" alt="profile">
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-danger-rgba font-18"><i class="ri-delete-bin-3-line"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">Edit Profile Informations</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="usermobile">Mobile Number</label>
                                        <input type="text" class="form-control" id="usermobile">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="userbirthdate">Date of Birth</label>
                                        <input type="date" class="form-control" id="userbirthdate">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="userconfirmedpassword">Confirmed Password</label>
                                        <input type="password" class="form-control" id="userconfirmedpassword">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="usermale" name="usergender" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="usermale">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="userfemale" name="usergender" class="custom-control-input">
                                        <label class="custom-control-label" for="userfemale">Female</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary-rgba font-16"><i class="ri-save-line mr-2"></i>Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- My Profile End -->
                <!-- My Logout Start -->
                <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <h5 class="card-title mb-0">Logout</h5>                                       
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-xl-4">
                                    <div class="logout-content text-center my-5">
                                        <img src="assets/images/ecommerce/logout.svg" class="img-fluid mb-5" alt="logout">
                                        <h2 class="text-success">Logout ?</h2>
                                        <p class="my-4">Are you sure to want to Log out? You will miss your instant checkout deal.</p>
                                        <div class="button-list">
                                            <button type="button" class="btn btn-danger font-16"><i class="ri-check-line mr-2"></i>Yes, I'm sure</button>
                                            <button type="button" class="btn btn-success font-16"><i class="ri-close-line mr-2"></i>Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- My Logout End -->                            
            </div>                        
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->                  
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- eCommerce My Account Page js -->
<script src="{{ asset('assets/js/custom/custom-ecommerce-myaccount.js') }}"></script>
@endsection 