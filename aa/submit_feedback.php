<?php
session_start();

// Include database connection
require_once 'database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedback'])) {
    // Get user ID from session
    $user_id = $_SESSION['user_id'];
    
    // Get feedback from form
    $feedback = $_POST['feedback'];

    // Store feedback in database
    $db->addFeedback($user_id, $feedback);
    
    // Redirect back to the dashboard or any other page
    header("Location: bienvenu.php");
    exit();
} else {
    // Redirect to an error page or handle the error
    header("Location: error.php");
    exit();
}
?>
