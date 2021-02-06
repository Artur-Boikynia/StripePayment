<?php

$dbh = new PDO('mysql:host=db;dbname=artur_shop','artur_base','artur_pwd');
$sql ="INSERT INTO `tabs` (`title`, `text`) VALUES (:title, :text)";
$sql ="SELECT * FROM `tabs` ORDER BY `id` DESC LIMIT 2";
$stmt = $dbh->prepare($sql);

$pdoExec = $stmt->execute();

$result = $stmt->fetchAll();

echo json_encode($result);



