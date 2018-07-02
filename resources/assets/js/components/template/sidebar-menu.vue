<template>
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú de Navegación</li>
        <li>
            <router-link :to="{ name: 'dashboard' }">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </router-link>
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
                    <router-link :to="{ name: 'user.index' }">
                        <i class="fa fa-users"></i> Usuarios
                    </router-link>
                </li>
                <li v-if="can('rol.index')">
                    <router-link :to="{ name: 'rol.index' }">
                        <i class="glyphicon glyphicon-compressed"></i> Roles
                    </router-link>
                </li>
                <li v-if="can('permission.index')">
                    <router-link :to="{ name: 'permission.index' }">
                        <i class="glyphicon glyphicon-th"></i> Permisos
                    </router-link>
                </li>
            </ul>
        </li>
        <li class="treeview" v-if="can(['donor.index'])">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Actividades</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li v-if="can('donor.index')">
                    <router-link :to="{ name: 'donor.index' }">
                        <i class="fa fa-users"></i> Donantes
                    </router-link>
                </li>
                <!-- <li>
                    <router-link :to="{ name: 'donations.index' }">
                        <i class="glyphicon glyphicon-compressed"></i> Otras actividades
                    </router-link>
                </li> -->
            </ul>
        </li>
        <!-- <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Productos</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <router-link :to="{ name: 'recepcion.index' }">
                        <i class="glyphicon glyphicon-user"></i> Conteo general
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'recepcion.index' }">
                        <i class="glyphicon glyphicon-user"></i> Lista especifica de productos
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'recepcion.index' }">
                        <i class="glyphicon glyphicon-user"></i> Ordenes Médicas
                    </router-link>
                </li>
            </ul>
        </li> -->
        <!-- <li>
            <router-link :to="{ name: 'recepcion.index' }">
                <i class="fa fa-dashboard"></i> <span> Inventario</span>
            </router-link>
        </li> -->
        <!-- <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Planificación</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <router-link :to="{ name: 'recepcion.index' }">
                        <i class="glyphicon glyphicon-user"></i> Planificación de compra
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'recepcion.index' }">
                        <i class="glyphicon glyphicon-user"></i> Planificación de turno
                    </router-link>
                </li>
            </ul>
        </li> -->
        <!-- <li>
            <router-link :to="{ name: 'recepcion.index' }">
                <i class="fa fa-bar-chart"></i> <span>Estadísticas</span>
            </router-link>
        </li> -->
        <!-- <li>
            <router-link :to="{ name: 'recepcion.index' }">
                <i class="fa fa-dashboard"></i> <span>Manual de ayuda</span>
            </router-link>
        </li> -->
        <!-- <li>
            <a href="/test">
                <i class="fa fa-bicycle"></i> <span>Test</span>
            </a>
        </li> -->
    </ul>
</template>

<script>
    export default {}
</script>


