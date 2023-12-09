<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

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
    <h1>Welcome To Project :)</h1>
    <a href="login.php">Admin Login</a>
    
</div>
    <form method="POST" action="index.php">
        <table>
            <tr>
                <th colspan="2">Student Information</th>
            </tr>
            <tr>
                <td>Choose Standard</td>
                <td>
                    <select name="std">
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                        <option value="5">5th</option>
                        <option value="6">6th</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enter Roll No.</td>
                <td>
                    <input type="text" name="rollno" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
            </tr>
        </table>
    </form>
</body>

</html>


<?php

if(isset($_POST['submit'])){

    $stdd= $_POST['std'];
    $roln= $_POST['rollno'];

    include('dbcon.php');
    include('function.php');

    showdetails($stdd,$roln);
}

?>