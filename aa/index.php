<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_POST['boutton-valider'])) {
    if (isset($_POST['email']) && isset($_POST['mdp'])) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $erreur = "";
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $nom_base_donnees = "form";
        $con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_donnees);
        $req = mysqli_query($con, "SELECT * FROM utilisateurs WHERE email = '$email' AND mdp ='$mdp'");
        $num_ligne = mysqli_num_rows($req);
        if ($num_ligne > 0) {
            $user = mysqli_fetch_assoc($req);
            $_SESSION['userId'] = $user['idu']; // Set the user ID in the session
            $userType = $user['type']; // Store user type in a variable for debugging
            // Redirect based on user type
            switch ($userType) {
                case 'admin':
                    header("Location: bienvenuadmin.php");
                    exit(); // Ensure that script execution stops after redirection
                    break;
                case 'tech':
                        header("Location: technicien.php");
                        exit(); // Ensure that script execution stops after redirection
                        break;
                case 'mecano':
                    header("Location: bienvenumeca.php"); // Redirect to bienvenumeca.php for mecano
                    exit(); // Ensure that script execution stops after redirection
                    break;
                case 'lavage_agent':
                    header("Location: biena.php"); // Redirect to biena.php for lavage_agent
                    exit(); // Ensure that script execution stops after redirection
                    break;
                default:
                    header("Location: bienvenu.php");
                    exit(); // Ensure that script execution stops after redirection
                    break;
            }
        } else {
            $erreur = "Adresse Mail ou Mot de passe incorrect !";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('parc.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 300px;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container form label {
            margin-bottom: 5px;
        }

        .login-container form input[type="text"],
        .login-container form input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container form input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .login-container form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
   <div class="login-container">
       <h1>Connexion</h1>
       <?php 
       if (isset($erreur)) {
           echo "<p class='error-message'>".$erreur."</p>";
       }
       ?>
       <form action="" method="POST">
           <label for="email">Adresse Mail</label>
           <input type="text" name="email" id="email">
           <label for="mdp">Mot de Passe</label>
           <input type="password" name="mdp" id="mdp">
           <input type="submit" value="Valider" name="boutton-valider">
       </form>
   </div> 
</body>
</html>
