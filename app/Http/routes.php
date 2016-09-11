<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['prefix' => 'v1', 'namespace' => 'App\Api\Controllers'], function ($api) {
        // Endpoints registered here will have the "foo" middleware applied.
        $api->post('InitData', 'FetchDataController@init');
        $api->get('ClassData', 'FetchDataController@getClass');
        $api->get('GradeData', 'FetchDataController@getGrade');
        $api->get('RankExamData', 'FetchDataController@getRankExam');
    });
});