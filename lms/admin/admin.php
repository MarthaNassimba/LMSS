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
            <div class="col-lg-2 col-md-2 sidebar fixed-top">
                <div class="sidebar-header mt-5" >
                    <a href="">
                        <img src="./images/PinClipart.com_learning-clip-art_3823373 (2).png" alt="" width="50" height="50">
                        <h6 class="text-white text-uppercase text-center pt-3">Library management system</h6>
                    </a>
                    <hr>

                </div>
                <div class="sidebar-content m-3">
                    <div class="home">
                        <a href="admin.php">HOME</a>
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
            <div class="col-lg-10 col-md- content">
               <div class="topbar text-center bg-light">
                   <a href="" class="text-uppercase" id="menu"> ADMIN DASHBOARD</a>
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
               <?php
                   
                      $message = $_GET['data'];
                      echo $message;
                    ?>
               <!-- cards -->
               <div class="container mt-5">
                   <div class="row">
                       <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                           <a href="viewbooks.php">
                               <div class="card books">
                                    <center>
                                        <img src="./images/books.png" alt="" width="80" height="60">
                                    </center>
                                    <p class="text-center">
                                        <?php
                                            $connect = mysqli_connect('localhost','root','','lms') or die("not connected");
                                            $query = mysqli_query($connect,"select * from books");
                                            $num_rows = mysqli_num_rows($query);
                                            if($num_rows > 0)
                                            {
                                                echo $num_rows." BOOKS";
                                            }

                                            else{
                                                echo 0;
                                            }
                                        ?>
                                    </p>
                               </div>
                           </a>
                       </div>
                       <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <a href="students.php">
                                <div class="card students">
                                    <center>
                                        <img src="./images/5.png" alt="" width="80" height="60">
                                    </center>
                                    <p class="text-center">
                                    <?php
                                            $connect = mysqli_connect('localhost','root','','lms') or die("not connected");
                                            $query = mysqli_query($connect,"select * from registration");
                                            $num_rows = mysqli_num_rows($query);
                                            if($num_rows > 0)
                                            {
                                                echo $num_rows." STUDENTS";
                                            }

                                            else{
                                                echo 0;
                                            }
                                        ?>
                                    </p>
                                </div>
                            </a>
                       </div>
                       <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <a href="">
                                <div class="card requests">
                                    <center>
                                        <img src="./images/kindpng_117140 (1).png" alt="" width="80" height="60">
                                    </center>
                                    <p class="text-center">
                                    <?php
                                            $connect = mysqli_connect('localhost','root','','lms') or die("not connected");
                                            $query = mysqli_query($connect,"select * from bookrequests where status=1");
                                            $num_rows = mysqli_num_rows($query);
                                            if($num_rows > 0)
                                            {
                                                echo $num_rows." ISSUED BOOKS";
                                            }

                                            else{
                                                echo 0;
                                            }
                                        ?>
                                    </p>
                                </div>
                            </a>
                       </div>
                       <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <a href="">
                                <div class="card requests">
                                    <center>
                                        <img src="./images/kindpng_2560244.png" alt="" width="80" height="60">
                                    </center>
                                    <p class="text-center">
                                    <?php
                                            $connect = mysqli_connect('localhost','root','','lms') or die("not connected");
                                            $query = mysqli_query($connect,"select * from categories");
                                            $num_rows = mysqli_num_rows($query);
                                            if($num_rows > 0)
                                            {
                                                echo $num_rows." BOOK CATEGORIES";
                                            }

                                            else{
                                                echo 0;
                                            }
                                        ?>
                                    </p>
                                </div>
                            </a>
                       </div>
                       <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                           <a href="">
                               <div class="card books">
                                    <center>
                                        <img src="./images/books.png" alt="" width="80" height="60">
                                    </center>
                                    <p class="text-center">
                                        <?php
                                            $connect = mysqli_connect('localhost','root','','lms') or die("not connected");
                                            $query = mysqli_query($connect,"select * from bookrequests where return_status=1");
                                            $num_rows = mysqli_num_rows($query);
                                            if($num_rows > 0)
                                            {
                                                echo $num_rows." RETURNED BOOKS";
                                            }

                                            else{
                                                echo 0;
                                            }
                                        ?>
                                    </p>
                               </div>
                           </a>
                       </div>
                   </div>
               </div>
               <!-- cards -->
            </div>
        </div>
    </div>

    <script src="../jquery-3.5.1.min.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
</body>
</html>