<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../login.php');
    }

?>
 <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Enhanced background color */
        }

        .admintitle {
            background-color: #4CAF50; /* Updated header background color */
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Refined text shadow */
        }

        .admintitle a {
            color: #FFFFFF; /* Updated link color */
            text-decoration: none;
            padding: 5px 10px;
            margin: 0 10px;
            background-color: #333333; /* Button-like appearance for links */
            border-radius: 5px;
        }

        .admintitle a:hover {
            background-color: #555555;
        }

        table {
            margin: 30px auto;
            width: 90%; /* Full-width table for better layout */
            border-collapse: collapse;
            background-color: #FFFFFF; /* Clean white background for table */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle box shadow */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center; /* Center aligned text for better readability */
        }

        th {
            background-color: #4CAF50; /* Header background color */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra striping for rows */
        }

        form {
            padding: 20px;
            text-align: center; /* Center-aligned form for better aesthetics */
        }

        input[type="number"],
        input[type="text"],
        input[type="submit"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 5px;
            width: auto; /* Auto width for better form control sizes */
        }

        input[type="submit"] {
            background-color: #5CB85C; /* Green color for submit button */
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4CAF50; /* Darker shade on hover */
        }
    </style>
<?php
include('header.php');
include('../dbcon.php');
$idd= $_GET['sid'];
$uqry= "SELECT * FROM `student` WHERE `id`='$idd'";
$run= mysqli_query($con,$uqry);
$data = mysqli_fetch_assoc($run);

?>


<div class="admintitle">
    <h1>Update Student Information</h1>
    <a href="admindash.php">Back to Dashboard</a>
    <a href="logout.php">Log Out</a>
</div>

<form action="updatedata.php" method="POST" enctype="multipart/form-data">
    <table border="0px solid">
        <th colspan="2">Edit The Details Of Student</th>
        
        <tr>
            <td>Rollno.</td><td><input type="number" name="rolln" value="<?php echo $data['rollno']; ?>" required /></td>
        </tr>
        <tr>
            <td>Name</td><td><input type="text" name="nam" value="<?php echo $data['name']; ?>" required /></td>
        </tr>
        <tr>
            <td>Standerd</td><td><input type="number" name="stander" value="<?php echo $data['standerd']; ?>" required /></td>
        </tr>
        <tr>
            <td>City</td><td><input type="text" name="cit" value="<?php echo $data['city']; ?>" required /></td>
        </tr>
        <tr>
            <td>Parent Contact Number</td><td><input type="number" name="pcon" value="<?php echo $data['pcont']; ?>" required /></td>
        </tr>
        <tr>
            <td>Upload Image</td><td><input type="file" name="simg" required /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="hidden" name="idd" value="<?php echo $data['id']; ?>" />
                <input type="submit" name="submit" value="Update" />
            </td>
        </tr>
    </table>
    
</form>
