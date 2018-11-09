<?php
/**
 * Created by PhpStorm.
 * User: osinakayah
 * Date: 10/28/18
 * Time: 3:57 PM
 */

namespace Monary\Modules\Authentication\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Monary\Modules\Authentication\Repositories\RegisterRepository;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'unique_identifier' => 'required|unique:users',
            'password' => 'required',
        ]);

        $repository = new RegisterRepository();
        $registrationResult = $repository->registerUser($validatedData);
        if ($registrationResult['status']) {
            return jsend_success($registrationResult);
        }
        else {
            return jsend_fail($registrationResult);
        }
    }

    public function verify($token) {
        $repository = new RegisterRepository();
        $avtivationResult = $repository->activateUser($token);
        if ($avtivationResult['status']) {
            return jsend_success($avtivationResult['message']);
        }
        else {
            return jsend_fail($avtivationResult['message']);
        }
    }
}