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

        .update-button {
            background-color: #008000;
            color: #fff;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
        }

        .update-button:hover {
            background-color: #006600;
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

        // Update data if requested
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $updateId = $_POST["id"];
            $name = $_POST["name"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $company = $_POST["company"];
            $website = $_POST["website"];
            $message = $_POST["message"];

            $updateSql = "UPDATE proposal SET name='$name', lname='$lname', email='$email', phone='$phone', company='$company', website='$website', message='$message' WHERE id=$updateId";

            if (mysqli_query($conn, $updateSql)) {
                echo "Data updated successfully";
            } else {
                echo "Error updating data: " . mysqli_error($conn);
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
                echo "<td>
                        <form method='post' action=''>
                            <input type='hidden' name='id' value='".$row['id']."'>
                            <input type='text' name='name' value='".$row['name']."'>
                            <input type='text' name='lname' value='".$row['lname']."'>
                            <input type='text' name='email' value='".$row['email']."'>
                            <input type='text' name='phone' value='".$row['phone']."'>
                            <input type='text' name='company' value='".$row['company']."'>
                            <input type='text' name='website' value='".$row['website']."'>
                            <input type='text' name='message' value='".$row['message']."'>
                            <button class='update-button' type='submit'>Update</button>
                        </form>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No data found.</td></tr>";
        }

        // Close the connection
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
