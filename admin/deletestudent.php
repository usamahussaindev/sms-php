<?php
include('header.php');
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Student Information</title>
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
    <div class="dashboard-links">
        <a href="admindash.php">Back to Dashboard</a>
        <a href="logout.php">Log Out</a>
    </div>
 
</div>

<div class="content-container">
    <form action="deletestudent.php" method="POST" class="search-form">
        <div class="form-group">
            <label for="std">Enter class:</label>
            <input type="number" name="std" placeholder="Enter standard" />
        </div>
        
        <div class="form-group">
            <label for="stsname">Enter Name:</label>
            <input type="text" name="stsname" placeholder="Enter student name" />
        </div>

        <input type="submit" name="submit" value="Show Info" class="submit-btn" />
    </form>

    <!-- PHP and SQL logic here -->
    <?php
    if(isset($_POST['submit'])){
        include('../dbcon.php');
        $std = $_POST['std'];
        $stsname = $_POST['stsname'];

        $qry = "SELECT * FROM `student` WHERE `standerd`='$std' AND `name` LIKE '%$stsname%'";
        $run = mysqli_query($con, $qry);

        if(mysqli_num_rows($run) < 1){
            echo "<div>No records found.</div>";
        } else {
            echo "<table class='info-table'>";
            echo "<tr><th>No.</th><th>Images</th><th>Name</th><th>RollNo.</th><th>Delete</th></tr>";
            $count = 0;
            while($data = mysqli_fetch_assoc($run)){
                $count++;
                echo "<tr align='center'>";
                echo "<td>" . $count . "</td>";
                echo "<td><img src='../savedimages/" . $data['image'] . "' alt='pic' style='max-width: 100px;'/></td>";
                echo "<td>" . $data['name'] . "</td>";
                echo "<td>" . $data['rollno'] . "</td>";
                echo "<td><a href='deleteform.php?sid=" . $data['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</div>

</body>
</html>
