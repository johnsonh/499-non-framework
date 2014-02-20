<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 5:19 PM
 */

require_once 'db.php';
require_once 'Auth.php';

//info of user
$user = $session->get('username');
echo 'Welcome, $user \n';

//last login
echo 'Last Login: ';
echo '';
echo 'ago. ';

//logout link
echo '
<a href="logout.php">Logout</a>
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
</tr>
<?php foreach ($songs as song) : ?>
<tr>
  <td><?php echo $song->title ?></td>
  <td><?php echo $song->artist_name ?></td>
  <td><?php echo $song->genre ?></td>
  <td><?php echo $song->price ?></td>
</tr>
<?php endforeach; ?>
';
echo '</table>';


