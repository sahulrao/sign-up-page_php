<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
    <style>
        body {
            background-image: url('bg2.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    
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

        $sql = "SELECT * FROM $tablename WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $age = $row['age'];
                $email = $row['email'];
                $dob = $row['dob'];
                $contact = $row['contact'];
                $profileImage = $row['profileImage'];
            }
        } else {
            echo "0 results";
        }
    }
?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="homepage.php">Dashboard</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="edit_profile.php" class="btn btn-primary mr-2">Edit Profile</a>
                <a href="logout.php" class="btn btn-danger my-2 my-sm-0">Logout</a>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $profileImage; ?>" class="card-img-top" alt="Profile Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $name; ?></h5>
                        <p class="card-text">Age: <?php echo $age; ?></p>
                        <p class="card-text">Email: <?php echo $email; ?></p>
                        <p class="card-text">Date of Birth: <?php echo $dob; ?></p>
                        <p class="card-text">Contact Number: <?php echo $contact; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
