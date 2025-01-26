<?php

include "database_connection.php";
session_start();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo "Both email and password are required.";
        exit();
    }

    // Prepare and execute the query
    $sql = "SELECT user_id, username, email, password_hash FROM users WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a user with the provided email exists
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password_hash'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                // Redirect to index.php
                header("Location: ../index.php");
                exit();
            } else {
                // Incorrect password
                echo "Invalid email or password. <a href='login.php'>Try again</a>";
            }
        } else {
            // No user found with that email
            echo "Invalid email or password. <a href='login.php'>Try again</a>";
        }

        // Close statement
        $stmt->close();
    } else {
        // Handle SQL preparation error
        echo "Something went wrong. Please try again later.";
    }

    // Close database connection
    $conn->close();
} else {
    // Redirect if accessed without POST
    header("Location: login.php");
    exit();
}
