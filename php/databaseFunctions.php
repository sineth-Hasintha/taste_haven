<?php
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

// Fetch data from the `users` table
$sql = "SELECT user_id, username, email, password_hash, full_name, phone_number, created_at FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table format
    echo "<table border='1'>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password Hash</th>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Created At</th>
            </tr>";

    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["user_id"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["password_hash"] . "</td>
                <td>" . $row["full_name"] . "</td>
                <td>" . $row["phone_number"] . "</td>
                <td>" . $row["created_at"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>