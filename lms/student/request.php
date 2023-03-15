<?php
$connect = mysqli_connect('localhost','root','','lms') or die("not connected");
$id=$_GET['id'];
echo $studentno = $_GET['studentno'];
if(isset($_POST['submit']))
{
    $title = $_POST['bname'];
    $isbn = $_POST['bisbn'];
    // $requestdate = $_POST['drequest'];
    // $returndate = $_POST['dreturn'];
    $collateral = $_POST['collateral'];
    $confirm = $_POST['confirm'];

    // $insert = "INSERT INTO bookrequests (bname,bisbn,request_date,return_date,collateral,confirm) VALUES('$title','$isbn',$requestdate,$returndate,'$collateral',$confirm)";
    $insert = "INSERT INTO `bookrequests`(`studentno`,`bname`, `bisbn`, `request_date`, `return_date`, `collateral`, `confirm`) VALUES ('$studentno','$title','$isbn',NULL,NULL,'$collateral','$confirm')";
    $result = mysqli_query($connect,$insert);
    if($result)
    {
        
        $data = "<h4 style = 'color:green'>Your book request has been sent successfully</h4>";
        header("location:requestbook.php?data=$data&studentno=$studentno&id=$id");
        
    }
    else
    {
        $data = "<h4 style = 'color:red'>Your book request is unsuccessful</h4>";
    }
}
?>