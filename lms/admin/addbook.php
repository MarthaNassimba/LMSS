<!-- php code -->

<?php

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

if(isset($_POST['submit']) && isset($_FILES['bimage']))
{
    // echo "<pre>";
    // print_r($_FILES['bimage']);
    // echo "</pre>";

    $name = $_POST['bname'];
    $author = $_POST['bauthor'];
    $isbn = $_POST['bisbn'];
    $number = $_POST['bnumber'];
    $library = $_POST['library'];
    $category =$_POST['category'];
    $imgName = $_FILES['bimage']['name'];
    $imgSize = $_FILES['bimage']['size'];
    $tmpName = $_FILES['bimage']['tmp_name'];
    $error = $_FILES['bimage']['error'];


    if($error === 0)
    {
        if($imgSize > 2000000)
        {
            $em = "Sorry, your file is too large";
            header("location: index.html?error=$em");
        }
        else
        {
            $imgext = pathinfo($imgName, PATHINFO_EXTENSION);
            $imgExt = strtolower($imgext);
            
            $allowedExt = array('jpg','jpeg','png');

            if(in_array($imgExt, $allowedExt))
            {
                $newImageName = uniqid("IMG-",true).'.'.$imgExt;
                $imageUploadPath = 'uploads/'.$newImageName;
                move_uploaded_file($tmpName, $imageUploadPath);

                $insert = "INSERT INTO books(`bname`,`bauthor`,`bisbn`,`bnumber`,`library`,`category`,`bimage`) VALUES('$name','$author','$isbn',$number,'$library','$category','$newImageName')";

                $query = mysqli_query($connect,$insert) or die("failed");

                if($query)
                {
                    // echo "Book added successfully";
                    echo $data = "<script>alert('Book has been added');</script>";
                    // header("location:addbook.php");
                }
            }

            else 
            {
                $em = "You cannot upload this type of file";
                header("location:index.html?error=$em");
            }
        }
    }

    else
    {
        echo "unknown error occurred";
    }
}

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
               <div class="container p-5">
                   <div class="header">
                       <h5>ADD BOOK</h5>
                       <hr>
                   </div>

                   <div class="form">
                       <form action="" method="post" enctype="multipart/form-data">
                           <div class="heading bg-info p-3">
                               <h6>Enter book information</h6>
                           </div>
                           <div class="row form-group mt-3">
                                <div class="col">
                                    <label for="">Book name: </label>
                                    <input type="text" name="bname" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="">Book Author: </label>
                                    <input type="text" name="bauthor" class="form-control" required>
                                </div>
                           </div>

                           <div class="row form-group">
                            <div class="col">
                                <label for="">ISBN Number: </label>
                                <input type="text" name="bisbn" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="">Number of books: </label>
                                <input type="number" name="bnumber" class="form-control" required>
                            </div>
                       </div>

                       <div class="row form-group">
                        <div class="col">
                            <label for="">Library: </label>
                            <select name="library" id="" class="form-control">
                                <option value="" selected>Choose Library</option>
                                <option value="Central Library">Central lib</option>
                                <option value="West end Library">West lib</option>
                                <option value="Barclays library">Barclays lib</option>
                                <option value="North Hall library">North Hall lib</option>
                            </select>
                        </div>
                        <div class="col">
                                <label for="">Category name:</label>
                                <!-- <input type="text" class="form-control" name="category"> -->
                                <select name="category" class="form-control" id="">
                                    <option value="" selected>Choose Category</option>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $result1 = mysqli_query($connect,$sql);
                                    while($row = mysqli_fetch_array($result1))
                                    {
                                        ?>
                                            <option value="<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></option>


                                        <?php
                                    }
                                    
                                    
                                    ?>
                                </select>
                        </div>
                        
                        
                   </div>
                   <div class="form-group">
                            <label for="">Upload Image: </label> <br>
                            <input type="file" name="bimage" required>
                        </div>

                   <div class="button">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                       </form>
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