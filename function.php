<?php

function showdetails($stdd, $roln)
{
    include('dbcon.php');

    $qryy = "SELECT * FROM `student` WHERE `standerd`='$stdd' AND `rollno`='$roln'";
    $run = mysqli_query($con, $qryy);

    if (mysqli_num_rows($run) > 0) {
        $dataa = mysqli_fetch_assoc($run);
?>
        <style>
            table {
                margin: auto;
                width: 60%;
                margin-top: 40px;
                border-collapse: collapse;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
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

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            img {
                max-height: 150px;
                max-width: 140px;
            }
        </style>
        <table border="1px solid">
            <th colspan="3" style="background-color: #4CAF50;">Student Details</th>
            <tr>
                <td rowspan="5"><img src="savedimages/<?php echo $dataa['image']; ?>" alt="pic" /></td>
                <th>RollNo.</th>
                <td><?php echo $dataa['rollno']; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $dataa['name']; ?></td>
            </tr>
            <tr>
                <th>Standerd</th>
                <td><?php echo $dataa['standerd']; ?></td>
            </tr>
            <tr>
                <th>Parent Contact Number</th>
                <td><?php echo $dataa['pcont']; ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $dataa['city']; ?></td>
            </tr>
        </table>

<?php
    } else {
        echo "<script>alert('No Result Found :( ');</script>";
    }
}

?>
