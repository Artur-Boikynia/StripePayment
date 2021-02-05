<?php
declare(strict_types=1);

error_reporting(E_ALL);

//require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/Prob.php';

$dbh = new Prob();


//$dbh = new DB('localhost', 'artur_base', );
//$dbh = new PDO('mysql:host=localhost;dbname=artur_shop','artur_base','artur_pwd');

/*$stmt = $dbh->prepare("INSERT INTO `news` (title, text) VALUES (:title, :text)");
$stmt->bindParam(':title', $_POST['title']);
$stmt->bindParam(':text', $_POST['text']);
$stmt->execute();*/
