<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "aker";
    
    $connection = new mysqli($serverName,$userName,$password,$database);

    if($connection->connect_error){
        die("Connection failed : " . $connection->connect_error);
    }