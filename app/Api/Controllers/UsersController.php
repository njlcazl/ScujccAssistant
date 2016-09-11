<?php
/**
 * Created by PhpStorm.
 * User: njlcazl
 * Date: 16/9/11
 * Time: 上午9:35
 */

namespace App\Api\Controllers;


use App\Users;

use Illuminate\Http\Request;

class UsersController extends BaseController
{
    public function register(Request $request) {
        $data = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];
        $user = Users::create($data);
        return $user;
    }

    public function isExist($username) {
        return Users::where('username', $username)->first();
    }

}