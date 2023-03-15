<?php

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

$stdno = $_GET['studentno'];
// echo $data = $_GET['data'];

$select1 = "SELECT * FROM `books`";
$select2 = "SELECT * FROM registration WHERE studentno = $stdno";
$query = mysqli_query($connect,$select1);

$query2 = mysqli_query($connect,$select2);
while($rows = mysqli_fetch_array($query2))
{
    $name = $rows['name'];
    $studentno = $rows['studentno'];
    $email = $rows['email'];
    $course = $rows['course'];
    $year = $rows['year'];

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

    <title>LMS: Student Panel</title>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-2 sidebar fixed-top">
                <div class="sidebar-header mt-5">
                    <a href="">
                        <img src="./PinClipart.com_learning-clip-art_3823373 (2).png" alt="" width="50" height="50">
                        <h6 class="text-white text-uppercase text-center pt-3">Library management system</h6>
                    </a>
                    <hr>

                </div>
                <div class="sidebar-content m-3">
                    <div class="home">
                        <a href="student.php?studentno=<?php echo $studentno;?>&data=">HOME</a>
                        <!-- <hr> -->
                    </div>
                    
                    <div>
                        <a href="studviewbooks.php?studentno=<?php echo $studentno;?>">View books</a>
                        <!-- <hr> -->
                    </div>
                    <div>
                        <a href="issuedbooks.php?studentno=<?php echo $studentno;?>">Issued books</a>
                    </div>
                    <div class="others">
                        <a href="studprofile.php?studentno=<?php echo $studentno;?>">view profile</a>
                    </div>

                    <div class="logout">
                        <a href="./logout.php">Log out</a>
                    </div>
                </div>
            </div>
            <!-- end of side bar -->
            <div class="col-lg-10 content">
            <div class="topbar text-right bg-light p-2 shadow">
            <?php 
                $sql=mysqli_query($connect,"select profile_image from gallery where studentno = '$studentno'");
                while($r=mysqli_fetch_array($sql))
                    {
                        ?>
                        <img src="./profiles/<?php echo $r['profile_image'];?>" alt=""  width="50" height="50" class="rounded shadow mr-3>
                        <?php
                        }

                        ?>
                   
                   <span class="text-uppercase mr-3"><?php echo $name; ?></span>
                   <span class="mr-3">STUDENT NO: <?php echo $stdno; ?></span>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light bg-white pl-4 fixed-top">
                   <a href="" class=" navbar-brand" id="menu">
                
                
             
                    <?php 
                    $sql=mysqli_query($connect,"select profile_image from gallery where studentno = '$studentno'");
                    while($r=mysqli_fetch_array($sql))
                    {
                        ?>
                     <img src="./profiles/<?php echo $r['profile_image'];?>" alt=""  width="50" height="50" class="rounded shadow m-3">
                     <?php
                     }

                     ?>
                    <span class="text-uppercase mr-1" style="font-size:17px;"><?php echo $name; ?></span>
                    <span class="mr-1" style="font-size:15px;">STUDENT NO: <?php echo $stdno; ?></span>
                   </a>
                   
                
            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span> 
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto ">
                <li class="nav-item active ">
                    <a class="nav-link" style="font-size:15px;" href="student.php?data=&studentno=<?php echo $studentno; ?>">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size:15px;" href="studviewbooks.php?studentno=<?php echo $studentno;?>">View books</a>
                </li>
                
                <li class="nav-item">
                    
                    <a class="nav-link" style="font-size:15px;" href="issuedbooks.php?studentno=<?php echo $studentno;?>">Issued books</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" style="font-size:15px;" href="studprofile.php?studentno=<?php echo $studentno;?>">view profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="font-size:15px;" href="./logout.php">Log out</a>
                </li>

                

                </ul>
                </div>
      
                </nav>
                <!-- navigation b.ar -->
               

               <div class="container">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 profile mt-5">
                            <div class="profile-photo" align="center">
                                <a href="" data-toggle="modal" data-target="#uploadimage">
                                    <?php 
                                        $sql=mysqli_query($connect,"select profile_image from gallery where studentno = '$studentno'");
                                        while($r=mysqli_fetch_array($sql))
                                        {
                                            ?>
                                                <img src="./profiles/<?php echo $r['profile_image'];?>" alt=""  width="150" height="150">
                                            <?php
                                        }

                                    ?>
                                    <button class="btn btn-dark">Upload</button>
                                </a>
                                
                                <h3 class="text-center pt-3">
                                    <span>NAME: </span>
                                    <?php echo $name; ?>
                                </h3>
                                <hr>
                            </div>
                            <div class="profile-info">
                                <p><b>Email Address: </b><span><?php echo $email;?></span></p> 
                                <hr>
                                <p><b>Student Number: </b><span><?php echo $studentno;?></span></p> 
                                <hr>
                                <p><b>Course:         </b><span><?php echo $course;?></span></p> 
                                <hr>
                                <p><b>Year of Study:  </b><span><?php echo $year;?></span></p> 

                            </div>
                            <button class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal">EDIT PROFILE</button>
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
                                       <form action="./image_upload.php?student=<?= $studentno?>" method="post" enctype="multipart/form-data">

                                            
                                                <input type="file" name="pimage" required>
                                            
                                            <button class="btn btn-success mt-3" name="profile">Upload</button>
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
                                        <form action="editprofile.php?studentno=<?php echo $studentno?>" method="post">
                                            <div class="form-group">
                                                <label for="">Email:</label>
                                                <input type="email" class="form-control" value="<?php echo $email?>" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Name:</label>
                                                <input type="text" class="form-control" value="<?php echo $name?>" name="name">
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

    <script src="./script.js"></script>
    <script src="../jquery-3.5.1.min.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    
</body>
</html>