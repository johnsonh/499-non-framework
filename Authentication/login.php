<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 5:19 PM
 */

require_once 'db.php';

echo '

<form action="login-process.php" method="post">

    Username: <input type="text" name ="username">
    <br/>
    Password: <input type="text" name ="password">
    <br/>


    <input type="submit" value="Login">
</form>

';