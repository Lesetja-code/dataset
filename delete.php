<?php

include('connection.php'); // database connection 

$id = $_GET["ID"]; // get id through query string
$sql = "DELETE FROM register WHERE ID = '$id'";



if(mysqli_query($con,$sql))
{
   
    include('welcome.php');
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>