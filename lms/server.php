<?php

include("connection.php");


if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $studentno = $_POST['studentno'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $password = md5($_POST['password1']);
    $checkbox = $_POST['checkbox'];
    $status = 1;

    // inserting data to the database
    $select = "SELECT * FROM registration WHERE email = '$email' or studentno='$studentno' ";
   $row = mysqli_num_rows(mysqli_query($connect,$select));
       if($row)
       {
        $data= "<script>alert('This user already exists')</script>";
            header("location:register.php?data=$data");
       }

       else
       {
        $insert = "INSERT INTO registration(name,email,studentno,course,year,password,checkbox,status) VALUES('$name','$email','$studentno','$course','$year','$password','$checkbox',$status)";
        if($insert)
        {
            echo "success \n";
        }
        $query = mysqli_query($connect,$insert) or die("Data not inserted in the database");
    
    
        if($query)
        {
            $data= "<script>alert('This user has been successfully registered')</script>";
            header("location:index.php?data=$data");
            
        }
       }
    
}
?>