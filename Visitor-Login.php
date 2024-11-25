<?php
// Collect data from the form
$name = $_POST['name'];
$pass = $_POST['pass'];

// Database connection details
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

// Prepare the SQL statement to prevent SQL injection
$query = "SELECT * FROM vister WHERE username = ? AND pass = ?";

// Prepare the statement
if ($stmt = mysqli_prepare($dbcon, $query)) {
    // Bind the parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ss", $name, $pass);  // "ss" means both params are strings

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if there are any matching rows
    if (mysqli_num_rows($result) > 0) {
        // Redirect to map.html if credentials are correct
        header("Location: map.html");
        exit();
    } else {
        echo "Invalid username or password.";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing the query: " . mysqli_error($dbcon);
}

// Close the database connection
mysqli_close($dbcon);
?>

