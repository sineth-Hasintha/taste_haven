<?php


// Start the session
session_start();

// Database credentials
$host = 'localhost'; // MySQL server hostname
$username = 'root'; // MySQL username
$password = ''; // MySQL password
$database = 'taste_haven'; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Input validation
    if (empty($fullName) || empty($email) || empty($password) || empty($confirmPassword)) {
        die("All fields are required!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }

    if ($password !== $confirmPassword) {
        die("Passwords do not match!");
    }

    // Check if the email already exists
    $checkEmailSql = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("An account with this email already exists!");
    }

    $stmt->close();

    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the username from the full name
    $username = explode(' ', $fullName)[0]; // Use the first part of the full name as the username
    $phoneNumber = null; // Default NULL if not provided

    // Insert the user into the database
    $insertSql = "INSERT INTO users (username, email, password_hash, full_name, phone_number, created_at) 
                  VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sssss", $username, $email, $passwordHash, $fullName, $phoneNumber);

    if ($stmt->execute()) {
        // Get the last inserted user ID
        $userId = $stmt->insert_id;

        echo ($userId );

        // Create a session for the user
        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        // Redirect the user to a dashboard or welcome page
        header("Location: login.php");
        exit();
    } else {
        echo "Something went wrong: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request!";
}

// Close the connection
$conn->close();
?>
