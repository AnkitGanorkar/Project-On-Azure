<!DOCTYPE html>
<html>
<head>
    <title>Data Display</title>
    <style>
        /* Add your CSS styling here */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
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

    // Retrieve data from the database
    $sql = "SELECT * FROM proposal";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Display the data in a table
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Company</th><th>Website</th><th>Message</th></tr>";
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
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found.";
    }

    // Close the connection
    mysqli_close($conn);
    ?>
</body>
</html>
