<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$host = "127.0.0.1";
$port = "3306";  
$dbname = "tourism";
$username = "root";  
$password = "Sahil-2103@";

// Create connection
$dbcon = mysqli_connect($host, $username, $password, $dbname, $port);

// Check connection
if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert data into the 'vister' table
$insert_query = "INSERT INTO vister (username, email, pass) VALUES ('$name', '$email', '$pass')";
if (mysqli_query($dbcon, $insert_query)) {
    header("Location: map.html"); 
    exit(); 
    }  else {
    echo "Error: " . $insert_query . "<br>" . mysqli_error($dbcon);
}
mysqli_close($dbcon);
?>