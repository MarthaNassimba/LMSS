<?php
$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

if(isset($_POST['edit']))
{
    $email = $_POST['email'];
    $name = $_POST['name'];
    $old_password = $_POST['opassword'];
    $new_password = $_POST['npassword'];

    $select = mysqli_query($connect,"select password from admin where email='$email'");
    while($row = mysqli_fetch_array($select))
    {
        $password = $row['password'];

    }
    // echo strcasecmp($old_password,$password);
    if(strcasecmp($old_password,$password) < 1)
    {
        $update = "update admin set password = '$new_password' where email='$email'";
        $query=mysqli_query($connect,$update);
        if($query)
        {
            $data = "<script>alert('Admin Profile Edited successfully');</script>";
            header("location:adminprofile.php?data=<?php echo $data?>");
        }
    }

    
}


?>