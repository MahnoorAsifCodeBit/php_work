<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    exit(); // Make sure to exit after header redirection
   }

   $id = $_SESSION['id'];
   $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

   $res_Uname = "";
   $res_Email = "";

   if ($result = mysqli_fetch_assoc($query)) {
       $res_Uname = $result['Username'];
       $res_Email = $result['Email'];
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
            <div class="card-body text-center">
                <h2 class="card-title">Hello <b><?php echo htmlspecialchars($res_Uname); ?></b>,</h2>
                <p class="card-text">Welcome to the Final Lab Submission Portal</p>
                <p class="card-text">Your email is <b><?php echo htmlspecialchars($res_Email); ?></b></p>
                <a href="php/logout.php" class="btn btn-danger">Log Out</a>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
