<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "mydb"; 

$conn = new mysqli($servername, $username, $password, $dbname, 3306);

if ($conn->connect_error) {
    die("Connection failed: \n" . $conn->connect_error);
}
echo "";
?>
