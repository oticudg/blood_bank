<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Rutas típicas de autentificación de la app.
 * reemplazando: Auth::routes();
 */
Route::group(['namespace' => 'Auth'], function () {
    // Rutas de Autentificación...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Rutas de Registro... 
    if (config('frontend.registration_open')) {
        Route::get('registro', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }
});

Route::post('app', 'RouteController@dataForTemplate');

/**
 * Requieren autentificación.
 */
Route::group(['middleware' => 'auth'], function () {

    /**
     * Admin, Acceso para usuarios con privilegios.
     * "/admin/*"
     */
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {

        // Users Routes...
        Route::resource('users', 'UsersController')->except(['create', 'edit']);
        Route::post('get-data-users', 'UsersController@dataForRegister');
        Route::get('init-session-user/{id}', 'UsersController@initWithOneUser');

        // Roles Routes...
        Route::resource('roles', 'RolesController')->except(['create', 'edit']);
        Route::post('get-data-roles', 'RolesController@dataForRegister');

        // Permissions Routes...
        Route::resource('permissions', 'PermissionsController')->only(['index', 'show', 'update']);

    });

    /**
     * Perfil, Acceso para todos los usuarios.
     * "/*"
     */
    Route::group(['prefix' => '/', 'namespace' => 'Dashboard', 'as' => 'Dashboard::'], function () {
        Route::get('profile', 'ProfileController@show');
        Route::post('change-pass', 'ProfileController@editPassword');
        Route::post('update-user', 'ProfileController@editUser');
    });

    Route::group(['namespace' => 'Donation', 'as' => 'Donation::'], function () {

        // Donor Routes...
        Route::resource('donant', 'DonorController')->except(['create', 'edit']);
        Route::post('get-data-donants', 'DonorController@dataForRegister');

        // Interview Routes...
        // Route::resource('interview', 'QuestionController')->except(['create', 'edit']);
        // Route::resource('interview', 'QuestionController')->only(['store', 'update']);

        // Donations Routes...
        Route::resource('donations', 'DonationController')->except(['create', 'edit']);
        Route::post('get-data-donation/{donor_id}/{donation_id?}', 'DonationController@dataForRegister');

    });

    Route::post('admin/app', 'RouteController@canPermission');

});

Route::view('test', 'layouts.test'); // ruta para las vistas

Route::get('{any?}', 'RouteController@index')->where('any', '.*');
