<?php

foreach ($_GET as $title=>$value){
    $array[$title] = $value;
}


echo json_encode($array);
