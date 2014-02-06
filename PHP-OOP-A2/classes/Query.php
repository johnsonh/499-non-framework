<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/4/14
 * Time: 1:09 AM
 */

//namespace classes;

class Query {

    protected $pdo;
    protected $sql;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {

    }

} 