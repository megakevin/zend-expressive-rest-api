<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

/** @var \Zend\Expressive\Application $app */

$app->get('/', App\Action\HomePageAction::class, 'home');
$app->get('/api/ping', App\Action\PingAction::class, 'api.ping');
$app->get('/api/makes', App\Action\ListVehicleMakesAction::class, 'api.makes.get_all');
$app->get('/api/makes/{id}', App\Action\GetVehicleMakeAction::class, 'api.makes.get_one');
$app->post('/api/makes', App\Action\CreateVehicleMakeAction::class, 'api.makes.post');
$app->put('/api/makes/{id}', App\Action\UpdateVehicleMakeAction::class, 'api.makes.put');
$app->delete('/api/makes/{id}', App\Action\DeleteVehicleMakeAction::class, 'api.makes.delete');
