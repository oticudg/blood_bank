<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Permisos de usuarios
         */
        App\Models\Permisologia\Permission::create([
            'name' => 'Ver Usuarios',
            'module' => 'user',
            'action' => 'index',
            'description' => 'Permiso para Ver usuarios'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Crear Usuarios',
            'module' => 'user',
            'action' => 'store',
            'description' => 'Permiso para registrar usuarios'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Ver Usuario',
            'module' => 'user',
            'action' => 'show',
            'description' => 'Permiso para Ver usuario'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Editar Usuarios',
            'module' => 'user',
            'action' => 'update',
            'description' => 'Permiso para editar usuarios'
        ]);

        App\Models\Permisologia\Permission::create([
        	'name' => 'Borrar Usuarios',
        	'module' => 'user',
        	'action' => 'destroy',
        	'description' => 'Permiso para borrar usuarios'
        ]);

        App\Models\Permisologia\Permission::create([
        	'name' => 'Cambiar usuario',
        	'module' => 'user',
        	'action' => 'initWithOneUser',
        	'description' => 'Permiso para Iniciar sesion con otro usuario'
        ]);

        /**
         * Permisos de Roles
         */
        App\Models\Permisologia\Permission::create([
        	'name' => 'Ver Roles',
        	'module' => 'rol',
        	'action' => 'index',
        	'description' => 'Permiso para ver roles'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Crear Roles',
            'module' => 'rol',
            'action' => 'store',
            'description' => 'Permiso para registrar roles'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Ver Rol',
            'module' => 'rol',
            'action' => 'show',
            'description' => 'Permiso para ver un rol'
        ]);

        App\Models\Permisologia\Permission::create([
        	'name' => 'Actualizar Roles',
        	'module' => 'rol',
        	'action' => 'update',
        	'description' => 'Permiso para actualizar roles'
        ]);

        App\Models\Permisologia\Permission::create([
        	'name' => 'Eliminar Roles',
        	'module' => 'rol',
        	'action' => 'destroy',
        	'description' => 'Permiso para Eliminar roles'
        ]);

        /**
         * Permisos de Permisos
         */
        App\Models\Permisologia\Permission::create([
            'name' => 'Ver Permisos',
            'module' => 'permission',
            'action' => 'index',
            'description' => 'Permiso para Ver Permisos'
        ]);

        App\Models\Permisologia\Permission::create([
        	'name' => 'Ver Permiso',
        	'module' => 'permission',
        	'action' => 'show',
        	'description' => 'Permiso para Ver un Permiso'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Modificar Permisos',
            'module' => 'permission',
            'action' => 'update',
            'description' => 'Permiso para Eliminar Permisos'
        ]);

        /**
         * Permisos de Donaciones
         */
        App\Models\Permisologia\Permission::create([
            'name' => 'Ver Donantes',
            'module' => 'donor',
            'action' => 'index',
            'description' => 'Permiso para ver donantes'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Crear Donantes',
            'module' => 'donor',
            'action' => 'store',
            'description' => 'Permiso para registrar donantes'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Ver Donante',
            'module' => 'donor',
            'action' => 'show',
            'description' => 'Permiso para ver un donantes'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Actualizar Donantes',
            'module' => 'donor',
            'action' => 'update',
            'description' => 'Permiso para actualizar donantes'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Eliminar Donantes',
            'module' => 'donor',
            'action' => 'destroy',
            'description' => 'Permiso para Eliminar donantes'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Consultar Donante',
            'module' => 'donor',
            'action' => 'search',
            'description' => 'Permiso para Eliminar donantes'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Realizar Entrevistar',
            'module' => 'donor',
            'action' => 'interview',
            'description' => 'Permiso para realizar la entrevista al donantes'
        ]);

        App\Models\Permisologia\Permission::create([
            'name' => 'Editar Entrevista',
            'module' => 'donor',
            'action' => 'interviewEdit',
            'description' => 'Permiso para editar la entrevista al donantes'
        ]);

    }
}
