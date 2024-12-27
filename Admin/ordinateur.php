<?php
include 'config.php'; // Connexion à la base de données
session_start();

// Si l'administrateur n'est pas connecté, rediriger vers la page de connexion
if (!isset($_SESSION['admin_id'])) {
    header('Location: login_admin.php');
    exit();
}

// Gestion de l'insertion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];

    if (!empty($name) && !empty($prix) && !empty($image)) {
        $query = "INSERT INTO produit3 (name, price, image) VALUES ('$name', '$prix', '$image')";
        
        if (mysqli_query($conn, $query)) {
            $success_message = "Produit ajouté avec succès!";
        } else {
            $error_message = "Erreur lors de l'ajout du produit : " . mysqli_error($conn);
        }
    } else {
        $error_message = "Tous les champs doivent être remplis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Smartphone</title>
    <link rel="stylesheet" href="style/smart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
     
        
     
    <header class="header">
        <a href="admin.php" class="back-button">
            <i class="fas fa-arrow-left"></i> Retour à Admin
        </a>
        <a href="index.php" class="logo left-logo">
            <img src="images/logo4.png" alt="Logo Left">
        </a>
        <a href="index.php" class="logo right-logo">
            <img src="images/logo4.png" alt="Logo Right">
        </a>
    </header>


    <!-- Formulaire d'ajout du produit -->
    

    <div class="form-container">
        <?php if (isset($success_message)) : ?>
            <div class="success"><?= $success_message; ?></div>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <div class="error"><?= $error_message; ?></div>
        <?php endif; ?>
        <center><h1 style="color: #ff914d;">-- Inserer Ordinateur--</h1><center><br>
        <form method="POST" action="">
        
            <label for="name">Nom du produit:</label>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="prix">Prix du produit:</label>
            <input type="number" id="prix" name="prix" required><br><br>
            
            <label for="image">Image (nom du fichier):</label>
            <input type="text" id="image" name="image" required><br><br>

            <button type="submit">Ajouter le produit</button>
        </form>
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
