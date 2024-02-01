<?php

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAMA','oneclick');

// connect MYSQL

$connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAMA);

if($connect === false) {
    die("ERROR: Couldn't connect " . mysqli_connect_error());
}



?>