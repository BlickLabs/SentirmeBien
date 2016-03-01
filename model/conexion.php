<?php

$host="mysql.hostinger.mx";
$user="u826800690_root";
$password="2011301308";
$dbname="u826800690_senti";

$con=  mysqli_connect($host, $user, $password, $dbname);

if (mysqli_connect_errno())
{
    echo "Error al conectarse a Mysql". mysqli_error();
}