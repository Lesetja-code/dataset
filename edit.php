<?php

include('connection.php');// Using database connection 

$id = $_GET["ID"]; // get id through query string

$sql = mysqli_query($con,"SELECT * FROM register WHERE ID='$id'"); // select query

$row = mysqli_fetch_array($sql); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $fUllNames = $_POST['names'];
    $userName = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['pass'];
    $sql = "UPDATE register SET names='$fUllNames', usernames='$userName', password='$password', role='$role' WHERE ID='$id'";
	//$sql = "UPDATE register". "SET names=$fUllNames". "usernames=$userName". "WHERE ID=$id";
     
    if(mysqli_query($con, $sql))
    {
        //header("location:welcome.php"); // redirects to all records page
        include('welcome.php');
        exit;
    }
    else
    {
        
        echo "Error editing  record"; 
    }    	
}
?>

<h3>Update Data</h3>

  
                    
</table>

<style>
            
            input {
                width:40%;
                height:5%;
                border-radius:05px;
                padding:8px 15px 8px 15px;
                box-shadow:1px 1px 2px 2px black;
            }
            
        </style>


<form   method="POST">
  <p>Full names</p>
  <input type="text" id="names" name="names" value="<?php echo $row['names'] ?>" placeholder="Enter Full Name" >
  <p>Username</p>
  <input type="text" id="username" name="username" value="<?php echo $row['usernames'] ?>" placeholder="Enter Username" >
  <p>Role</p>
  <input type="text" id="role" name="role" value="<?php echo $row['role'] ?>" placeholder="Enter role" >
  <p>Password</p>
  <input type="text" id="pass" name="pass" value="<?php echo $row['password'] ?>" placeholder="Enter password" ><br>
  <input type="submit" name="update" value="Update">
</form>