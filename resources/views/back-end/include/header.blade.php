<header class="header">
    <div class="logo-container">
        <a href="{{ route('/') }}" class="logo">
        <img src="{{ asset('images/medicine.png') }}" width="35" height="35" alt="logo" /></a>					
        <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>					</div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">

        {{-- <form action="http://preview.oklerthemes.com/porto-admin/2.1.1/pages-search-results.html" class="search nav-form">
            <div class="input-group">
                <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                <span class="input-group-append">
                    <button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
                </span>
            </div>
        </form> --}}

     

        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                         @if(!empty(Auth::user()->image)) 
                            <img src="{{ asset(Auth::user()->image) }}" alt="Profile Pic" class="rounded-circle" data-lock-picture="{{ asset(Auth::user()->image) }}" />
                            @else
                            
                            <img src="{{ asset('images/d_profilePic.png') }}" alt="Profile Pic" class="rounded-circle" data-lock-picture="{{ asset('images/d_profilePic.png') }}" />
                            @endif
                    {{--  <img src="{{asset('back-end')}}/img/%21logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/%21logged-user.jpg" />  --}}
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                <span class="name">{{Auth::user()->name}}</span>
                    <span class="role">{{Auth::user()->roles->first()->name}}</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled mb-2">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ route('my-profile') }}"><i class="fas fa-user"></i> My Profile</a>
                    </li>
                    {{--  <li>
                        <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fas fa-lock"></i> Lock Screen</a>
                    </li>  --}}
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Logout</a>
                    </li>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>


                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>