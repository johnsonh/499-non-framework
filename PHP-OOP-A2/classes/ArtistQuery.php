<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/4/14
 * Time: 1:09 AM
 */

//namespace classes;
require_once 'Query.php';

class ArtistQuery extends Query {

    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->sql = "SELECT * FROM artists";
    }

    public function getAll()
    {
        $statement = $this->pdo->prepare($this->sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

} 