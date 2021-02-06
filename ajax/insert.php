<?php

$dbh = new PDO('mysql:host=db;dbname=artur_shop','artur_base','artur_pwd');
$sql ="INSERT INTO `tab` (`title`) VALUES (:title)";
$stmt = $dbh->prepare($sql);

$pdoExec = $stmt->execute(
[
    'title' => 'tit',
]
);

if($pdoExec){
    echo 'good';
}
else{
    echo 'bed';
}
//var_dump($_POST['title'], $_POST['text']);
