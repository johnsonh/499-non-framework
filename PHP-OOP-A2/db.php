<?php
/**
 * Created by PhpStorm.
 * User: Daily
 * Date: 2/4/14
 * Time: 1:09 AM
 */

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);