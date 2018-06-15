<?php

use Illuminate\Routing\Router;

Admin::registerHelpersRoutes();

Route::group([
    'prefix'        => config('admin.prefix'),
    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('posts', PostsController::class);
    $router->post('posts/uploadImage', 'PostsController@uploadImage');
    $router->resource('comments', CommentsController::class);
    $router->resource('categories', CategoriesController::class);
});
