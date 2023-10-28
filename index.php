<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form class="signup-form" action="signup.php" id="signup-form" method="post" enctype="multipart/form-data">
            <div class="form-field">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-field">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" required>
            </div>
            <div class="form-field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-field">
                <label for="dob">DOB:</label>
                <input type="text" id="dob" name="dob" placeholder="dd-mm-yyyy" required>
            </div>
            <div class="form-field">
                <label for="contact">Contact No:</label>
                <input type="text" id="contact" name="contact" required>
            </div>
            <div class="form-field">
                <label for="profileImage">Profile Image:</label>
                <input type="file" id="profileImage" name="profileImage" accept="image/png, image/jpeg" required>
                <form action="save_profile.php" method="post" enctype="multipart/form-data">

            </div>
            <br>
            <div class="form-field">
                <input type="submit" value="Submit">
            </div>
            <br>
            <div class="login-link">
            <a href="login.html">Already have an account? Login here</a>
        </div>
        </form>
    </div>
</body>
</html>
