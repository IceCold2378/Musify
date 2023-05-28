<?php
    $name=filter_input(INPUT_POST,'name');
    $Email=filter_input(INPUT_POST,'exampleInputEmail1');
    $password=filter_input(INPUT_POST,'exampleInputPassword1');
    $cpassword=filter_input(INPUT_POST,'exampleInputPassword2');
    if(!empty($password)||!empty($cpassword)||!empty($name)||!empty($Email))
    {
                $host="localhost:3325";
                $dbusername="root";
                $dbpassword="";
                $dbname="musify";
                $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
                if(mysqli_connect_error())
                {
                    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
                }
                else{
                    $sql="INSERT INTO registration(nickname,email,fpassword,cpassword)values('$name','$Email','$password','$cpassword')";
                    if($conn->query($sql))
                    {
                        echo "New Record Added Sucessfully"; 
                    }
                    else{
                        echo"Error:".$sql."<br>".$conn->error;
                    }
                    $conn->close();
                }
    }
    else{
        echo "Enter valid information!";
        die();
    }
?>


