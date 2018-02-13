<?php
    include_once 'crud.php';
    $json = file_get_contents("php://input");
    $decode = json_decode($json,true);
    $object =  new CRUDOperation();
    echo $object->insert($decode);
    //print_r(json_decode($json,true));
?>