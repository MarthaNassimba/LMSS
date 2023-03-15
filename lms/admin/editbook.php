
<!-- php code -->

<?php

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

$id = $_GET['id'];
$select = "SELECT * FROM books WHERE id=$id";
$result1 = mysqli_query($connect,$select);

while($row = mysqli_fetch_array($result1))
{
    $id = $row['id'];
    $name = $row['bname'];
    $author = $row['bauthor'];
    $isbn = $row['bisbn'];
    $number = $row['bnumber'];
    $library = $row['library'];
    $category = $row['category'];
}

if(isset($_POST['update']))
{

    $name = $_POST['bname'];
    $author = $_POST['bauthor'];
    $isbn = $_POST['bisbn'];
    $number = $_POST['bnumber'];
    $library = $_POST['library'];
    $category = $_POST['category'];



    
    $update = "UPDATE `books` SET `bname`='$name',`bauthor`='$author',`bisbn`='$isbn',`bnumber`=$number,`library`='$library',`category`='$category' WHERE `books`.`id`= $id";

    $query = mysqli_query($connect,$update) or die("failed");

     if($query)
    {
        // echo "Book added successfully";
        header("location:viewbooks.php");
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
                        <a href="./admin.php">HOME</a>
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
                        <a href="viewbooks.php">View books</a>
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
               
               <div class="container p-5">
                   <div class="header">
                       <h5>EDIT BOOK</h5>
                       <hr>
                   </div>

                   <div class="form">
                       <form action="" method="post" enctype="multipart/form-data">
                           <div class="heading bg-info p-3">
                               <h6>Edit book information</h6>
                           </div>
                           <div class="row form-group mt-3">
                                <div class="col">
                                    <label for="">Book name: </label>
                                    <input type="text" name="bname" class="form-control" value="<?php echo $name; ?>" required>
                                </div>
                                <div class="col">
                                    <label for="">Book Author: </label>
                                    <input type="text" name="bauthor" class="form-control" value="<?php echo $author; ?>" required>
                                </div>
                           </div>

                           <div class="row form-group">
                            <div class="col">
                                <label for="">ISBN Number: </label>
                                <input type="text" name="bisbn" class="form-control" value="<?php echo $isbn; ?>" required>
                            </div>
                            <div class="col">
                                <label for="">Number of books: </label>
                                <input type="number" name="bnumber" class="form-control" value="<?php echo $number; ?>" required>
                            </div>
                       </div>

                       <div class="row form-group">
                        <div class="col">
                            <label for="">Library: </label>
                            <select name="library" id="" class="form-control" >
                                <option value="" selected><?php echo $library; ?></option>
                                <option value="Central Library">Central lib</option>
                                <option value="West end Library">West lib</option>
                                <option value="Barclays library">Barclays lib</option>
                                <option value="North Hall library">North Hall lib</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Category: </label> <br>
                            <input type="text" name="category" value="<?php echo $category; ?>" class="form-control" required>
                        </div>
                        
                   </div>
                   <!-- <div class="form-group">
                            <label for="">Upload Image: </label> <br>
                            <input type="file" name="bimage" value="<?php //echo $newImageName?>">
                        </div> -->

                   <div class="button">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
                       </form>
                   </div>
               </div>
               
            </div>
        </div>
    </div>


    <script src="bootstrap-4.6.0-dist/js/bootstrap.js"></script>
    <script src="bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
</body>
</html>