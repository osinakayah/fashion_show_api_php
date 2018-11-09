<?php
/**
 * Created by PhpStorm.
 * User: osinakayah
 * Date: 10/28/18
 * Time: 3:36 PM
 */

if(!function_exists('generate_path_to_module_route')){
    /**
     * @param $module
     * @param $route_type
     * @return string
     */
    function generate_path_to_module_route($module, $route_type){
        $path_to_route    = "/Modules/";
        $route_file     = ($route_type === 'web')? '/web_routes.php': '/api_routes.php';

        return dirname(__DIR__).$path_to_route.$module.$route_file ;
    }
}

if (!function_exists('sendEmailNotification')) {
    function sendEmailNotification(string $to, string $subject, string $recipientName = 'Hello', string $message) {
        \Illuminate\Support\Facades\Mail::to($to)->send(new \App\Mail\SendEmail($subject, $recipientName, $message));
        try {

        }catch (Exception $exception){

        }
    }
}