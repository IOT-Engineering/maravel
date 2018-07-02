<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>M</b>aravel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @if(Auth::user()->role->name == 'admin')
                    <li class="dropdown messages-menu">
                        <a href="{{url('/home')}}">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>

                    <li class="dropdown messages-menu">
                        <a href="{{url('/home')}}">
                            <i class="fa fa-cubes"></i>
                        </a>
                    </li>
                @endif

                @if(Auth::check())
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{env('APP_URL')}}/img/dashboard/avatar.png" class="img-circle" alt="User Image">
                            <p>
                                <span class="hidden-xs">{{Auth::user()->name}}</span>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!--<div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            </div>-->
                            <div class="pull-right">
                                <form method="POST" action="{{route('logout')}}">
                                    {{csrf_field()}}
                                    <button class="btn btn-default btn-flat"type="submit">Salir del Sistema</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                @endif

            </ul>

        </div>

    </nav>
</header>