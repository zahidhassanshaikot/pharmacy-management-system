<aside id="sidebar-left" class="sidebar-left">
				
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
            
                <ul class="nav nav-main">
                    <li>
                        <a href="{{ route('/') }}">
                            <i class="fas fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>                        
                    </li>
                    @if(Auth::user()->hasRole(['Super Admin', 'Admin','Manager']))
                    <li class="nav-parent @yield('activeStock')">
                        <a href="#">
                            <i class="fab fa-stack-exchange" aria-hidden="true"></i>
                            <span>Stock</span>
                        </a>
                        
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('manage-stock') }}">
                                    Manage Stock
                                </a>
                            </li>
                          
                            {{-- <li class="nav-parent">
                                <a>
                                    Boxed
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="layouts-boxed.html">
                                            Static Header
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layouts-boxed-fixed-header.html">
                                            Fixed Header
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}

                        </ul>
                        

                    </li>
                    @endif
                    <li class="nav-parent @yield('activeSaleProduct')">
                        <a href="#">
                            <i class="fab fa-product-hunt" aria-hidden="true"></i>
                            <span>Sell Product</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('add-customer') }}">
                                    Sale Product
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customer-view') }}">
                                    Customer View Page
                                </a>
                            </li>
  

                        </ul>

                    </li>
                    <li class="@yield('activeSaleProduct')">
                        <a href="{{ route('customer-list') }}">
                            <i class="fas fa-users" aria-hidden="true"></i>
                            <span>Customer List</span>
                        </a>                        
                    </li>
                    @if(Auth::user()->hasRole(['Super Admin', 'Admin']))
                    <li class="@yield('activeUser')">
                        <a href="{{ route('view-user-list') }}">
                            <i class="fas fa-user" aria-hidden="true"></i>
                            <span>User Management</span>
                        </a>                        
                    </li>

                    <li class="nav-parent @yield('activeReport')">
                        <a href="#">
                            <i class="fas fa-chart-bar" aria-hidden="true"></i>
                            <span>Report</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('most-sale-product') }}">
                                    Most Sell Product
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{ route('did-not-take-full-course') }}">
                                    Full Course Not Taken
                                </a>
                            </li>
                            
  

                        </ul>

                    </li>
           
                    @endif
                
                </ul>
            </nav>

           
        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                    
                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>
        

    </div>

</aside>