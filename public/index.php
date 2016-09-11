<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/

require __DIR__.'/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
//use Lndj\Lcrawl;
////stu_id
//$stu_id = '140210101';
////your password
//$password = 'just2for5fun2';
//$user = ['stu_id' => $stu_id, 'stu_pwd' => $password];
//$client = new Lcrawl('http://jwweb.scujcc.cn/', $user, false);
//$client->login();
//$all = $client->setUa('Lcrawl Spider V2.0.2')->getAll();
////setTimeOut()
////setReferer
////set...
//dd($all);
//// dd($client->login());
//// $client->getSchedule();
//// $client->getCet();
////Set the login post param
///*
//[
//    'viewstate' => '__VIEWSTATE',
//    'stu_id' => 'TextBox1',
//    'passwod' => 'TextBox2',
//    'role' => 'RadioButtonList1',
//    'button' => 'Button1'
//]
//
///**
// * Just a debug function
// * @param Obeject/Array/string $arr
// * @param String $hint debug hint
// * @return void
// */
//function dd($arr,$hint = '')
//{
//    if (is_object($arr) || is_array($arr)) {
//        echo "<pre>";
//        print_r($arr);
//        echo PHP_EOL . $hint;
//        echo "</pre>";
//    } else {
//        var_dump($arr);
//        echo PHP_EOL . $hint;
//    }
//}
