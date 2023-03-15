<?php
$connect = mysqli_connect('localhost','root','','lms') or die("not connected");
$select = mysqli_query($connect,"SELECT * FROM admin");
 while($admin = mysqli_fetch_array($select))
 {
    $id = $admin['id'];
    $email = $admin['email'];
    $fullname = $admin['fullname'];
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./admin.css">

    <title>LMS: Admin Panel</title>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 sidebar fixed-top">
                <div class="sidebar-header mt-5">
                    <a href="">
                        <img src="./images/PinClipart.com_learning-clip-art_3823373 (2).png" alt="" width="50" height="50">
                        <h6 class="text-white text-uppercase text-center pt-3">Library management system</h6>
                    </a>
                    <hr>

                </div>
                <div class="sidebar-content m-3">
                    <div class="home">
                        <a href="./admin.php?data=">HOME</a>
                        <!-- <hr> -->
                    </div>
                    
                    <div>
                        <a href="./bookrequests.php">Book Requests</a>
                        <!-- <hr> -->
                    </div>
                    <div>
                        <a href="students.php">Manage Students</a>
                        <!-- <hr> -->
                    </div>
                    <div>
                        <a href="category.php">Add Category</a>
                        <!-- <hr> -->
                    </div>
                    <div>
                        <a href="addbook.php">Add book</a>
                        <!-- <hr> -->
                    </div>
                    <div>
                        <a href="viewbooks.php">Manage books</a>
                        <!-- <hr> -->
                    </div>
                    
                    <div class="others">
                        <a href="adminprofile.php">view profile</a>
                    </div>

                    <div class="logout">
                        <a href="logout.php">Log out</a>
                    </div>
                </div>
            </div>
            <!-- end of side bar -->
            <div class="col-lg-10 content">
               <div class="topbar text-center bg-light">
                   <a href="" class="text-uppercase"> ADMIN DASHBOARD</a>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light bg-white pl-4 fixed-top">
            
            <a href="" class=" navbar-brand text-uppercase" id="menu"> ADMIN DASHBOARD</a>
                
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> 
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto ">
                <li class="nav-item active ">
                    <a class="nav-link" href="admin.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bookrequests.php">Book Requests</a>
                </li>
                
                <li class="nav-item">
                    
                    <a class="nav-link" href="students.php">Manage Students</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Add Category</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="addbook.php">Add book</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="viewbooks.php">Manage books</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="adminprofile.php">view profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log out</a>
                </li>

                </ul>
            </div>
      
      </nav>
    <!-- navigation b.ar -->
               

               <div class="container">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-7 profile mt-5">
                            <div class="profile-photo">
                                <a href="" style="text-decoration:none;" data-toggle="modal" data-target="#uploadimage">
                                    <?php 
                                        $sql=mysqli_query($connect,"select profile_image from gallery where studentno = '$email'");
                                        while($r=mysqli_fetch_array($sql))
                                        {
                                            ?>
                                                <img src="./profiles/<?php echo $r['profile_image'];?>" alt="">
                                            <?php
                                        }
                                        
                                    ?>
                                    <button class="btn btn-dark">Upload</button>
                                <h3 style=" color:#000;" class="text-center">
                                    ADMIN
                                </h3>
                                </a>
                                
                                <hr>
                            </div>
                            <div class="profile-info">
                                <p><b>Email Address:</b> <?php echo $email;?></p> <span></span>
                                <hr>
                                <p><b>Name:</b> <?php echo $fullname;?></p> <span></span>
                            </div>
                            <center>
                            <form action="" >
                            <a href="" data-toggle="modal" data-target="#myModal"><button class="btn btn-primary form-control">EDIT PROFILE</button></a>
                            </form>
                            </center>
                        </div>
                        <div class="col-lg-2"></div>
                        
                        
                    </div>
                        <div class="modal fade" id="uploadimage">
                           <div class="modal-dialog modal-sm">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h4 class="text-center">
                                           Upload profile picture
                                       </h4>
                                   </div>
                                   <div class="modal-body">
                                       <form action="./image_upload.php" method="post" enctype="multipart/form-data">

                                            
                                                <input type="file" name="pimage" required>
                                            
                                            <button class="btn btn-success mt-3" name="upload">Upload</button>
                                       </form>
                                   </div>

                               </div>
                           </div> 
                        
                        </div>
                    
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-center">Change Admin Profile</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form action="editprofile.php" method="post">
                                            <div class="form-group">
                                                <label for="">Email:</label>
                                                <input type="email" class="form-control" value="<?php echo $email?>" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Name:</label>
                                                <input type="text" class="form-control" value="<?php echo $fullname?>" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Old Password:</label>
                                                <input type="password" name="opassword" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">New Password:</label>
                                                <input type="password" name="npassword" class="form-control">
                                            </div>
                                            <center>
                                                <button type="submit" name="edit" class="btn btn-primary">Change</button>
                                            </center>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="text" data-dismiss="modal" class="btn btn-danger form-control" value="Close">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    
               </div>

            </div>
        </div>
    </div>

    <script src="../jquery-3.5.1.min.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    
</body>
</html>