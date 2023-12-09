<?php
session_start();
if(isset($_SESSION['uid'])){
    header('location: admin/admindash.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arial:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .admintitle {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .admintitle a {
            color: #FFFFFF;
            text-decoration: none;
            padding: 5px 10px;
            margin: 0 10px;
            background-color: #333333;
            border-radius: 5px;
        }

        .admintitle a:hover {
            background-color: #555555;
        }

        form {
            padding: 20px;
            text-align: center;
            max-width: 400px;
            margin: 20px auto; /* Add margin to separate from the header */
            background-color: #FFFFFF;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px; /* Add border-radius for rounded corners */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

       
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 5px 0; /* Adjust margin for better spacing */
            width: 80%;
        }

        input[type="submit"] {
            background-color: #5CB85C;
            color: white;
            cursor: pointer;
            width: 100%;
            padding: 10px; /* Add padding for better button appearance */
            border: none; /* Remove border for a cleaner look */
            border-radius: 5px; /* Add border-radius for rounded corners */
        }

        input[type="submit"]:hover {
            background-color: #4CAF50;
        }

        .adminlinks {
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #333;
        }

      
        }
    </style>
</head>
<body>
    <div class="admintitle">
        <h1>Welcome to the Admin Panel</h1>
        <a href="login.php">Admin Login</a>
        <a href="index.php">Back to Home</a>
    </div>
    <form action="login.php" method="POST">
        <table>
            <tr>
                <td>Username:</td><td><input type="text" name="uname" required></td>
            </tr>
            <tr>
                <td>Password:</td><td><input type="password" name="pass" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html>



<?php
include('dbcon.php');
if(isset($_POST['login'])){
   $username = $_POST['uname'];
   $password = $_POST['pass'];
   $qry= "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
   $run= mysqli_query($con,$qry);
   $row= mysqli_num_rows($run);
   if($row<1){
       ?>
       <script>alert("Oops! Username and Password not matched..");
           window.open('login.php','_self');
       </script>
       <?php
   } else {
       $data= mysqli_fetch_assoc($run);
       $id=$data['id'];
       $_SESSION['uid']=$id;
       header('location:admin/admindash.php');
   }
}
?>
