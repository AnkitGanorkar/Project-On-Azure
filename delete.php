<!DOCTYPE html>
<html>
<head>
    <title>Data Display</title>
    <style>
        /* Add your CSS styling here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .delete-button {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <h1>Data Display</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Website</th>
            <th>Message</th>
            <th></th>
        </tr>
        <?php
        $sname = "localhost";
        $uname = "root";
        $password = "";
        $db_name = "target-lifter";

        // Create a connection
        $conn = mysqli_connect($sname, $uname, $password, $db_name);

        // Check the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Delete data if requested
        if (isset($_GET["delete"])) {
            $deleteId = $_GET["delete"];
            $deleteSql = "DELETE FROM proposal WHERE id = $deleteId";
            if (mysqli_query($conn, $deleteSql)) {
                echo "Data deleted successfully";
            } else {
                echo "Error deleting data: " . mysqli_error($conn);
            }
        }

        // Retrieve data from the database
        $sql = "SELECT * FROM proposal";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['lname']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td>".$row['company']."</td>";
                echo "<td>".$row['website']."</td>";
                echo "<td>".$row['message']."</td>";
                echo "<td><button class='delete-button' onclick=\"window.location.href='?delete=".$row['id']."'\">Delete</button></td>";
                echo "</tr>";
            }
        }
        