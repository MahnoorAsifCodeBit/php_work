<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styleReg.css">
</head>
<body>
    <div style="background:  #800080 #FFC0CB;" class="d-flex justify-content-center align-items-center vh-100">
        
    <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("Error Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>
        <div class="card p-4 shadow-sm">
            <div class="text-center mb-4">
                <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
            </div>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name"></label>
                    <input type="text" name="username"  class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="email"></label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <input type="password" name="password"  class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name ="submit" value ="Register">Sign Up</button>
                <div class="mt-3 text-center">
                    <a href="index.php" class="text-dark">Already have an account? Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
