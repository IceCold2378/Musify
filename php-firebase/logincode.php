<?php
include('dbcon.php');
session_start();
$auth = $factory->createAuth();
if(isset($_POST['login']))
{
    $email= $_POST['exampleInputEmail'];
    $password= $_POST['exampleInputPassword'];
    try{
        $user = $auth->getUserByEmail("$email");
        try{
            $signInResult = $auth->signInWithEmailAndPassword($email,$password);
            $idTokenString = $signInResult->idToken();
            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $uid = $verifiedIdToken->claims()->get('sub');
                $_SESSION['verified_user_id']=$uid;
                $_SESSION['idTokenString']=$idTokenString;
                $_SESSION['status'] ="Login Succesfully";
                header('Location: home.php');
                exit();
            } catch (FailedToVerifyToken $e) {
                echo 'The token is invalid: '.$e->getMessage();
            }
        }
        catch(Exception $e){
            $_SESSION['status'] ="Wrong Password";
            header('Location: login.php');
            exit();
        }
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        //echo $e->getMessage();
        $_SESSION['status'] ="Wrong Email Address";
        header('Location: home.php');
        exit();
    }
}
else
{
        $_SESSION['status'] ="Not Allowed";
        header('Location: login.php');
}
?>