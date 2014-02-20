<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/19/14
 * Time: 6:58 PM
 */

namespace ITP;

class Auth
{
//    protected static $accounts = array (
//        "student" => "ttrojan"
//    );

    protected $pdo;
    protected $sql;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    protected function getUsers()
    {
        $this->sql = "SELECT * FROM users";
        $statement = $this->pdo->prepare($this->sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function attempt($username, $password)
    {
        $accounts = $this->getUsers();
        foreach ($accounts as $account)
        {
            if ($account->username == $username)
            {
                $sha = sha1($password);
                if ($account->password == $sha)
                {
                    return $account;
                }
            }
        }
        return null;
    }


} 