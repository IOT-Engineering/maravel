<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">

            <div class="pull-left image">
                <img src="{{env('APP_URL')}}/img/dashboard/avatar.png" class="img-circle" alt="User Image">
            </div>

            @if(Auth::check())
                <div class="pull-left info">
                    <p><span class="hidden-xs">{{Auth::user()->name}}</span></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            @endif

        </div>

        <ul id="responsive-menu" class="sidebar-menu">
            <li class="header">MENÚ</li>
        </ul>

        {!! Menu::get('AdminMenu') !!}

    </section>

</aside>