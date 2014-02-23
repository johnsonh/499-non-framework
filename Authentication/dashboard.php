<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 5:19 PM
 */

require __DIR__ . '/../vendor/autoload.php';

require_once 'db.php';
require_once 'Auth.php';
require_once 'SongQuery.php';

use Symfony\Component\HttpFoundation\Session\Session;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use Carbon\Carbon;

$session = new Session();

//echo Carbon::now();

$user = $session->get('username');
$email = $session->get('email');

$auth = new ITP\Auth($pdo);
$account = $auth->authorize($user, $email);
//var_dump($account);
if (!account)
{
    $response = new RedirectResponse('login.php');
    return $response->send();
}

//info of user
$user = $session->get('username');
echo '<h3> Welcome, ' . $user . '</h3>';

//last login
$timestamp = $session->get('timestamp');
$now = Carbon::now();
echo '<p> Last Login: ';
echo $now->diffInSeconds($timestamp);
echo ' seconds ago. </p>';

//logout link
echo '<p>
<a href="logout.php">Logout</a></p>
';

$songQuery = new ITP\Songs\SongQuery($pdo);
$songs = $songQuery
    ->withArtist()
    ->withGenre()
    ->orderBy('title')
    ->all();

echo '<table>';
echo '
<tr>
  <th>Title</th>
  <th>Artist</th>
  <th>Genre</th>
  <th>Price</th>
</tr>';
foreach ($songs as $song)
{
    echo '<tr>';
    echo '<td>' . $song->title . '</td>';
    echo '<td>' . $song->artist_name . '</td>';
    echo '<td>' . $song->genre . '</td>';
    echo '<td>' . $song->price . '</td>';
    echo '</tr>';
}
echo '</table>';


