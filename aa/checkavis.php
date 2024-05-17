<?php
// Démarrer la session
session_start();

// Inclure le fichier de connexion à la base de données
require_once 'database.php';

// Créer une instance de la classe Database
$db = new Database();

// Récupérer les retours d'informations depuis la base de données
$feedbacks = $db->getAllFeedbacks(); // Vous devez implémenter cette méthode dans votre classe Database

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérifier les Avis</title>
    <!-- Inclure vos feuilles de style CSS ici -->
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Ajouter vos styles personnalisés ici */
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
        .feedback-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .feedback-item {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .feedback-item h2 {
            margin-top: 0;
            margin-bottom: 10px;
        }
        .feedback-item p {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Avis</h1>
    </header>
    <main>
        <section class="feedback">
            <ul class="feedback-list">
                <?php foreach ($feedbacks as $feedback): ?>
                    <li class="feedback-item">
                        <!-- Modifier les lignes suivantes pour accéder aux clés correctes -->
                        <h2><?php echo $feedback['feedback_id']; ?></h2>
                        <p><?php echo $feedback['feedback']; ?></p>
                        <p><strong>Utilisateur ID :</strong> <?php echo $feedback['user_id']; ?></p>
                        <p><strong>Créé À :</strong> <?php echo $feedback['created_at']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
</body>
</html>
