<?php

use Illuminate\Routing\Router;

Admin::registerHelpersRoutes();

Route::group([
    'prefix'        => config('admin.prefix'),
    // 'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {
    $router->get('/', 'App\Admin\Controllers\HomeController@index');
    $router->resource('posts', App\Admin\Controllers\PostsController::class);
    $router->post('posts/uploadImage', 'App\Admin\Controllers\PostsController@uploadImage');
    $router->resource('comments', App\Admin\Controllers\CommentsController::class);
    $router->resource('categories', App\Admin\Controllers\CategoriesController::class);
});
