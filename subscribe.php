<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
