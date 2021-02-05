<?php

use Workerman\Worker;

require_once __DIR__ . '/../vendor/autoload.php';

$wsWorker = new Worker('websocket://0.0.0.0:80');
$wsWorker->count = 4;

$wsWorker->onConnect = function ($connection){
    echo "New connection \n";
};
var_dump($wsWorker->count);

$wsWorker->onMessage = function ($connection, $data) use ($wsWorker){
    var_dump($data);
    foreach ($wsWorker->connections as $clientConnection){
        $clientConnection->send($data);
    }
};

$wsWorker->onClose = function ($connection){
    echo "Connection closed \n";
};

Worker::runAll();
