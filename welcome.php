<?php
include('connection.php');

if(isset($_POST['btn2'])){
    include('process.php');
}
?>

<html>
    
    <head>
    <title>Welcome page</title>
    </head>
        <body>
            <h1>View Records</h1>
            <h1>List of registered users:</h1>
            <table border="1">
                <tr>
                    <td>NO.</td>
                    <td>Full Names</td>
                    <td> User name</td>
                    <td> Role</td>
                    <td> edit</td>
                    <td> Delete</td>

           <?php 
           
           $sql = "SELECT *FROM register";
           $result = mysqli_query($con, $sql);
           

           
               while($row = mysqli_fetch_assoc($result)) 
               {
                   ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['names']; ?></td>
                    <td><?php echo $row['usernames']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><a href="edit.php?ID=<?php echo $row['ID']; ?>">Edit</a></td>
                    <td><a href="delete.php?ID=<?php echo $row['ID']; ?>">Delete</a></td>
               </tr>
                     
                   <?php
               }
               ?>

         

               
           
        
        </table>
        <style>
            body{
                background-color: grey;
            }
            input {
                width:40%;
                height:5%;
                border-radius:05px;
                padding:8px 15px 8px 15px;
                box-shadow:1px 1px 2px 2px black;
            }
            
        </style>

            <h1>Add User:</h1>


           <form name="f1" action="welcome.php" onsubmit="return validation()" method="POST">
                <p>Full Names</p>
                <input type="text" name="names" placeholder="Enter Full names">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter username">
                <p>Role</p>
                <input type="text" name="role" placeholder="Enter Role">
                <p>Password</p>
                <input type="password" name="pass" placeholder="Enter password">
                <p>Confirm Password</p>
                <input type="password" name="cpass" placeholder="Confirm password">
                <input type="submit" id="btn2" name="btn2" value="Click to Add User">
                
            </form>

            <script>
            function validation()
            {
                var id1=f1.names.value;
                var id2=f1.username.value;
                var id3=f1.pass.value;
                var id4=f1.cpass.value;
                if(id1.length=="" && id2.length=="" && id3.length=="" && id4.length==""){
                    alert("Enter All fields");
                    return false;
                }
                else
                {
                    if(id1.length==""){
                        alert("Please enter Full names");
                        return false
                             }
                    if(id2.length==""){
                        alert("Please enter Username");
                        return false
                    }

                    
                    if(id3.length==""){
                        alert("Please enter Password");
                        return false
                    }
                    
                    if(id4.length==""){
                        alert("Please Cornfim Password");
                        return false
                    }
                }
            }
            </script>
            

        </body>
   
</html>
