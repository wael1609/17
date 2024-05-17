<?php
// Include your database connection file
require_once 'database.php';

// Create an instance of the Database class
$db = new Database();

// Get all users from the database
$allUsers = $db->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <!-- Add your CSS stylesheets here -->
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <header>
        <h1>All Users</h1>
    </header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allUsers as $user): ?>
                <tr>
                    <td><?php echo $user['idu']; ?></td>
                    <td><a href="seeuser.php?username=<?php echo urlencode($user['email']); ?>"><?php echo $user['email']; ?></a></td>
                    <td><?php echo $user['type']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
