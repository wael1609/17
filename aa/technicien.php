<!DOCTYPE html>
<?php
// Include the Database class
include_once 'database.php';

// Create a new Database instance
$db = new Database();

// Check if the logout button was clicked
if (isset($_GET['logout'])) {
    // Perform logout operations here, such as destroying the session
    // For example:
    session_start();
    session_destroy();
    // Redirect to index.php
    header("Location: index.php");
    exit();
}

// Retrieve maintenance information from the database
$maintenanceInfo = $db->getAllMaintenanceInfo();

?>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technicien Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('parc.jpg');
            background-size: cover;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
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
        .logout-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }
        .logout-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Maintenance Information</h1>
        <?php if (!empty($maintenanceInfo)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Car Part</th>
                        <th>Immatriculation</th>
                        <th>Declaration Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($maintenanceInfo as $maintenance): ?>
                        <tr>
                            <td><?php echo $maintenance['id']; ?></td>
                            <td><?php echo $maintenance['user_id']; ?></td>
                            <td><?php echo $maintenance['car_part']; ?></td>
                            <td><?php echo isset($maintenance['registration_number']) ? $maintenance['registration_number'] : ''; ?></td>
                            <td><?php echo $maintenance['declaration_date']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No maintenance information found.</p>
        <?php endif; ?>
        <a href="?logout" class="logout-btn">Logout</a>
    </div>
</body>
</html>
