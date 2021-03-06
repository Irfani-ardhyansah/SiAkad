<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SiAKAD</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{auth()->user()->siswa->getAvatar()}}" class="img-circle" alt="User Image">

                        <p>
                            {{auth()->user()->siswa->nama}}
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{url('/siswa/profile')}}" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf <button class="btn btn-default btn-flat">Sign Out</button>
                            </form>
                        </div>
                    </li>
                </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>