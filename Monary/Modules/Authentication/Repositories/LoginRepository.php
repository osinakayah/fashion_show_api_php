<?php
/**
 * Created by PhpStorm.
 * User: osinakayah
 * Date: 11/9/18
 * Time: 9:13 AM
 */

namespace Monary\Modules\Authentication\Repositories;


class LoginRepository
{
    public function loginUser(array $userData) {
        if (\Auth::attempt($userData)) {
            $user = \Auth::user();
            $token = $user->createToken('Monary Mobile App')->accessToken;
            return ['status' => true, 'message' => 'Login successful', 'token' => $token];
        }
        return ['status' => false, 'message' => 'Login credentials are invalid'];
    }
}