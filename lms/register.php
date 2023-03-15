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
    <title>Register page</title>
</head>
<body>

    

      <!-- landing page -->
      <div class="container-fluid landing">
        <div class="container register">
            <div class="row">
                <div class="col-lg-2 col-md-2"></div>
                <div class="col-lg-8 col-md-8 col-sm-12 p-5 form1">
                    <!-- <div class="color fixed-top mt-5 p-2 text-center text-warning">
                        <h3>WELCOME TO THE LIBRARY MANAGEMENT</h3>
                    </div> -->
                    <form action="server.php" method="post" onsubmit="return validate()">
                        <h4 class="text-center text-white p-3">SIGNUP FORM</h4>
                        
                        
                        <?php
                   
                      $data = $_GET['data'];
                      echo $data;
                         ?>
                        
                    
                        <!-- name -->
                        <div class="form-group">
                            <label class="text-white">Full Name:</label>
                            <input type="text" name="name" placeholder="Enter Full Name" class="form-control" required>
                        </div>
    
                        <!-- email address -->
                        <div class="row form-group">
                            <div class="col">
                                <label for="" class="text-white">Email address:</label>
                                <input type="email" name="email" placeholder="E-mail address" class="form-control" required>
                            </div>
                            
                            <!-- student number -->
                            <div class="col">
                                <label for="" class="text-white">Student number:</label>
                                <input type="text" name="studentno" placeholder="student number" class="form-control" required>
                            </div>
                        </div>

                        <!-- options -->
                        <div class="row form-group">
                            <div class="col">
                                <label for="" class="text-white">Course:</label>
                                <!-- choose course -->
                                <select name="course" id="" class="form-control">
                                    <option value="" selected>Choose course</option>
                                    <option value="bitc">BITC</option>
                                    <option value="bis">BIS</option>
                                    <option value="dcs">DCS</option>
                                </select>
                            </div> 
                            <div class="col">
                                <label for="" class="text-white">Year of study:</label>
                                <!-- choose year of study -->
                                <select name="year" id="" class="form-control">
                                    <option value="" selected>Choose year of study</option>
                                    <option value="First year">First year</option>
                                    <option value="Second year">Second year</option>
                                    <option value="Third year">Third year</option>
                                </select>
                            </div>
                        </div>
    
                        <!-- password -->
                        <div class="form-group">
                            <label for="" class="text-white">Password:</label>
                            <input type="password" name="password1" id="passwd1" placeholder="Password" class="form-control">
                            <label for="" id="label1">Invalid password</label>
                        </div>
    
                        <!-- confirm password -->
                        <div class="form-group">
                            <label for="" class="text-white">Confirm Password:</label>
                            <input type="password" name="password2" id="passwd2" placeholder="Confirm Password" class="form-control" required>
                            <label for="" id="label2">Invalid password</label>
                        </div>
    
                        <!-- check box -->
                        <div class="form-group">
                            <input type="checkbox" name="checkbox" required>
                            <span class="text-white">By creating an account, you agree to the terms</span>
                        </div>
    
                        <!-- register button -->
                        <div class="form-group">
                            <center>
                                <button class="btn" name="submit">Register</button>
                            </center>
                        </div>
                        <p class="text-white">Already have an account, <a href="studentlogin.php?data="><b><i>Login here</i></b></a></p>
                    </form>
                </div>
                <div class="col-lg-2 col-md-2 "></div>
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