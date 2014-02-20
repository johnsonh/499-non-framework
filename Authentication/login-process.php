<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 5:19 PM
 */

require __DIR__ . '/../vendor/autoload.php';

require_once 'login.php';
require_once 'Auth.php';

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use DateTime;

echo 'dog';

$date = new DateTime();
$user = $session->get('username');
$pass = $session->get('password');

//check if already in a session
if (ITP\Auth::attempt($user, $pass))
{
    //redirect to dashboard.php
    $response = new RedirectResponse('dashboard.php');
    return $response->send();
}
else
{
    //not in session, check the user's input
    $user = $request->query->get('username');
    $pass = $request->query->get('password');

    if (ITP\Auth::attempt($user, $pass))
    {
        //legit user/pass, start new session
        $session = new Session();

        $session->set('username', $user);
        $session->set('password', $pass);
        $session->set('timestamp', new DateTime());

        $session->getFlashBag()->set('statusMessage', 'You have successfully logged in!');
    }
    else
    {
        //bad login, redirect to login.php
        $response = new RedirectResponse('login.php');
        return $response->send();
    }
}

/*
 * $request = Request::createFromGlobals();

echo $request->query->get('fullname'); // $_GET['fullname']



// header('Location: index.php');
//$response = new RedirectResponse('http://google.com');
//return $response->send();

$session = new Session();
$session->start(); // session_start()
//$session->set('fullname', 'David Tang');
//$session->set('email', 'dtang@usc.edu');
//$session->set('loginTime', time());

//$session->clear(); // session_destroy()

//echo $session->get('fullname');
//echo '<br />';
//echo $session->get('loginTime');

//$session->getFlashBag()->set('statusMessage', 'Thanks!');

var_dump($session->getFlashBag()->get('statusMessage'));

//$request->request->get('fullname'); // $_POST['fullname']
 *
 *
 */
