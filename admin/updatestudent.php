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
    <a href="admindash.php">Back to Dashboard</a>
    <a href="logout.php">Log Out</a>
</div>

<div style="width: 90%; margin: auto;">
    <form action="updatestudent.php" method="POST">
        <input type="number" name="std" placeholder="Enter class" />
        <input type="text" name="stsname" placeholder="Enter name" />
        <input type="submit" name="submit" value="Show Info">
    </form>
</div>

<div style="width: 90%; margin: auto;">
    <table>
        <tr>
            <th>No.</th>
            <th>Images</th>
            <th>Name</th>
            <th>RollNo.</th>
            <th>Edit</th>
        </tr>

        <?php
        if (isset($_POST['submit'])) {
            include('../dbcon.php');
            $std = $_POST['std'];
            $stsname = $_POST['stsname'];
            $qry = "SELECT * FROM `student` WHERE `standerd`='$std' AND `name` LIKE '%$stsname%'";
            $run = mysqli_query($con, $qry);

            if (mysqli_num_rows($run) < 1) {
                echo "<tr><td colspan='5'>No record found..</td></tr>";
            } else {
                $count = 0;
                while ($data = mysqli_fetch_assoc($run)) {
                    $count++;
                    ?>
                    <tr align="center">
                        <td><?php echo $count; ?></td>
                        <td><img src="../savedimages/<?php echo $data['image']; ?>" alt="pic" style="max-width: 100px;"/> </td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['rollno']; ?></td>
                        <td><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
    </table>
</div>

</body>
</html>
