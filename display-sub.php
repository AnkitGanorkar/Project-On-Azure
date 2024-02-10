<!DOCTYPE html>
<html>
<head>
    <title>Subscribed Emails</title>
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
    </style>
</head>
<body>
    <h1>Subscribed Emails</h1>
    <table>
        <tr>
            <th>Email</th>
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

        // Retrieve data from the database
        $sql = "SELECT email FROM subscribe";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td>No subscribed emails found.</td></tr>";
        }

        // Close the connection
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
