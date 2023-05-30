<?php

$data_base = [
    "host" => "localhost",
    "user" => "root",
    "password" => "", 
    "name" => "first_database" 
];

function selectSQL($sql){
    global $data_base;

    $connection = mysqli_connect($data_base["host"], $data_base["user"], $data_base["password"], $data_base["name"]);
    $query = mysqli_query($connection, $sql);
    $return = mysqli_fetch_all($query, MYSQLI_ASSOC);

    mysqli_close($connection);
    return $return;
}

function selectSQLUnico($sql){
    global $data_base;

    $connection = mysqli_connect($data_base["host"], $data_base["user"], $data_base["password"], $data_base["name"]);
    $query = mysqli_query($connection, $sql);
    $return = mysqli_fetch_assoc($query);

    mysqli_close($connection);
    return $return;
}

function iduSQL($sql){
    global $data_base;

    $connection = mysqli_connect($data_base["host"], $data_base["user"], $data_base["password"], $data_base["name"]);
    $query = mysqli_query($connection, $sql);

    mysqli_close($connection);
}



?>