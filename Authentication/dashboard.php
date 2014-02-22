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

$session = new Session();

$user = $session->get('username');
$pass = $session->get('password');

echo $user;
echo $pass;

$auth = new ITP\Auth($pdo);
if (!$auth->attempt($user, $pass))
{
    $response = new RedirectResponse('login.php');
    return $response->send();
}

//info of user
$user = $session->get('username');
echo '<h3> Welcome, ' . $user . '</h3>';

//last login
echo '<p> Last Login: ';
echo '';
echo 'ago. </p>';

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


