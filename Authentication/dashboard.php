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

//last login

//logout link


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
  <td>Jill</td>
  <td>Smith</td>
  <td>50</td>
  <td>ddf</td>
</tr>
<?php endforeach; ?>
';
echo '</table>';


