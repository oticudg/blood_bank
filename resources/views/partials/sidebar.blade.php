{{-- Left side column. contains the sidebar --}}
<aside class="main-sidebar">
    {{-- sidebar: style can be found in sidebar.less --}}
    <section class="sidebar">
        {{-- Sidebar user panel --}}
        <div class="user-panel">
            <div class="pull-left image">
                <a href="/perfil">
                    <img src="{{ Auth::user()->getLogoPath() }}" class="img-circle" alt="{{ Auth::user()->name }}">
                </a>
            </div>
            <div class="pull-left info">
                <p>
                    <a href="/perfil" style="color: black">{{ Auth::user()->name }}</a>
                </p>
                <a href="/perfil"><i class="fa fa-circle text-success"></i> En linea.</a>
            </div>
        </div>

        @include('partials.sidebar-menu')

    </section> {{-- /.sidebar --}}
</aside>
