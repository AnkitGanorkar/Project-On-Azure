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

// Assuming you have form data to insert
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $company = $_POST["company"];
    $website = $_POST["website"];
    $message = $_POST["message"];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO proposal (name, lname, email, phone, company, website, message) VALUES ('$name', '$lname', '$email', '$phone', '$company', '$website', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully";
    } else {
        echo "Data inserted successfully: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>
