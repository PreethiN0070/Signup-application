<?php
$host = "localhost";
$port = "5432";
$dbname = "employee";
$user = "postgres";
$password = "vigyan12#";
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$db = pg_connect($connection_string);
if (!$db) {
    die("Connection failed: " . pg_last_error());
}
else{
    echo "Connection established successfully!";

}
?>


