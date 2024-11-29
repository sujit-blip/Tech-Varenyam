<?php
$owner = $_POST['owner'];
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

$insert_query = "INSERT INTO service_pro VALUES ('$owner', '$email', '$pass')";

$result = pg_query($dbcon, $insert_query);

if ($result) {
    header("Location: Service-Provider-Enter.html");
    exit();
} else {
    echo "Error: " . pg_last_error($dbcon);
}

pg_close($dbcon);
?>
