<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 5:19 PM
 */

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Session\Session;
use \Symfony\Component\HttpFoundation\RedirectResponse;


$session = new Session();
$session->clear(); // session_destroy()

$response = new RedirectResponse('login.php');
return $response->send();
