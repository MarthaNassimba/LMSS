<!-- php code -->

<?php

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

$select = "SELECT * FROM `bookrequests` ORDER BY id DESC";

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
               

               <!-- <div class="container mt-5">
                    <div class="header">        
                        <h5>MANAGE BOOK REQUESTS</h5>
                        <hr>
                    </div>
                </div> -->
                
                <div class="p-3">
                    <div class="row bg-info mr-2 p-3">
                        <div class="col text-white">
                            <h6>View Requested books</h6>
                        </div>
                        <!-- search area -->
                        <div class="col search">
                            <center>
                            <form action="">
                            <input type="text" id="search" placeholder="Search book by title" onkeyup="searchfunction()">
                            
                            </form>
                            </center>
                        </div>
                        <!-- search area -->
                    </div>
                    <table class="table" id="product-table">
                        <thead class="bg-info text-white">
                            <th scope="col">#</th>
                            <th scope="col">Student Number</th>
                            <th scope="col">Book Title</th>
                            <th scope="col">ISBN Number</th>
                            <th scope="col">Request Date</th>
                            <!-- <th scope="col">Return Date</th> -->
                            <th scope="col">Collateral</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody id="body">
                            <?php
                            $count=1;
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                    <tr class="product">
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row['studentno']; ?></td>
                                        <td><h5><?php echo $row['bname']; ?></h5></td>
                                        <td><?php echo $row['bisbn']; ?></td>
                                        <td><?php echo $row['request_date']; ?></td>
                                        <!-- <td><?php //echo $row['return_date']; ?></td> -->
                                        <td><?php echo $row['collateral']; ?></td>
                                        <td>
                                        <?php
                                                $status= $row['status'];
                                                $bname = $row['bname'];
                                                 
                                                if($status == 1)
                                                {
                                                    
                                                    echo '<p><a href="approve.php?id='.$row["id"].'&status=0&bname='.$bname.'" class="btn btn-success">Request approved</a></p>';
                                                }

                                                else
                                                {
                                                    
                                                    echo '<p><a href="approve.php?id='.$row["id"].'&status=1&bname='.$bname.'" class="btn btn-warning">Approve request</a></p>';
                                                }
                                            ?>
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