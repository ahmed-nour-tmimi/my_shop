<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    // Vérifier si l'utilisateur existe
    $query = "SELECT * FROM `admin` WHERE email = '$email'";
    $result = mysqli_query($conn, $query) or die('Erreur de requête SQL : ' . mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Vérifier le mot de passe (si haché, utilisez password_verify())
        if ($pass === $row['motpass']) {
            // Créer une session pour l'utilisateur
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_email'] = $row['email'];

            // Rediriger vers admin.php
            header('Location: admin.php');
            exit();
        } else {
            // Message d'erreur si le mot de passe est incorrect
            $message[] = 'Mot de passe incorrect !';
        }
    } else {
        // Message d'erreur si l'email n'est pas trouvé
        $message[] = 'Adresse email introuvable !';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <header class="header">
        <a href="index.php" class="logo left-logo">
            <img src="images/logo4.png" alt="Logo Left">
        </a>
        <a href="index.php" class="logo right-logo">
            <img src="images/logo4.png" alt="Logo Right">
        </a>
    </header>
    
    <div class="container">
        <div class="image-container">
            <img src="images/und.png" alt="Login Image">
        </div>
        <div class="form-container">
            <h1 class="admin-title">Admin</h1>
            
            <!-- Affichage des messages d'erreur -->
            <?php
            if (isset($message)) {
                foreach ($message as $msg) {
                    echo '<div class="alert">' . htmlspecialchars($msg) . '</div>';
                }
            }
            ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-primary" name="submit">Sign In</button>
                </div>
                <div class="form-footer">
                    Don't have an account? <a href="register.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    
    <footer class="footer-logos">
        <a href="index.php" class="logo left-logo-bottom">
            <img src="images/logo4.png" alt="Logo Left">
        </a>
        <a href="index.php" class="logo right-logo-bottom">
            <img src="images/logo4.png" alt="Logo Right">
        </a>
    </footer>
</body>
</html>
