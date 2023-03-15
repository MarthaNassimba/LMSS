<?php

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

$id = $_GET['id'];
$status = $_GET['status'];
$sql = "UPDATE registration SET status = $status WHERE id=$id";

$query = mysqli_query($connect,$sql);

if($query)
{
    header("location:students.php");
}


?>