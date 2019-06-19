<aside id="sidebar-left" class="sidebar-left">
				
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
            
                <ul class="nav nav-main">
                    <li>
                        <a href="<?php echo e(route('/')); ?>">
                            <i class="fas fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>                        
                    </li>
                    <?php if(Auth::user()->hasRole(['Super Admin', 'Admin','Manager'])): ?>
                    <li class="nav-parent <?php echo $__env->yieldContent('activeStock'); ?>">
                        <a href="#">
                            <i class="fab fa-stack-exchange" aria-hidden="true"></i>
                            <span>Stock</span>
                        </a>
                        
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo e(route('manage-stock')); ?>">
                                    Manage Stock
                                </a>
                            </li>
                          
                            

                        </ul>
                        

                    </li>
                    <?php endif; ?>
                    <li class="nav-parent <?php echo $__env->yieldContent('activeSaleProduct'); ?>">
                        <a href="#">
                            <i class="fab fa-product-hunt" aria-hidden="true"></i>
                            <span>Sell Product</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo e(route('add-customer')); ?>">
                                    Sale Product
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('customer-view')); ?>">
                                    Customer View Page
                                </a>
                            </li>
  

                        </ul>

                    </li>
                    <li class="<?php echo $__env->yieldContent('activeSaleProduct'); ?>">
                        <a href="<?php echo e(route('customer-list')); ?>">
                            <i class="fas fa-users" aria-hidden="true"></i>
                            <span>Customer List</span>
                        </a>                        
                    </li>
                    <?php if(Auth::user()->hasRole(['Super Admin', 'Admin'])): ?>
                    <li class="<?php echo $__env->yieldContent('activeUser'); ?>">
                        <a href="<?php echo e(route('view-user-list')); ?>">
                            <i class="fas fa-user" aria-hidden="true"></i>
                            <span>User Management</span>
                        </a>                        
                    </li>

                    <li class="nav-parent <?php echo $__env->yieldContent('activeReport'); ?>">
                        <a href="#">
                            <i class="fas fa-chart-bar" aria-hidden="true"></i>
                            <span>Report</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo e(route('most-sale-product')); ?>">
                                    Most Sell Product
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo e(route('did-not-take-full-course')); ?>">
                                    Full Course Not Taken
                                </a>
                            </li>
                            
  

                        </ul>

                    </li>
           
                    <?php endif; ?>
                
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