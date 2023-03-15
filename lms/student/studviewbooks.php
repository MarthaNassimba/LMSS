
<?php 

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

$stdno = $_GET['studentno'];

$select1 = "SELECT * FROM `books` ORDER BY id DESC";
$select2 = "SELECT * FROM registration WHERE studentno = $stdno";
$query = mysqli_query($connect,$select1);

$query2 = mysqli_query($connect,$select2);
while($rows = mysqli_fetch_array($query2))
{
    $name = $rows['name'];
    $studentno = $rows['studentno'];
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
                        <a href="./studprofile.php?studentno=<?php echo $studentno;?>">view profile</a>
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
                    <div class="row bg-info mr-2 p-3">
                        <div class="col text-white">
                            <h6>VIEW BOOKS</h6>
                        </div>
                        <!-- search area -->
                        <div class="col search">
                            <center>
                           
                            <input type="text" id="search" placeholder="Search book by title" onkeyup="searchfunction()">
                            
                            
                            </center>
                        </div>
                        <!-- search area -->
                    </div>
                        
                    <div class="row">
                            <?php
                            while($rows = mysqli_fetch_array($query))
                            {
                                ?>
                                
                                    <div class="col-lg-3 p-2 product-table">
                                        <a href="viewcard.php?id=<?php echo $rows['id']; ?>&studentno=<?php echo $stdno;?>">
                                            <div class="card body">
                                                <div class="card-header bg-light">
                                                    <center>
                                                    <img src="../admin/uploads/<?php echo $rows['bimage'];?>" alt="" width="100" height="100">
                                                    </center>
                                                </div>
                                                <div class="card-info text-center product">
                                                    <h5 class="text-dark"><?php echo $rows['bname']; ?></h5>
                                                    <p class="text-center text-dark"><span>ISBN: </span><?php echo $rows['bisbn']; ?></p>
                                                    
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                        
                            
                                <?php
                            }
                            ?>
                        </div>
               </div>
            </div>
        </div>
    </div>

    <script src="../jquery-3.5.1.min.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="../admin/script.js"></script>
</body>
</html>