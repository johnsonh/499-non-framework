<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 5:19 PM
 */

require __DIR__ . '/../vendor/autoload.php';

require_once 'Auth.php';


use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
//use DateTime;


echo 'dog';

$session = new Session();
$session->start(); // session_start()

$user = $session->get('username');
$pass = $session->get('password');

echo $user;
echo $pass;

//check if already in a session
$auth = new ITP\Auth($pdo);
if ($auth->attempt($user, $pass))
{
    //redirect to dashboard.php
    $response = new RedirectResponse('dashboard.php');
    return $response->send();
}
else
{
    //not in session, check the user's input
    $request = Request::createFromGlobals();
    $user = $request->request->get('username');
    $pass = $request->request->get('password');
    echo $user;
    echo $pass;

    $account = $auth->attempt($user, $pass);
    if ($account)
    {
        //legit user/pass, start new session
        //$session = new Session();
        echo 'Good login!';

        $session->set('username', $account->username);
        $session->set('email', $account->email);
        $session->set('timestamp', time());

        $session->getFlashBag()->set('statusMessage', 'You have successfully logged in!');

        //redirect to dashboard.php
        $response = new RedirectResponse('dashboard.php');
        return $response->send();
    }
    else
    {
        //bad login, redirect to login.php
        echo 'bad login, redirecting';
        $response = new RedirectResponse('login.php');
        //$session->getFlashBag()->set('statusMessage', 'Incorrect Login');
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
