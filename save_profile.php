<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb"; 
$tablename = "signup"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $profileImage = $_POST['profileImage']; 
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["profileImage"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['name'] !== '') {
        $file_name = $_FILES['profileImage']['name'];
        $file_tmp = $_FILES['profileImage']['tmp_name'];
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file_name);

        if (move_uploaded_file($file_tmp, $target_file)) {
            $profileImage = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    
    $sql = "UPDATE $tablename SET name='$name', age='$age', password='$password', dob='$dob', contact='$contact', profileImage='$profileImage' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        
        header("Location: homepage.php");
        exit;
    } else {
        echo "Error updating profile: " . $conn->error;
    }
} else {
   
    header("location: login.html");
    exit;
}

$conn->close();
?>
