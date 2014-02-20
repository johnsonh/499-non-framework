<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 5:19 PM
 */

require_once 'login.php';
require_once 'Auth.php';

echo 'dog';

if (ITP\Auth::attempt("sd", "D"))
{
    //redirect to dashboard
}
else if (true)
{

}
