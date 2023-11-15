<?php
if (isset($_POST['admin_email'])) {
    $admin_email = $_POST['admin_email'];

    $conn = new mysqli('localhost', 'root', '', 'projects');

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT admin_type FROM admin_login WHERE admin_email = ?");
        $stmt->bind_param("s", $admin_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Admin email is found
            $row = $result->fetch_assoc();
            $admin_type = $row['admin_type'];

            // Determine the admin dashboard URL based on admin_type
            $dashboard_url = "";

            if ($admin_type == "Main") {
                $dashboard_url = "admin_dashboard.html";
            } elseif ($admin_type == "Bus-Admin") {
                $dashboard_url = "admin_dashboard_Bus.html";
            } elseif ($admin_type == "Air-Admin") {
                $dashboard_url = "admin_dashboard_air.html";
            } elseif ($admin_type == "Train-Admin") {
                $dashboard_url = "admin_dashboard_train.html";
            }

            if (!empty($dashboard_url)) {
                // Admin email and type found, set session variables
                session_start();
                $_SESSION['admin_email'] = $admin_email;
                $_SESSION['admin_type'] = $admin_type;
                header("Location: $dashboard_url");
                exit();
            } else {
                echo "Login failed. Admin dashboard URL not found for admin type.";
            }
        } else {
            echo "Login failed. Admin user not found.";
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "Required fields not provided.";
}
?>