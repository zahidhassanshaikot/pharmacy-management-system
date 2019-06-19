<header class="header">
    <div class="logo-container">
        <a href="<?php echo e(route('/')); ?>" class="logo">
        <img src="<?php echo e(asset('images/medicine.png')); ?>" width="35" height="35" alt="logo" /></a>					
        <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>					</div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">

        

     

        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                         <?php if(!empty(Auth::user()->image)): ?> 
                            <img src="<?php echo e(asset(Auth::user()->image)); ?>" alt="Profile Pic" class="rounded-circle" data-lock-picture="<?php echo e(asset(Auth::user()->image)); ?>" />
                            <?php else: ?>
                            
                            <img src="<?php echo e(asset('images/d_profilePic.png')); ?>" alt="Profile Pic" class="rounded-circle" data-lock-picture="<?php echo e(asset('images/d_profilePic.png')); ?>" />
                            <?php endif; ?>
                    
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                <span class="name"><?php echo e(Auth::user()->name); ?></span>
                    <span class="role"><?php echo e(Auth::user()->roles->first()->name); ?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled mb-2">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo e(route('my-profile')); ?>"><i class="fas fa-user"></i> My Profile</a>
                    </li>
                    
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Logout</a>
                    </li>


                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>


                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>