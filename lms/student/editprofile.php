<?php
$connect = mysqli_connect('localhost','root','','lms') or die("not connected");
echo $studentno = $_GET['studentno'];
if(isset($_POST['edit']))
{
    $email = $_POST['email'];
    $name = $_POST['name'];
    echo $old_password = md5($_POST['opassword']);
    $new_password = md5($_POST['npassword']);

    $select = mysqli_query($connect,"select password from registration where studentno='$studentno'");
    while($row = mysqli_fetch_array($select))
    {
        echo $password = $row['password'];

    }
    echo strcmp($old_password,$password);
    if(strcasecmp($old_password,$password) < 1)
    {
        $update = "update registration set password = '$new_password' where email='$email'";
        $query=mysqli_query($connect,$update);
        if($query)
        {
            $data = "<script>alert('Profile Edited successfully');</script>";
            header("location:studprofile.php?data=$data&studentno=$studentno");
        }
    }
    else
    {
        $data =  "<script>alert('Profile not edited');</script>";
        header("location:studprofile.php?studentno=$studentno");
    }

    
}


?>