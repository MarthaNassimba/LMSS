<!-- php code -->

<?php

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

$select = "SELECT * FROM `registration` ORDER BY id DESC";

$result = mysqli_query($connect,$select);

?>

<!-- php code -->

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
                        <a href="bookrequests.php">Book Requests</a>
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
               

               <div class="container mt-5">
                    <div class="header">        
                        <h5>MANAGE STUDENTS</h5>
                        <hr>
                    </div>
                </div>
                
                <div class="p-3">
                    <div class="row bg-info mr-2 p-3">
                        <div class="col text-white">
                            <h6>Student Details</h6>
                        </div>
                        <!-- search area -->
                        <div class="col search">
                            <center>
                            <form action="">
                            <input type="text" id="search" placeholder="Search name of student" onkeyup="searchfunction()">
                            
                            </form>
                            </center>
                        </div>
                        <!-- search area -->
                    </div>
                    <table class="table" id="product-table">
                        <thead class="bg-info text-white">
                            <th scope="col">#</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Student Email</th>
                            <th scope="col">Student Number</th>
                            <th scope="col">Course</th>
                            <th scope="col">Year of Study</th>
                            <!-- <th scope="col">Password</th> -->
                            <th scope="col">Status</th>
                            <th></th>
                            <!-- <th scope="col">Actions</th> -->
                        </thead>
                        <tbody id="body">
                            <?php
                            $count=1;
                            while($row = mysqli_fetch_array($result))
                            {
                                $studentno = $row['studentno'];
                                ?>
                                    <tr class="product">
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td>
                                            <?php
                                            $sql=mysqli_query($connect,"select profile_image from gallery where studentno = '$studentno'");
                                            while($r=mysqli_fetch_array($sql))
                                            {
                                                ?>
                                                <img src="../student/profiles/<?php echo $r['profile_image'];?>" alt=""  width="50" height="50" class="rounded shadow mr-3">
                                                <?php
                                                }
                                            ?>
                                        </td>
                                        <td><h5><?php echo $row['name']; ?></h5></td>
                                        
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['studentno']; ?></td>
                                        <td><?php echo $row['course']; ?></td>
                                        <td><?php echo $row['year']; ?></td>
                                        
                                        <!-- <td><?php //echo $row['password']; ?></td> -->
                                        <td>
                                            <?php
                                                $status= $row['status'];
                                                if($status == 1)
                                                {
                                                    echo '<p><a href="status.php?id='.$row["id"].'&status=0" class="btn btn-success">Enabled</a></p>';
                                                }

                                                else
                                                {
                                                    echo '<p><a href="status.php?id='.$row["id"].'&status=1" class="btn btn-danger">Disabled</a></p>';
                                                }
                                            ?>
                                     
                                        </td>
                                        <td>
                                        <a href="stdissuedbooks.php?studentno=<?php echo $row['studentno']; ?>" class="btn btn-info" style="">Details</a>
                                        </td>
                                        
                                    </tr>
                                <?php
                                $count ++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script src="../jquery-3.5.1.min.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="./script.js"></script>
</body>
</html>