<!-- php code -->

<?php

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

if(isset($_POST['upload']))
{
    // echo "hi";
    // echo "<pre>";
    // print_r($_FILES['pimage']);
    // echo "</pre>";

    $res = mysqli_query($connect, "SELECT email FROM admin");
    while($row = mysqli_fetch_array($res))
    {
        echo $email = $row['email'];
    }
    
    $res2 = mysqli_query($connect,"SELECT * FROM gallery WHERE studentno='$email'");
    if(mysqli_num_rows($res2)>0)
    {
        $imgName = $_FILES['pimage']['name'];
        $imgSize = $_FILES['pimage']['size'];
        $tmpName = $_FILES['pimage']['tmp_name'];
        $error = $_FILES['pimage']['error'];


    if($error === 0)
    {
        if($imgSize > 5000000)
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
                $imageUploadPath = 'profiles/'.$newImageName;
                move_uploaded_file($tmpName, $imageUploadPath);

                // $insert = "INSERT INTO gallery(`studentno`,`profile_image`) VALUES('$email','$newImageName')";
                $update = "UPDATE gallery SET profile_image= '$newImageName' WHERE studentno='$email'";
                $query = mysqli_query($connect,$update) or die("failed");

                if($query)
                {
                    // echo "Book added successfully";
                    header("location:adminprofile.php");
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
    else
    {
        $imgName = $_FILES['pimage']['name'];
    $imgSize = $_FILES['pimage']['size'];
    $tmpName = $_FILES['pimage']['tmp_name'];
    $error = $_FILES['pimage']['error'];


    if($error === 0)
    {
        if($imgSize > 5000000)
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
                $imageUploadPath = 'profiles/'.$newImageName;
                move_uploaded_file($tmpName, $imageUploadPath);

                $insert = "INSERT INTO gallery(`studentno`,`profile_image`) VALUES('$email','$newImageName')";
                // $update = "UPDATE gallery SET profile_image= '$newImageName' WHERE studentno='$email'";
                $query = mysqli_query($connect,$insert) or die("failed");

                if($query)
                {
                    // echo "Book added successfully";
                    header("location:adminprofile.php");
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
    
}

?>

<!-- php code -->