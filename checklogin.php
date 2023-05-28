<?php
    session_Start();
    $Email=filter_input(INPUT_POST,'username');
    $Password=filter_input(INPUT_POST,'password');
    if(!empty($Email)||!empty($Password))
    {
            $host="localhost:3325";
                $dbusername="root";
                $dbpassword="";
                $dbname="musify";
                $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			//read from database
			$query = "select fpassword,email from registration where email = '$Email' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['fpassword'] === $Password)
					{
						$_SESSION['username'] = $user_data['Email'];
						header("Location:Musify/rap.html");
						die();
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
    ?>