<?php
include('dbcon.php');
session_start();
if(isset($_POST['button']))
{
    $name= $_POST['name'];
    $email= $_POST['exampleInputEmail1'];
    $password= $_POST['exampleInputPassword1'];
    $cpassword= $_POST['exampleInputPassword2'];
    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'password' => $password,
        'displayName' => $name,
        'cpassword' => $cpassword,
    ];    
    $createdUser = $auth->createUser($userProperties);
    if($createdUser)
    {
        $_SESSION['status'] ="User Created Successfully";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] ="User Not Created Successfully";
        header('Location: register.php');
    }
}
?>