<?php

$connect = $connect = mysqli_connect("localhost","root","","lms") or die("Connection not successfull");
$select2 = mysqli_query($connect,"SELECT * FROM admin");
 while($admin = mysqli_fetch_array($select2))
 {
   $id = $admin['id'];
  echo $username = $admin['email'];
  echo $password3 = $admin['password'];
 }
if(isset($_POST['studentlogin']))
{
  $studentno = $_POST['studentno'];
  $password = $_POST['password'];
  $enctype = md5($password);
  $select = "SELECT * FROM registration WHERE studentno = $studentno";

  $result = mysqli_query($connect,$select);
  while($row = mysqli_fetch_array($result))
  {
    echo $passwd = $row['password'];
    echo $name = $row['name'];
   echo $status = $row['status'];
  }

  

  
  if(strcasecmp($enctype,$passwd)== 0)
  {

    if($status == 1)
    {
      $data = '<script>alert("You have logged in successfully")</script>';
      header("location:student/student.php?studentno=$studentno&data=$data");
      // $this->loadStudent('student.php?studentno=$studentno',@$data);
    }

    else
    {
      $data= '<h5 style = "color:red">You were blocked fromm accessing this platform</h5>';
      header("location:studentlogin.php?data=$data");
    }
  }
 
  

  else
    {
      $data= '<h5 style = "color:red">You have entered a wrong password</h5>';
      header("location:studentlogin.php?data=$data");
    }
  
    
}

if(isset($_POST['adminlogin']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  if($email == $username && $password == $password3)
  {
    $data = '<script>alert("You have logged in successfully")</script>';   
      header("location:admin/admin.php?id=$id&data=$data");
  }
  else
    {
      $data= '<h5 style = "color:red">You have entered a wrong password</h5>';
      header("location:adminlogin.php?data=$data");
    }
}


?>