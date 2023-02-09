<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use App\Models\User;

/**
* Check Active Route
*
* @param $route
* @param $output
* @return mix
*/
if (!function_exists('isActiveRoute')) {

    function isActiveRoute($route, $output = "active") {
        if (Route::current()->uri == $route)
            return $output;
    }

}

/**
* Active Route
*
* @param $paths
* @param $class
* @return mix
*/
if (!function_exists('setActive')) {

    function setActive($paths, $class = TRUE, $className = 'menu-item-active') {
        foreach ($paths as $path) {

            if (Request::is($path . '*')) {
                if ($class)
                    return ' class=menu-item-active';
                else
                    return ' ' . $className;
            }
        }
    }

}

/**
* Active Routes
*
* @param $routes
* @param $output
* @return mix
*/
if (!function_exists('areActiveRoutes')) {

    function areActiveRoutes(Array $routes, $output = "active") {
        foreach ($routes as $route) {
            if (Route::current()->uri == $route) {
                return $output;
            }
        }
    }

}

/**
* Get Role Name
*
* @return mix
*/
if (!function_exists('roleName')) {

    function roleName()
    {
        $roleName = '';
        $user = Auth::user();
        if (@$user->getRoleNames()->first()) {
            $roleName = $user->getRoleNames()->first();
        }
            
        return $roleName;
    }

}

/**
* Get Role Name
*
* @return mix
*/
if (!function_exists('isSuperAdmin')) {

    function isSuperAdmin()
    {
        $isSuperAdmin = false;
        $user = Auth::user();
        if (@$user->getRoleNames()->first() && $user->getRoleNames()->first() == 'Super Admin') {
            $isSuperAdmin = true;
        }
            
        return $isSuperAdmin;
    }

}

/**
* Get Application Status Badge
*
* @param $status
* @return mix
*/
if (!function_exists('getStatusBadge')) {

    function getStatusBadge($status = 1)
    {
        $badge = '<span style="overflow: visible; position: relative; width: 130px;">';
                    
        switch ($status) {
            case 1:
                $badge .= '<a href="#" class="badge bg-success" > Active </a>';
                break;
            default:
                $badge .= '<a href="#" class="badge bg-danger" > In Active </a>';
        }
        
        $badge .= '</span>';    
        return $badge;
    }

}

/**
* Get Uuid
*
* @return mix
*/
if (!function_exists('getUuid')) {

    function getUuid()
    {
        //(string) \Uuid::generate(4);
        return \DB::raw('uuid()');
    }

}

/**
* dd with json
*
* @return mix
*/
if (!function_exists('dj')) {

    function dj($data)
    {
        return response()->json([
            'data' => $data
        ], 200);
        exit;
    }

}

/**
 * Success Response
 *
 * @param $message
 * @return JSON
 */
if (!function_exists('successResponse')) {
    function successResponse($message, $response = []) {
        $responseData = [
            'message' => $message,
            'code' => 200,
            'status' => true,
        ];

        $response = array_merge($responseData, $response);

        return response()->json($response, 200);
    }
}

/**
 * Error Response
 *
 * @param $message
 * @return JSON
 */
if (!function_exists('errorResponse')) {
    function errorResponse($message, $response = [], $status = 400) {
        $responseData = [
            'message' => $message,
            'code' => $status,
            'status' => false,
        ];

        $response = array_merge($responseData, $response);

        return response()->json($response, 200);
    }
    
}

function load_pdf($pdf) {
    header('Content-Type: application/pdf');
    $image_name = image_name_decode($pdf);
    readfile($image_name);
}

/**
* add Dashes In CNIC
*
* @return mix
*/
if (!function_exists('addDashesInCNIC')) {

    function addDashesInCNIC($cnic)
    {
        return preg_replace("/^(\d{5})(\d{7})(\d{1})$/", "$1-$2-$3", $cnic);
    }

}

/**
* add Dash In Mobile
*
* @return mix
*/
if (!function_exists('addDashInMobile')) {

    function addDashInMobile($mobile)
    {
        return preg_replace("/^(\d{4})(\d{7})$/", "$1-$2", $mobile);
    }

}


/**
* add Dash In Mobile
*
* @return mix
*/
if (!function_exists('loggedInUserId')) {

    function loggedInUserId()
    {
        return Auth::id();
    }

}


/**
* return logged in school id
*
* @return mix
*/
if (!function_exists('loggedInSchoolId')) {

    function loggedInSchoolId()
    {
        return optional(Auth::user()->school)->id;
    }

}

/**
* Get Role Name
*
* @return mix
*/
if (!function_exists('hasRole')) {

    function hasRole($role)
    {
        $hasRole = false;
        $user = Auth::user();
        if (@$user->getRoleNames()->first() && $user->getRoleNames()->first() == $role) {
            $hasRole = true;
        }
            
        return $hasRole;
        
    }

}

