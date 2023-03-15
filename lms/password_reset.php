


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
            <div class="row mt-5">
                
                <div class="col-lg-3">
                  
                </div>
                
                <div class="col-lg-6 form">
                    <?php
                    
                    echo $data = $_GET['data'];
                    ?>
                  <form action="password_reset_code.php" method="post" onsubmit="return validate()">
                    <h4 class="text-center text-white">Reset Password</h4>
                    
                    <!-- student number -->
                    <div class="form-group">
                      <label for="" class="text-white">Email Address</label>
                        <input type="email" name="email" placeholder="Enter email address" class="form-control" required>
                    </div>


                    <!-- register button -->
                    <div class="form-group">
                        
                            <button class="btn btn-primary" name="password_link" class="form-control">Send password reset link</button>
                        
                    </div>
                    
                    </form>
                </div>
                <div class="col-lg-3">
                  
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