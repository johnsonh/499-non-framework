<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 5:19 PM
 */

require_once 'login.php';
require_once 'Auth.php';

/*
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
*/

echo 'dog';

$user = "";
$pass = "";

if (ITP\Auth::attempt($user, $pass))
{
    //redirect to dashboard
}
else if (true)
{

}
