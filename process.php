<?php

include('connection.php');
$fUllNames = $_POST['names'];
$userName = $_POST['username'];
$role = $_POST['role'];
$password = $_POST['pass'];
$cpassword = $_POST['cpass'];


    $fUllNames = mysqli_real_escape_string($con, $fUllNames);
    $userName = mysqli_real_escape_string($con,$userName);
    $role = mysqli_real_escape_string($con,$role);
    $password= mysqli_real_escape_string($con,$password);
    $cpassword = mysqli_real_escape_string($con,$cpassword);



    
    if($password != $cpassword){
        echo'Password does not Match';
    }
    else
    {
        $pass = md5($password);
        $sql = "insert into register (names, usernames, role, password) values('$fUllNames', '$userName', '$role', '$password')";
        $result = mysqli_query($con, $sql);

        if($result)
        {
            echo 'Your records has been stored into the database';
        }
        else
        {
            echo 'check your query'; 
        }

    }

?>
