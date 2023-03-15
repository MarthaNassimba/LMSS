<?php

$connect = mysqli_connect('localhost','root','','lms') or die("not connected");


if(isset($_POST['password_link']))
{
    $email = $_POST['email'];
    $token = rand();

    $check_email = "SELECT * FROM registration WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($connect,$check_email) or die("no email");
    $num = mysqli_num_rows($check_email_run);
    if( $num > 0)
    {
        while($row = mysqli_fetch_array($check_email_run))
        {
            $get_name=$row['name'];
            $get_email=$row['email'];
        }

        $update_token = "UPDATE registration SET verify_token = '$token' WHERE email='$get_email'";
        $update_token_run = mysqli_query($connect,$update_token);

        if($update_token_run)
        {
            // send_password_reset($get_name,$get_email,$token);
            // $mailman->put_StartTLS(true);
            echo $to = $get_email;
            $subject = 'Password reset';
            $message = "Hello";
            $headers = "From: denisjothamzkalule@gmail.com\r\nReply-To:denisjothamzkalule@gmail.com";
            $mail_sent = mail($to,$subject,$message,$headers);
            if($mail_sent == true)
            {
                echo "Mail sent";
                // $data = "<script>alert('We have sent a link to your email. Check it please')</script>";
                // header("location:password_reset.php?data=$data");
            }
            else
            {
                echo "Mail not sent";
            }
            
            
        }
        else
        {
            $data = "<script>alert('Something went wrong')</script>";
            header("location:password_reset.php?data=$data");
        }
    }

    else
    {
        $data = "<script>alert('The email does not exist')</script>";
        header("location:password_reset.php?data=$data");

    }
}

if(isset($_POST['password_update']))
{
    $email = $_POST['email'];
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);

    $token = $_POST['password_token'];

    if(!empty($token))
    {
        $check_token = "SELECT verify_token FROM registration WHERE verify_token='$token' LIMIT 1";
        $check_token_run = mysqli_query($connect,$check_token);

        if(mysqli_num_rows($check_token_run))
        {
            if($new_password == $confirm_password)
            {
                $update_password = "UPDATE registration SET password='$new_password' WHERE verify_token='$token' LIMIT 1";
                $update_password_run = mysqli_query($connect,$update_password);

                if($update_password_run)
                {
                    $data = "<script>alert('Password Reset is successfull')</script>";
                    header("location:password_change.php?data=$data");
                }
                else
                {
                    $data = "<script>alert('Did not update password, Something went wrong')</script>";
                    header("location:password_change.php?data=$data");
                }

            }
            else
                {
                    $data = "<script>alert('Passwords do not match')</script>";
                    header("location:password_change.php?data=$data");
                }
        }

        else
        {
            $data = "<script>alert('Invalid Token')</script>";
            header("location:password_change.php?data=$data");
        }
    }
}
?>