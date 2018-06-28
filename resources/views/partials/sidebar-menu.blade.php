<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Menú de Navegación</li>
    <li>
        <a>
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
                <a href="/administracion/usuarios">
                    <i class="fa fa-users"></i> Usuarios
                </a>
            </li>
            <li v-if="can('rol.index')">
                <a href="/administracion/roles">
                    <i class="glyphicon glyphicon-compressed"></i> Roles
                </a>
            </li>
            <li v-if="can('permission.index')">
                <a href="/administracion/permisos">
                    <i class="glyphicon glyphicon-th"></i> Permisos
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Actividades</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a>
                    <i class="fa fa-users"></i> Donaciones
                </a>
            </li>
            <li>
                <a>
                    <i class="glyphicon glyphicon-compressed"></i> Otras actividades
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Productos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a>
                    <i class="glyphicon glyphicon-user"></i> Conteo general
                </a>
            </li>
            <li>
                <a>
                    <i class="glyphicon glyphicon-user"></i> Lista <!-- de especifica --> de productos
                </a>
            </li>
            <li>
                <a>
                    <i class="glyphicon glyphicon-user"></i> Ordenes Médicas
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a>
            <i class="fa fa-dashboard"></i> <span> Inventario</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Planificación</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a>
                    <i class="glyphicon glyphicon-user"></i> Planificación de compra
                </a>
            </li>
            <li>
                <a>
                    <i class="glyphicon glyphicon-user"></i> Planificación de turno
                </a>
            </li>
        </ul>
    </li>   
    <li>
        <a>
            <i class="fa fa-bar-chart"></i> <span>Estadísticas</span>
        </a>
    </li>
    <li>
        <a>
            <i class="fa fa-dashboard"></i> <span>Manual de ayuda</span>
        </a>
    </li>
    <li>
        <a href="/test">
            <i class="fa fa-bicycle"></i> <span>Test</span>
        </a>
    </li>
</ul>