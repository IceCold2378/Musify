<?php
include('dbcon.php');
session_start();
if(isset($_POST['login']))
{
    $email= $_POST['username'];
    $password= $_POST['password'];
    try{
        $user = $auth->getUserByEmail("$email");
        $user_name=$user->displayName;
        try{
            $signInResult = $auth->signInWithEmailAndPassword($email,$password);
            $idTokenString = $signInResult->idToken();
            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $uid = $verifiedIdToken->claims()->get('sub');
                $_SESSION['verified_user_id']=$uid;
                $_SESSION['idTokenString']=$idTokenString;
                $_SESSION['status'] ="Login Succesfully";
                header('Location: index.php');
                exit();
            } catch (FailedToVerifyToken $e) {
                echo 'The token is invalid: '.$e->getMessage();
            }
        }catch(Exception $e){
            $_SESSION['status'] ="Wrong Password";
            header('Location: index.php');
            exit();
        }
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        //echo $e->getMessage();
        $_SESSION['status'] ="Wrong Email Address";
        header('Location: index.php');
        exit();
    }
}
else
{
        $_SESSION['status'] ="Not Allowed";
        header('Location: login.php');
}
?>