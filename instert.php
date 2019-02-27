<?php
    error_reporting(E_ALL & ~E_NOTICE);
    // require_once('dbcon.php');
     $con=mysqli_connect("localhost","root","","new_db");
    if(isset($_POST["submit"]))
    {
        $error = 0;
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name=mysqli_real_escape_string($con,trim($_POST['name']));
        }else{
            $error = 1;
            $empty_name="Username Cannot be empty.";
            echo $empty_name.'<br>';
        }
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email=mysqli_real_escape_string($con,trim($_POST['email']));
        }else{
            $error =1;
            $empty_email="Email cannot be empty.";
            echo $empty_email.'<br>';
        }

        if(!$error) {
            $sql="select * from db_test where email='$email'";
            $res=mysqli_query($con,$sql);
            if (mysqli_num_rows($res) > 0) {
            
            $row = mysqli_fetch_assoc($res);
            
            if($email==$row['email'])
            {
                echo "Email already exists";
            }
        }else { 
            	$newUser="INSERT INTO db_test (name,email) values ('$_POST[name]','$_POST[email]')";
            	if (mysqli_query($con,$newUser)) {
            		echo "Inserted";
            	}
        	}
        }
    }
    ?>


    <!-- Retrive data from db and display in table if it works then insted of displaying make pdf and send email tomorrows work-->