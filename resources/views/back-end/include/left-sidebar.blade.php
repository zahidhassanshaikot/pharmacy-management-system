<aside id="sidebar-left" class="sidebar-left">
				
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
            
                <ul class="nav nav-main">
                    <li>
                        <a href="layouts-default.html">
                            <i class="fas fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>                        
                    </li>
                    <li class="nav-parent nav-expanded nav-active">
                        <a href="#">
                            <i class="fas fa-columns" aria-hidden="true"></i>
                            <span>Manage Stock</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="index.html">
                                    Landing Page
                                </a>
                            </li>
                            <li>
                                <a href="layouts-default.html">
                                    Default
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