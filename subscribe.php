<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sname = "targetlifter.mysql.database.azure.com";
    $uname = "newankit";
    $password = "xN]3PxKgeT9,^NuxN]3PxKgeT9,^Nu";
    
    $db_name = "targetlifter000";


    // Create a connection
    $conn = new mysqli($sname, $uname, $password, $db_name);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the email from the form
    $email = $_POST["email"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO subscribe (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
}
?>
