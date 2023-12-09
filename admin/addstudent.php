<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
}
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Admin Dashboard</title>
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
</head>
<body>
<div class="admintitle">
    <h1>Search Student Information</h1>
    <a href="admindash.php">Back to Dashboard</a>
    <a href="logout.php">Log Out</a>
</div>

<form action="addstudent.php" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <th colspan="2">Fill The Details Of Student</th>
        </tr>
        <tr>
            <td>Rollno.</td>
            <td><input type="number" name="rolln" placeholder="Enter Rollno" required></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="nam" placeholder="Enter FullName" required></td>
        </tr>
        <tr>
            <td>Standerd</td>
            <td><input type="number" name="stander" placeholder="Enter class" required></td>
        </tr>
        <tr>
            <td>City</td>
            <td><input type="text" name="cit" placeholder="Enter city" required></td>
        </tr>
        <tr>
            <td>Parent Contact Number</td>
            <td><input type="number" name="pcon" placeholder="Enter parentContactNumber" required></td>
        </tr>
        <tr>
            <td>Upload Image</td>
            <td><input type="file" name="simg" required></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Insert"></td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['submit'])) {
    include('../dbcon.php');

    $rolln = $_POST['rolln'];
    $nam = $_POST['nam'];
    $stander = $_POST['stander'];
    $cit = $_POST['cit'];
    $pcon = $_POST['pcon'];
    $imagenam = $_FILES['simg']['name'];
    $tempnam = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempnam, "../savedimages/$imagenam");

    $qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standerd`, `image`) VALUES ('$rolln', '$nam', '$cit', '$pcon', '$stander', '$imagenam')";
    $run = mysqli_query($con, $qry);

    if ($run == true) {
        echo "<script>alert('Data inserted Successfully :)');</script>";
    }
}
?>
</body>
</html>
