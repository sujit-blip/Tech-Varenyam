<?php
$name = $_POST['name'];
$pass = $_POST['pass'];

$host = "host=127.0.0.1";
$port = "port=5432";  
$dbname = "dbname=tourism";
$signin = "user=postgres password=sahil";

$dbcon = pg_connect("$host $port $dbname $signin");

if (!$dbcon) {
    die("Connection failed: " . pg_last_error());
}

/*$name = pg_escape_string($dbcon, $name);
$pass = pg_escape_string($dbcon, $pass);*/

$query = "SELECT * FROM vister WHERE username = '$name' AND pass = '$pass'";

$result = pg_query($dbcon, $query);

if ($result && pg_num_rows($result) > 0) {
    header("Location: map.html");
    exit();
} else {
    echo "Invalid username or password.";
}
pg_close($dbcon);
?>



