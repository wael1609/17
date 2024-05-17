<?php
session_start();

// Check if the user is logged in and has the correct type
if (!isset($_SESSION['userId']) || $_SESSION['type'] !== 'lavage_agent') {
    header("Location: index.php"); // Change this to the appropriate login page
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "form";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch lavage requests
$sql = "SELECT id, date FROM lavage";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavage Requests</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Lavage Requests</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["date"] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No lavage requests found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
