<?php
include('dbcon.php');
session_start();
if(isset($_POST['button']))
{
    $name= $_POST['name'];
    $email= $_POST['exampleInputEmail1'];
    $password= $_POST['exampleInputPassword1'];
    $cpassword= $_POST['exampleInputPassword2'];
    $postData = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'cpassword' => $cpassword,
    ];
    $ref_table="users";
    $postRef_result = $database->getReference($ref_table)->push($postData);
    if($postRef_result)
    {
        $_SESSION['status'] ="User Added Successfully";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] ="User cannot be added";
        header('Location: index.php');
    }
}
?>