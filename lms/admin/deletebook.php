<?php

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

$id = $_GET['id'];

$select = "SELECT * FROM books WHERE id = $id";

$delete = "DELETE FROM books WHERE id = $id";

$query = mysqli_query($connect,$delete);

if($query)
{
    header("location:viewbooks.php");
}

?>