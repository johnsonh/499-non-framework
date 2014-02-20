<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 6:58 PM
 */

namespace ITP;

class Auth
{
    protected static $accounts = array (
        "student" => "ttrojan"
    );


    public static function attempt($username, $password)
    {
        if (Auth::$accounts[$username] == $password)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


} 