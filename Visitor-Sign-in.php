<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$host = "host=127.0.0.1";
$port = "port=5432";  
$dbname = "dbname=tourism";
$signin="user=postgres password=sahil";
 
$dbcon = pg_connect("$host $port $dbname $signin");

if (!$dbcon) {
    die("Connection failed: " . pg_last_error());
}

$insert_query = "INSERT INTO vister VALUES ('$name', '$email', '$pass')";

$result = pg_query($dbcon, $insert_query);

if ($result) {
    header("Location: map.html");
    exit();
} else {
    echo "Error: " . pg_last_error($dbcon);
}

pg_close($dbcon);
?>
