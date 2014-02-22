<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 8:57 PM
 */

namespace ITP\Songs;

require_once 'db.php';
require_once 'Song.php';

use PDO;

class SongQuery
{
    protected $pdo;
    protected $sql;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->sql = "SELECT * FROM songs";
    }

    public function withArtist()
    {
        $this->sql .= " INNER JOIN artists ON songs.artist_id = artists.id";
        return $this;
    }

    public function withGenre()
    {
        $this->sql .= " INNER JOIN genres ON songs.genre_id = genres.id";
        return $this;
    }

    public function orderBy($property)
    {
        $this->sql .= ' ORDER BY ' . $property;
        return $this;
    }

    public function all()
    {
        $statement = $this->pdo->prepare($this->sql);
        //var_dump($statement);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

}