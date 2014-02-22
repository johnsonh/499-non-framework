<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 5:19 PM
 */

require_once 'db.php';

require __DIR__ . '/../vendor/autoload.php';
use Symfony\Component\HttpFoundation\Session\Session;

echo '

<form action="login-process.php" method="post">

    Username: <input type="text" name ="username">
    <br/>
    Password: <input type="text" name ="password">
    <br/>


    <input type="submit" value="Login">
</form>

';

//$session = new Session();
//var_dump($session->getFlashBag()->get('statusMessage'));