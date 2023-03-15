


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./login.css">
    <title>Login page</title>
</head>
<body>


      <!-- landing page -->
      <div class="container-fluid landing">
        <div class="container register">
            <div class="row">
                
                <div class="col-lg-6 welcome">
                  <div class="content">
                    <center>
                      <img src="./images/PinClipart.com_learning-clip-art_3823373 (2).png" alt="">
                    </center>
                    <div class="msg">
                      <h5 class="text-center text-light">WELCOME TO THE LIBRARY MANAGEMENT SYSTEM</h5>
                      <p class="text-center text-light">Login to the Admin Panel</p>                    
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-6 form">
                  <form class="rounded shadow" action="conn.php" method="post" onsubmit="return validate()">
                    <?php

                      $message = $_GET['data'];
                      echo $message;
                    ?>
                    <!-- student number -->
                    <div class="form-group">
                      <label for="" class="text-white">Email Address</label>
                        <input type="email" name="email" placeholder="Enter email address" class="form-control" required>
                    </div>

                    

                    <!-- password -->
                    <div class="form-group">
                      <label for="" class="text-white">Password</label>
                        <input type="password" name="password" id="passwd1" placeholder="Password" class="form-control">
                        <label for="" id="label1">Invalid password</label>
                    </div>

                    <!-- register button -->
                    <div class="form-group">
                        <center>
                            <button class="btn" name="adminlogin">Login</button>
                        </center>
                    </div>
                    <!-- <a href="password_reset.php" class="text-primary">Forgot password?</a> -->
                    <!-- <p class="text-white">Already have no account, <a href="register.php"><b><i>Register here</i></b></a></p> -->
                </form>
                </div>
            </div>
        </div>
      </div>
      <!-- landing page -->


    

    

    
    <script src="./jquery-3.5.1.min.js"></script>
    <script src="./bootstrap-4.6.0-dist/js/bootstrap.js"></script>
    <script src="./bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="./validation.js"></script>
</body>
</html>