<?php

// Start the session
session_start();

$userId = $_SESSION['user_id'];

// Database credentials
$host = 'localhost'; // MySQL server hostname
$username = 'root'; // MySQL username
$password = ''; // MySQL password
$database = 'taste_haven'; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);