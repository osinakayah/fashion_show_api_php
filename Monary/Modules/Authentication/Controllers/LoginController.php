<?php
/**
 * Created by PhpStorm.
 * User: osinakayah
 * Date: 10/28/18
 * Time: 3:45 PM
 */

namespace Monary\Modules\Authentication\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Monary\Modules\Authentication\Repositories\LoginRepository;

class LoginController extends Controller
{
    public function login(Request $request) {
        $validatedData = $request->validate([
            'unique_identifier' => 'required',
            'password' => 'required',
        ]);

        if ($validatedData) {
            $loginRepository = new LoginRepository();
            $loginResponse = $loginRepository->loginUser($validatedData);
            if ($loginResponse['status']) {
                return jsend_success($loginResponse);
            }
            else {
                return jsend_fail($loginResponse);
            }
        }
        return 2;
    }
}