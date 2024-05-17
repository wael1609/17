<?php
// Include your database connection file
require_once 'database.php';

// Instantiate the Database class
$db = new Database();

// Initialize variables
$message = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedback'])) {
    // Get feedback from form
    $feedback = $_POST['feedback'];

    // Store feedback in database
    $result = $db->addFeedback($feedback);
    
    if ($result) {
        $message = 'Feedback envoyé avec succès.';
    } else {
        $message = 'Erreur lors de l\'envoi du feedback.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donner votre avis</title>
    <!-- Include your CSS stylesheets here -->
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-image: url('parc.jpg'); /* Change background image */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #555;
        }

        textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
            font-family: Arial, sans-serif;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Include your header here -->
    <header>
        <h1>Your Website Name</h1>
        <nav>
            <ul>
                <li><a href="bienvenuadmin.php">Admin Dashboard</a></li>
                <li><a href="bienvenu.php">User Dashboard</a></li>
                <!-- Add more navigation links if needed -->
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Donner votre avis</h1>
        <?php if (!empty($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="feedback">Votre avis :</label>
                <textarea name="feedback" id="feedback" placeholder="S'il vous plaît, partagez votre avis sur notre site web..."></textarea>
            </div>
            <input type="submit" value="Envoyer">
        </form>
    </div>

    <!-- Include your footer here -->
    <footer>
        <p>&copy; 2024 parc system. All rights reserved.</p>
    </footer>
</body>
</html>
