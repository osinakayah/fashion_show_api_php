<?php
/**
 * Created by PhpStorm.
 * User: osinakayah
 * Date: 11/9/18
 * Time: 4:56 AM
 */

namespace Monary\Modules\Authentication\Repositories;

use App\User;
use Spatie\Tags\Tag;

class RegisterRepository
{
    public function registerUser(array $userData) {
        $token = mt_rand(100000, 999999);
        $newUser = User::create([
            'name' => $userData['name'],
            'unique_identifier' => $userData['unique_identifier'],
            'user_token' => $token,
            'password' => bcrypt($userData['password']),
            'tags' => [config('monary_tags.unisex'), config('monary_tags.women'),],
        ]);

        if ($newUser->save()) {
            //$this->sendVerificationCode($userData['unique_identifier'], $userData['name'], $token);
            return ['status' => true, 'message' => 'User account created successfully', 'token' => $token];
        }
        else {
            return ['status' => false, 'message' => 'An error occurred, please try again later'];
        }
    }

    /**
     * @param string $uniqueIdentifier
     * @param string $receiverName
     * @param int $token
     */
    private function sendVerificationCode(string $uniqueIdentifier, string $receiverName, int $token){
        if (filter_var($uniqueIdentifier, FILTER_VALIDATE_EMAIL)) {
            $message = "Your verification code is ".$token;
            sendEmailNotification($uniqueIdentifier, "Verify Account", $receiverName, $message);
        }
        else {

        }
    }

    public function activateUser(string $token) {
        $user = User::where('user_token', $token)->first();
        if ($user) {
            $user->account_verified = true;
            $user->user_token = null;
            if ($user->save()) {
                return ['status' => true, 'message' => 'Account activated successfully'];
            }
            else {
                return ['status' => false, 'message' => 'An error occurred, please try again later'];
            }
        }
        return ['status' => false, 'message' => 'Wrong User token or token has been used'];
    }
}