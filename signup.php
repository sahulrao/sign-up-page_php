<?php
    include("connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];
        $dob_formatted = date('Y-m-d', strtotime($dob));
        $dob= $dob_formatted;
        $contact = $_POST['contact'];

        
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["profileImage"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        
        $allowedTypes = array('jpg', 'jpeg', 'png');
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["profileImage"]["name"])) . " has been uploaded.<br>";

               
                $stmt = $conn->prepare("INSERT INTO signup (name, age, email, password,  dob, contact, profileImage) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sisssss", $name, $age, $email, $password, $dob, $contact, $targetFile);

                
                if ($stmt->execute()) {
                    echo "New record created successfully<br>";
                } else {
                    echo "Error: " . $stmt->error;
                }

                
                $stmt->close();
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        } else {
            echo "Sorry, only JPG, JPEG, and PNG files are allowed.<br>";
        }

       
        $conn->close();
    }
?>
