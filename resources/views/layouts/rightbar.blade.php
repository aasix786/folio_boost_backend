<div class="rightbar">
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="{{url('/')}}" class="mobile-logo"><img src="assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void();">
                                    <i class="ri-more-fill menu-hamburger-horizontal"></i>
                                    <i class="ri-more-2-fill menu-hamburger-vertical"></i>
                                 </a>
                             </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                    <i class="ri-close-line menu-hamburger-close"></i>
                                 </a>
                             </div>
                        </li>                                
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Topbar -->
    <div class="topbar">
        <!-- Start row -->
        <div class="row align-items-center">
            <!-- Start col -->
            <div class="col-md-12 align-self-center">
                <div class="togglebar">

                </div>
                <div class="infobar">
                    <ul class="list-inline mb-0">


                        <li class="list-inline-item">
                            <div class="profilebar">
                                <div class="dropdown">
                                  <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/profile.svg')}}" class="img-fluid" alt="profile"><span class="live-icon">{{\Illuminate\Support\Facades\Auth::user()->name}}</span></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                        {{--<a class="dropdown-item" href="#"><i class="ri-user-6-line"></i>My Profile</a>--}}
                                        {{--<a class="dropdown-item" href="#"><i class="ri-mail-line"></i>Email</a>--}}
                                        {{--<a class="dropdown-item" href="#"><i class="ri-settings-3-line"></i>Settings</a>--}}
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ri-shut-down-line"></i>Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>                                   
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End col -->
        </div> 
        <!-- End row -->
    </div>
    <!-- End Topbar -->
    <!-- Start Breadcrumbbar -->                    

    <!-- End Breadcrumbbar -->   
    @yield('rightbar-content')
    <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0">© 2022 Folioboost - All Rights Reserved.</p>
        </footer>
    </div>
    <!-- End Footerbar -->
</div>
