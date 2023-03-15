<?php

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");

$id = $_GET['id'];
$status = $_GET['status'];
$bname = $_GET['bname'];
$studentno = $_GET['studentno'];
// $requestdate=date('Y/m/d');
// $date = strtotime($requestdate);
// $date = strtotime('+ 7 day',$date);
// echo $return_date = date('Y/m/d',$date);
$sql = "UPDATE bookrequests SET return_status = $status WHERE id='$id'";

$number = mysqli_query($connect,"SELECT bnumber FROM books WHERE bname = '$bname'");
while($rows = mysqli_fetch_array($number))
{
    echo $bnumber = $rows['bnumber'];
} 

if($status==1)
{
    echo $num = $bnumber+1;
}
else{
    echo $num = $bnumber;
}
$query = mysqli_query($connect,$sql);
mysqli_query($connect,"UPDATE books SET bnumber = $num WHERE bname='$bname'");

if($query)
{
    header("location:stdissuedbooks.php?studentno='$studentno'");
}


?>