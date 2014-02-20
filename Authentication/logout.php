<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 5:19 PM
 */

$session->clear(); // session_destroy()

$response = new RedirectResponse('login.php');
return $response->send();
