<?php
// Include the Database class
include_once 'database.php';

// Create a new Database instance
$db = new Database();

// Check if a lavage request has been marked as done
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mark_done'])) {
    // Retrieve the lavage request ID from the form
    $lavageRequestId = $_POST['request_id'];

    // Mark the lavage request as done in the database
    $db->markLavageRequestAsDone($lavageRequestId);

    // Refresh the page to reflect the changes
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Retrieve all lavage requests from the database
$lavageRequests = $db->getAllLavageRequests();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des demandes de lavage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('parc.jpg'); /* Set the background image */
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat; /* Do not repeat the image */
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
        .mark-done-form {
            display: inline-block;
        }
        .mark-done-button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .mark-done-button.done {
            background-color: #2196F3; /* Blue color */
        }
        .mark-done-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des demandes de lavage</h1>
        <?php if (!empty($lavageRequests)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Utilisateur</th>
                        <th>Date de la demande</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lavageRequests as $request): ?>
                        <tr>
                            <td><?php echo $request['id']; ?></td>
                            <td><?php echo $request['idu']; ?></td>
                            <td><?php echo $request['date']; ?></td>
                            <td>
                                <!-- Form to mark lavage request as done -->
                                <form class="mark-done-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>">
                                    <?php
                                    // Check if the lavage request is done
                                    if ($request['done']) {
                                        echo '<button type="submit" class="mark-done-button done" name="mark_done">Lavage fait</button>';
                                    } else {
                                        echo '<button type="submit" class="mark-done-button" name="mark_done">Marquer comme fait</button>';
                                    }
                                    ?>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucune demande de lavage trouvée.</p>
        <?php endif; ?>
    </div>
</body>
</html>
