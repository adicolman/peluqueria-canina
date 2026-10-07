<?php

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

/* Rutas del sitio. */
Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('/nosotros', [HomeController::class, 'about'])
    ->name('about');

Route::get('/servicios', [ServicesController::class, 'index'])
    ->name('services.index');

Route::get('/servicios/{id}', [ServicesController::class, 'show'])
    ->whereNumber('id')
    ->name('services.show');

Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{id}', [BlogController::class, 'show'])
    ->whereNumber('id')
    ->name('blog.show');

/* Autenticación propia con AuthController. */
Route::get('/iniciar-sesion', [AuthController::class, 'showForm'])
    ->name('auth.login.form');
Route::post('/iniciar-sesion', [AuthController::class, 'processForm'])
    ->name('auth.login.process');
Route::post('/cerrar-sesion', [AuthController::class, 'processLogout'])
    ->name('auth.logout.process');

/* Panel de administración: requiere sesión (middleware auth). */
Route::get('/admin/blog', [AdminBlogController::class, 'index'])
    ->name('admin.blog.index')
    ->middleware('auth');
Route::get('/admin/blog/crear', [AdminBlogController::class, 'create'])
    ->name('admin.blog.create')
    ->middleware('auth');
Route::post('/admin/blog/crear', [AdminBlogController::class, 'store'])
    ->name('admin.blog.store')
    ->middleware('auth');
Route::get('/admin/blog/{id}/editar', [AdminBlogController::class, 'edit'])
    ->whereNumber('id')
    ->name('admin.blog.edit')
    ->middleware('auth');
Route::post('/admin/blog/{id}/editar', [AdminBlogController::class, 'update'])
    ->whereNumber('id')
    ->name('admin.blog.update')
    ->middleware('auth');
Route::get('/admin/blog/{id}/eliminar', [AdminBlogController::class, 'delete'])
    ->whereNumber('id')
    ->name('admin.blog.delete')
    ->middleware('auth');
Route::post('/admin/blog/{id}/eliminar', [AdminBlogController::class, 'destroy'])
    ->whereNumber('id')
    ->name('admin.blog.destroy')
    ->middleware('auth');
