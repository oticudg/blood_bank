{{-- Main Header --}}
<header class="main-header">
    {{-- Logo --}}
    <a href="/" class="logo">
        {{-- mini logo for sidebar mini 50x50 pixels --}}
        <span class="logo-mini">{!! config('frontend.logo_mini') !!}</span>
        {{-- logo for regular state and mobile devices --}}
        <span class="logo-lg">{!! config('frontend.logo_lg') !!}</span>
    </a>
    {{-- Header Navbar: style can be found in header.less --}}
    <nav class="navbar navbar-static-top">
        {{-- Sidebar toggle button --}}
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Menú</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                {{-- User Account: style can be found in dropdown.less --}}
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ Auth::user()->getLogoPath() }}" class="user-image" alt="{{ Auth::user()->user }}">
                        <span class="hidden-xs">{{ Auth::user()->fullName() }}</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        {{-- User image --}}
                        <li class="user-header">
                            <img src="{{ Auth::user()->getLogoPath() }}" class="img-circle" alt="{{ Auth::user()->user }}">
                            <p>
                                {{ Auth::user()->user }}
                                <small>Miembro desde {{ Auth::user()->created_at->toFormattedDateString() }}</small>
                            </p>
                        </li>
                        {{-- Menu Footer --}}
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat" data-toggle="tooltip" title="Perfil"><span class="fa fa-user"></span></a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" data-toggle="tooltip" title="Salir" class="btn btn-default btn-flat"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <span class="fa fa-lock"></span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>