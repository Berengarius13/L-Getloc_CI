<?php ob_start();
if (!function_exists("ip_address")) {
    function ip_address()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP']; // Getting HTTP Client IP Address
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR']; // Getting HTTPX FORWARDED FOR Address
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED']; // Getting HTTPX FORWARDED Address
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR']; // Getting HTTP FORWARDED FOR Address
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED']; // Getting HTTP FORWARDED Address
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR']; // Getting REMOTE ADDR Address
        else
            $ipaddress = 'UNKNOWN'; // Getting UNKNOWN Address
        return $ipaddress;
    }
}
