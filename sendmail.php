<?php 

    if(isset($_POST['btn-send']))
    {
       $Email = $_POST['email'];
       $Query = $_POST['query'];
       $Concern = $_POST['concern'];
       $Yourself = $_POST['yourself'];
       if(empty($Query) || empty($Email) || empty($Concern))
       {
           header('location:contact.php?error');
       }
       else
       {
           $to = "musifysystems@gmail.com";
           $email_from='noreply@musify.com';
           $email_subject="New Form Submission";
            $body="Email ID: $Email.\n"."Query: $Query.\n"."Concern: $Concern.\n"."About yourself: $Yourself.\n";
            $headers="From: $email_from \r\n";
            //$headers ="Reply-To: $Email\r\n";
               if(mail($to,$email_subject,$body,$headers))
               {
                   header("location:contact.php?success");
               }
        }
    }
    else
    {
        header("location:contactus2.php");
    }
?>