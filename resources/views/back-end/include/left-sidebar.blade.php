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
                    <li class="nav-parent @yield('activeStock')">
                        <a href="#">
                            <i class="fas fa-columns" aria-hidden="true"></i>
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
                    <li class="nav-parent @yield('activeSaleProduct')">
                        <a href="#">
                            <i class="fas fa-columns" aria-hidden="true"></i>
                            <span>Sale Product</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('sale-product') }}">
                                    Sale Product
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('/') }}">
                                    Default
                                </a>
                            </li>
  

                        </ul>

                    </li>

           
                    
                
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