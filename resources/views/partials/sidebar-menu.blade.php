    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú de Navegación</li>
        <li>
            <a href="dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview" v-if="can(['user.index','rol.index','permission.index'])">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Administración</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li v-if="can('user.index')">
                    <a href="user">
                        <i class="fa fa-users"></i> Usuarios
                    </a>
                </li>
                <li v-if="can('rol.index')">
                    <a href="rol">
                        <i class="glyphicon glyphicon-compressed"></i> Roles
                    </a>
                </li>
                <li v-if="can('permission.index')">
                    <a href="permission">
                        <i class="glyphicon glyphicon-th"></i> Permisos
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Donaciones</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="donation">
                        <i class="fa fa-users"></i> Donantes
                    </a>
                </li>
                <li>
                    <a href="donations">
                        <i class="glyphicon glyphicon-compressed"></i> Donaciones
                    </a>
                </li>
                <li>
                    <a href="products">
                        <i class="glyphicon glyphicon-compressed"></i> Productos
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Notificaciones</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="recepcion">
                        <i class="glyphicon glyphicon-user"></i> Vencimiento
                    </a>
                </li>
                <li>
                    <a href="recepcion">
                        <i class="glyphicon glyphicon-user"></i> Proximos a Descartes
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="recepcion">
                <i class="fa fa-dashboard"></i> <span> Recepción</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Estadística</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="recepcion">
                        <i class="glyphicon glyphicon-user"></i> 1
                    </a>
                </li>
                <li>
                    <a href="recepcion">
                        <i class="glyphicon glyphicon-user"></i> 2
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/test">
                <i class="fa fa-dashboard"></i> <span> Test</span>
            </a>
        </li>
    </ul>