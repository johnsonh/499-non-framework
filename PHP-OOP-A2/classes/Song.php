<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/4/14
 * Time: 1:10 AM
 */

//namespace classes;

class Song {

    private $pdo;
    private $ID;
    private $title;
    private $artistID;
    private $genreID;
    private $price;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setArtistId($name)
    {
        $sql = "
        SELECT id FROM artists
        WHERE artist_name = '$name'
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $ID = $statement->fetch(PDO::FETCH_OBJ);
        $this->artistID = $ID->id;
    }
    public function setGenreId($name)
    {
        $sql = "
        SELECT id FROM genres
        WHERE genre = '$name'
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $ID = $statement->fetch(PDO::FETCH_OBJ);
        $this->genreID = $ID->id;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function save()
    {
        //if added to db, return true
        //else return false
        var_dump($this);
        $sql = "
        INSERT INTO songs(title, artist_id, genre_id, price)
        VALUES ('$this->title', $this->artistID, $this->genreID, '$this->price')
        ";
        $statement = $this->pdo->prepare($sql);
        var_dump($statement);
        if ($statement->execute())
        {
            //set the ID
            $this->ID = $this->pdo->lastInsertId();
            return true;
        }
        else
        {
            return false;
        }

    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getId()
    {
        return $this->ID;
    }
} 