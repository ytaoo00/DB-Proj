<?php
$servername = "localhost";
$username = "yliu157";
$password = "gdEQz3G7";

$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
 //  echo "Successfully connected to database";
}



?>
