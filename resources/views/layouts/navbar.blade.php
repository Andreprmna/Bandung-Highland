<div class="xp-rightbar">
    <!-- XP Search Modal -->
    <div class="modal fade xpSearchModal" id="xpSearchModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="xp-searchbar">
                        <form>
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn" type="submit" id="button-addon2">GO</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start XP Headerbar -->
    <div class="xp-headerbar">
        <!-- Start XP Topbar -->
        <div class="xp-topbar">
            <!-- Start XP Row -->
            <div class="row">
                <!-- Start XP Col -->
                <div class="col-2 col-md-2 col-lg-2 align-self-center">
                    <!-- Start XP Logobar -->
                    <div class="xp-logobar">
                        <a href="{{url('/')}}" class="xp-small-logo"><img src="assets/images/mobile-logo.svg" class="img-fluid" alt="logo"></a>
                        <a href="{{url('/')}}" class="xp-main-logo"><img src="assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                    </div>                        
                    <!-- End XP Logobar -->
                </div> 
                <!-- End XP Col -->
                <!-- Start XP Col -->
                <div class="col-10 col-md-10 col-lg-10">
                    <div class="xp-profilebar text-right">
                        <ul class="list-inline mb-0 mt-2">
                            <li class="list-inline-item">                                        
                                <div class="xp-search">
                                    <a href="#" class="text-white" data-toggle="modal" data-target="#xpSearchModal"><i class="icon-magnifier"></i></a>
                                </div>
                            </li>
                            {{-- <li class="list-inline-item">
                                <div class="dropdown xp-message">
                                    <a class="dropdown-toggle  text-white" href="#" role="button" id="xp-message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-speech font-18 v-a-m"></i>
                                        <span class="badge badge-pill bg-success-gradient xp-badge-up">8</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-message">
                                        <ul class="list-unstyled">
                                          <li class="media">
                                            <div class="media-body">
                                              <h5 class="mt-0 mb-0 py-3 text-white text-center font-16">8 New Messages</h5>
                                            </div>
                                          </li>  
                                          <li class="media xp-msg">
                                            <img class="mr-3 align-self-center rounded-circle" src="assets/images/topbar/user-message-1.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <a href="#">  
                                                    <h5 class="mt-0 mb-1 font-14">Ariel Blue<span class="font-12 f-w-4 float-right">3 min ago</span></h5>
                                                    <p class="mb-0 font-13">Thank you for attending...<span class="badge badge-pill badge-success float-right">2</span></p>
                                                </a>
                                            </div>
                                          </li>
                                          <li class="media xp-msg">
                                             <img class="mr-3 align-self-center rounded-circle" src="assets/images/topbar/user-message-2.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <a href="#">
                                                    <h5 class="mt-0 mb-1 font-14">Jammy Moon<span class="font-12 f-w-4 float-right">5 min ago</span></h5>
                                                    <p class="mb-0 font-13">Hey no worries! Trust me...<span class="badge badge-pill badge-success float-right">3</span></p>
                                                </a>
                                            </div>
                                          </li>
                                          <li class="media xp-msg">
                                             <img class="mr-3 align-self-center rounded-circle" src="assets/images/topbar/user-message-3.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <a href="#">
                                                    <h5 class="mt-0 mb-1 font-14">Lisa Ross<span class="font-12 f-w-4 float-right">5:25 PM</span></h5>
                                                    <p class="mb-0 font-13">Remedies for colic? i don't...<span class="badge badge-pill badge-success float-right">5</span></p>
                                                </a>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-0 py-3 text-black text-center font-14">
                                                    <a href="#" class="text-primary">View all</a>
                                                </h5>
                                            </div>      
                                          </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="dropdown xp-notification">
                                    <a class="dropdown-toggle  text-white" href="#" role="button" id="xp-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-bell font-18 v-a-m"></i>
                                        <span class="badge badge-pill bg-danger-gradient xp-badge-up">3</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-notification">
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-0 py-3 text-white text-center font-16">3 New Notifications</h5>
                                                </div>
                                            </li>  
                                            <li class="media xp-noti">                                                
                                                <div class="mr-3 xp-noti-icon primary-rgba"><i class="icon-user-follow text-primary"></i></div>
                                                <div class="media-body">
                                                    <a href="#">  
                                                        <h5 class="mt-0 mb-1 font-14">New user registered</h5>
                                                        <p class="mb-0 font-12 f-w-4">2 min ago</p>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="media xp-noti">
                                                <div class="mr-3 xp-noti-icon success-rgba"><i class="icon-basket-loaded text-success"></i></div>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <h5 class="mt-0 mb-1 font-14">New order placed</h5>
                                                        <p class="mb-0 font-12 f-w-4">8:45 PM</p>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="media xp-noti">
                                                <div class="mr-3 xp-noti-icon danger-rgba"><i class="icon-like text-danger"></i></div>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <h5 class="mt-0 mb-1 font-14">John like your photo.</h5>
                                                        <p class="mb-0 font-12 f-w-4">Yesterday</p>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-0 py-3 text-black text-center font-14">
                                                        <a href="#" class="text-primary">View all</a>
                                                    </h5>
                                                </div>
                                            </li>
                                        </ul>                                            
                                    </div>
                                </div>
                            </li> --}}
                            <li class="list-inline-item">
                                <a href="{{url('/page-login')}}"><span class="text-white">Login</span></a>          
                            </li>
                            <li class="list-inline-item mr-0">
                                <a href="{{url('/page-register')}}" class="text-white">Register</a>        
                            </li>
                            
                            {{-- <li class="list-inline-item mr-0">
                                <div class="dropdown xp-userprofile">
                                    <a class="dropdown-toggle " href="#" role="button" id="xp-userprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/topbar/user.jpg" alt="user-profile" class="rounded-circle img-fluid"><span class="xp-user-live"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-userprofile">
                                        <a class="dropdown-item py-3 text-white text-center font-16" href="#">Welcome, John Doe</a>
                                        <a class="dropdown-item" href="#"><i class="icon-user text-primary mr-2"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><i class="icon-wallet text-success mr-2"></i> Billing</a>
                                        <a class="dropdown-item" href="#"><i class="icon-settings text-warning mr-2"></i> Setting</a>
                                        <a class="dropdown-item" href="#"><i class="icon-lock text-info mr-2"></i> Lock Screen</a>
                                        <a class="dropdown-item" href="#"><i class="icon-power text-danger mr-2"></i> Logout</a>
                                    </div>
                                </div>                                   
                            </li> --}}
                            <li class="list-inline-item xp-horizontal-menu-toggle">
                                <button type="button" class="navbar-toggle bg-transparent" data-toggle="collapse" data-target="#navbar-menu">
                                    <i class="icon-menu font-20 text-white"></i>
                                </button>                                   
                            </li>
                        </ul>
                    </div>
                </div> 
                <!-- End XP Col -->
            </div> 
            <!-- End XP Row -->
        </div>
        <!-- End XP Topbar -->
        <!-- Start XP Menubar -->                    
        <div class="xp-menubar text-left">
            <!-- Start XP Nav -->
            <nav class="xp-horizontal-nav xp-mobile-navbar xp-fixed-navbar">
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="xp-horizontal-menu">
                        <li class="scroll"><a href="{{url('/')}}"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                        <li class="dropdown menu-item-has-mega-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-layers"></i><span>UI Kits</span></a>
                            <div class="mega-menu dropdown-menu">
                                <ul class="mega-menu-row" role="menu">
                                    <li class="mega-menu-col col-md-4">
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/ui-kits-alerts')}}">Alerts</a></li>
                                            <li><a href="{{url('/ui-kits-badges')}}">Badges</a></li>
                                            <li><a href="{{url('/ui-kits-buttons')}}">Buttons</a></li>
                                            <li><a href="{{url('/ui-kits-cards')}}">Cards</a></li>
                                            <li><a href="{{url('/ui-kits-carousel')}}">Carousel</a></li>
                                            <li><a href="{{url('/ui-kits-collapse')}}">Collapse</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-md-4">
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/ui-kits-dropdowns')}}">Dropdowns</a></li>
                                            <li><a href="{{url('/ui-kits-grids')}}">Grids</a></li>
                                            <li><a href="{{url('/ui-kits-images')}}">Images</a></li>
                                            <li><a href="{{url('/ui-kits-media')}}">Media</a></li>
                                            <li><a href="{{url('/ui-kits-modals')}}">Modals</a></li>                                
                                            <li><a href="{{url('/ui-kits-paginations')}}">Paginations</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-md-4">
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/ui-kits-popovers')}}">Popovers</a></li>                                
                                            <li><a href="{{url('/ui-kits-progressbars')}}">Progress Bars</a></li>
                                            <li><a href="{{url('/ui-kits-tabs')}}">Tabs</a></li>    
                                            <li><a href="{{url('/ui-kits-tooltips')}}">Tooltips</a></li>
                                            <li><a href="{{url('/ui-kits-typography')}}">Typography</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-social-dropbox"></i><span>Components</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/components-nestable')}}">Nestable</a></li>
                                <li><a href="{{url('/components-ratings')}}">Ratings</a></li>
                                <li><a href="{{url('/components-range-slider')}}">Range Slider</a></li>
                                <li><a href="{{url('/components-switchery')}}">Switchery</a></li>
                                <li><a href="{{url('/components-treeview')}}">Tree View</a></li>
                                <li><a href="{{url('/components-widgets')}}">Widgets</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-drop"></i><span>Icons</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/icon-material-design')}}">Material Design</a></li>
                                <li><a href="{{url('/icon-font-awesome')}}">Font Awesome</a></li>
                                <li><a href="{{url('/icon-simple-line')}}">Simple Line Icons</a></li>
                                <li><a href="{{url('/icon-themify')}}">Themify Icons</a></li>
                                <li><a href="{{url('/icon-typicons')}}">Typicons</a></li>
                                <li><a href="{{url('/icon-ionicons')}}">Ion Icons</a></li>
                                <li><a href="{{url('/icon-dripicons')}}">Dripicons</a></li>
                            </ul>
                        </li>
                        <li class="scroll"><a href="{{url('/events')}}"><i class="icon-event"></i><span>Events</span></a></li>
                        <li class="dropdown menu-item-has-mega-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-doc"></i><span>Forms</span></a>
                            <div class="mega-menu dropdown-menu">
                                <ul class="mega-menu-row" role="menu">
                                    <li class="mega-menu-col col-md-4">
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/form-inputs')}}">Form Inputs</a></li>
                                            <li><a href="{{url('/form-groups')}}">Form Groups</a></li>
                                            <li><a href="{{url('/form-layouts')}}">Form Layouts</a></li>
                                            <li><a href="{{url('/form-validations')}}">Form Validations</a></li>
                                            <li><a href="{{url('/form-editors')}}">Form Editors</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-md-4">
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/form-file-uploads')}}">Form File Uploads</a></li>
                                            <li><a href="{{url('/form-colorpickers')}}">Form Color Pickers</a></li>
                                            <li><a href="{{url('/form-datepickers')}}">Form Date Pickers</a></li>
                                            <li><a href="{{url('/form-maxlength')}}">Form MaxLength</a></li>
                                            <li><a href="{{url('/form-touchspin')}}">Form Touchspin</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-md-4">
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/form-input-mask')}}">Form Input Mask</a></li>
                                            <li><a href="{{url('/form-selects')}}">Form Selects</a></li>
                                            <li><a href="{{url('/form-xeditable')}}">Form X-editable</a></li>
                                            <li><a href="{{url('/form-wizards')}}">Form Wizards</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-graph"></i><span>Charts</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/chart-chartistjs')}}">Chartist Chart</a></li> 
                                <li><a href="{{url('/chart-chartjs')}}">Chartjs Chart</a></li>                                   
                                <li><a href="{{url('/chart-c3')}}">C3 Chart</a></li>
                                <li><a href="{{url('/chart-flot')}}">Flot Chart</a></li> 
                                <li><a href="{{url('/chart-morris')}}">Morris Chart</a></li>                                
                                <li><a href="{{url('/chart-knob')}}">Knob Chart</a></li>
                                <li><a href="{{url('/chart-piety')}}">Piety Chart</a></li>
                                <li><a href="{{url('/chart-sparkline')}}">Sparkline Chart</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-options-vertical"></i><span>More</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Email</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/email-inbox')}}">Email Inbox</a></li>
                                        <li><a href="{{url('/email-open')}}">Email Open</a></li>
                                        <li><a href="{{url('/email-compose')}}">Email Compose</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tables</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/table-bootstrap')}}">Bootstrap Table</a></li>
                                        <li><a href="{{url('/table-datatable')}}">Data Table</a></li>
                                        <li><a href="{{url('/table-editable')}}">Editable Table</a></li>
                                        <li><a href="{{url('/table-rwdtable')}}">RWD Table</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Maps</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/map-google')}}">Google Map</a></li>
                                        <li><a href="{{url('/map-vector')}}">Vector Map</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> 
                        <li class="dropdown menu-item-has-mega-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book-open"></i><span>Pages</span></a>
                            <div class="mega-menu dropdown-menu">
                                <ul class="mega-menu-row" role="menu">
                                    <li class="mega-menu-col col-md-4">
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/page-login')}}">Login</a></li>
                                            <li><a href="{{url('/page-register')}}">Register</a></li>
                                            <li><a href="{{url('/page-forgotpsw')}}">Forgot Password</a></li>
                                            <li><a href="{{url('/page-lock-screen')}}">Lock Screen</a></li> 
                                            <li><a href="{{url('/page-comingsoon')}}">Coming Soon</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-md-4">
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/page-maintenance')}}">Maintenance</a></li>                               
                                            <li><a href="{{url('/page-404')}}">Error 404</a></li>  
                                            <li><a href="{{url('/page-403')}}">Error 403</a></li>
                                            <li><a href="{{url('/page-500')}}">Error 500</a></li>  
                                            <li><a href="{{url('/page-503')}}">Error 503</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-md-4">
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/page-starter')}}">Starter Page</a></li>
                                            <li><a href="{{url('/page-timeline')}}">Timeline</a></li>
                                            <li><a href="{{url('/page-pricing')}}">Pricing</a></li>
                                            <li><a href="{{url('/page-invoice')}}">Invoice</a></li>
                                            <li><a href="{{url('/page-faq')}}">FAQ</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li> 
                    </ul>
                </div>
            </nav>
            <!-- End XP Nav -->
        </div>
        <!-- End XP Menubar -->
    </div>
    <!-- End XP Headerbar -->
    @yield('rightbar-content')
    <!-- Start XP Footerbar -->
    <div class="xp-footerbar">
        <footer class="footer">
            <p class="mb-0">© 2020 Neon - All Rights Reserved.</p>
        </footer>
    </div>
    <!-- End XP Footerbar -->
</div>