<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the api routes for our  application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('colleges/{college_id}/citations[/{type}]', [
    'as' => 'colleges.citations.index',
    'uses' => 'CitationsController@collegeIndex',
]);

$router->get('departments/{dept_id}/citations[/{type}]', [
    'as' => 'departments.citations.index',
    'uses' => 'CitationsController@departmentIndex',
]);

$router->get('import/orcid/{orcid}', [
    'as' => 'citations.import.orcid',
    'uses' => 'ScopusController@importByORCID',
]);

$router->get('import/author/{author_id}', [
    'as' => 'citations.import.author',
    'uses' => 'ScopusController@importByAuthorId',
]);

$router->get('citations/{id:[0-9]+}', [
    'as' => 'citations.show',
    'uses' => 'CitationsController@show',
]);

$router->get('citations[/{type}]', [
    'as' => 'citations.index',
    'uses' => 'CitationsController@index',
]);

// Creation, modification, and deletion routes are commented-out until we
// can get the API keys or OAuth stuff straightened-out
/*$router->post('citations', [
    'as' => 'citations.store',
    'uses' => 'CitationsController@store',
]);

$router->post('citations/{id:[0-9]+}/members', [
    'as' => 'citations.members.store',
    'uses' => 'CitationsController@addMember',
]);

$router->delete('citations/{id:[0-9]+}/members', [
    'as' => 'citations.members.destroy',
    'uses' => 'CitationsController@destroyMember',
]);

$router->put('citations/{id:[0-9]+}', [
    'as' => 'citations.update',
    'uses' => 'CitationsController@update',
]);

// this DELETE route handles both the single deletion case as well as
// the case where an email will be provided as part of the query string
$router->delete('citations[/{id:[0-9]+}]', [
    'as' => 'citations.destroy',
    'uses' => 'CitationsController@destroy'
]);*/