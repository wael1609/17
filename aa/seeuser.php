<?php
// Start the session
session_start();

// Include your database connection file
require_once 'database.php';

// Create an instance of the Database class
$db = new Database();

// Initialize variables
$message = '';

// Sample lavage history (you would retrieve this from a database)
$lavageHistory = isset($_SESSION['lavageHistory']) ? $_SESSION['lavageHistory'] : [];

// Get user information if username is provided
$userInfo = null;
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
    $username = $_GET['username'];
    $userInfo = $db->getUserInfoByUsername($username);
    if ($userInfo) {
        $userId = $userInfo['idu'];
        $lavageHistory = $db->getLavageHistoryByUserId($userId);
        $carburantHistory = $db->getCarburantHistoryByUserId($userId);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir Utilisateur</title>
    <!-- Include your CSS stylesheets here -->
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
        main {
            padding: 20px;
        }
        section {
            margin-bottom: 30px;
        }
        .user-information,
        .carburant-history,
        .lavage-history {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .user-information h2,
        .carburant-history h2,
        .lavage-history h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }
        .user-information ul {
            list-style-type: none;
            padding: 0;
        }
        .user-information ul li {
            margin-bottom: 10px;
        }
        .user-information ul li:last-child {
            margin-bottom: 0;
        }
        .carburant-history table,
        .lavage-history table {
            width: 100%;
            border-collapse: collapse;
        }
        .carburant-history th,
        .carburant-history td,
        .lavage-history th,
        .lavage-history td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .carburant-history th,
        .lavage-history th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <h1>Voir Utilisateur</h1>
    </header>
    <main>
        <?php if ($userInfo): ?>
            <section class="user-information">
                <h2>Informations sur l'utilisateur</h2>
                <ul>
                    <li><strong>ID:</strong> <?php echo $userInfo['idu']; ?></li>
                    <li><strong>Email:</strong> <?php echo $userInfo['email']; ?></li>
                    <li><strong>Type:</strong> <?php echo $userInfo['type']; ?></li>
                </ul>
            </section>
            <section class="carburant-history">
                <h2>Historique du carburant</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carburantHistory as $entry): ?>
                            <tr>
                                <td><?php echo $entry['date']; ?></td>
                                <td><?php echo $entry['money']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
            <section class="lavage-history">
                <h2>Historique du lavage</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <!-- Add other table headers here if needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lavageHistory as $entry): ?>
                            <tr>
                                <td><?php echo $entry['date']; ?></td>
                                <!-- Add other table data here if needed -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php else: ?>
            <p>Aucune information sur l'utilisateur n'a été trouvée.</p>
        <?php endif; ?>
    </main>
</body>
</html>
