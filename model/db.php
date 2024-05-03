<?php
function getConn(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lab task";
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

?>