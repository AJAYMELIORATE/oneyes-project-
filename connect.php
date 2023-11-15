<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$database = "projects";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    $gender = $_POST["gender"];
    $date_of_birth = $_POST["date_of_birth"];
    $age = $_POST["age"];
    $aadhaar_number = $_POST["aadhaar_number"];
    $phone_number = $_POST["phone_number"];
    $id_proof = $_FILES["id_proof"]["name"];

    // Upload the ID proof file to a directory
    $target_dir = "c:/Users/A/Downloads/uploads"; // You should create this directory if it doesn't exist
    $target_file = $target_dir . basename($_FILES["id_proof"]["name"]);

    if (move_uploaded_file($_FILES["id_proof"]["tmp_name"], $target_file)) {
        // Insert the user data into the MySQL table
        $sql = "INSERT INTO register (user_name, user_email, user_password, gender, date_of_birth, age, aadhaar_number, phone_number, id_proof)
                VALUES ('$user_name', '$user_email', '$user_password', '$gender', '$date_of_birth', '$age', '$aadhaar_number', '$phone_number', '$id_proof')";

        if ($conn->query($sql) === TRUE) {
            header("Location: user_registration.php"); // Change 'login.php' to the desired page
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "File upload failed.";
    }

    // Close the MySQL connection
    $conn->close();
}
?>
