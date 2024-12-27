<?php
session_start();
include 'config.php';  // Inclure votre fichier de connexion à la base de données

// Vérifiez si le paiement est déjà effectué
if (isset($_SESSION['payment_status']) && $_SESSION['payment_status'] === 'success') {
    // Redirige vers la page facture.php après un paiement réussi
     
    unset($_SESSION['payment_status']); // Supprimer l'état pour éviter plusieurs redirections
     
    header('Location: facture.php'); // Redirige automatiquement vers la facture
    exit();
}

$error_message = ""; // Initialise la variable pour éviter les warnings

// Traitement du paiement (simulation)
// Traitement du paiement (simulation)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $card_number = $_POST['card_number'] ?? '';
    $card_name = $_POST['card_name'] ?? '';
    $expiry_date = $_POST['expiry_date'] ?? '';
    $cvv = $_POST['cvv'] ?? '';

    // Validation simple des champs
    if (!empty($card_number) && !empty($card_name) && !empty($expiry_date) && !empty($cvv)) {
        // Ajouter un jour par défaut à la date d'expiration (ex: "2024-08-01")
        $expiry_date = $expiry_date . '-01'; // Ajoute le jour "01" au mois choisi

        // Connexion à la base de données
        $conn = new mysqli("localhost", "root", "", "shop_db");

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connexion échouée : " . $conn->connect_error);
        }

        // Masquer une partie du numéro de carte pour des raisons de sécurité
        $masked_card_number = substr($card_number, 0, 4) . ' **** **** ' . substr($card_number, -4);

        // Préparer la requête d'insertion dans la base de données
        $stmt = $conn->prepare("INSERT INTO cartes_bancaires (card_name, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $card_name, $masked_card_number, $expiry_date, $cvv);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Simulez un paiement réussi
            $_SESSION['payment_status'] = 'success';
            header('Location: paiement.php'); // Recharge la page pour rediriger vers la facture
            exit();
        } else {
            $error_message = "Une erreur est survenue lors de l'enregistrement de la carte.";
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();
    } else {
        $error_message = "Veuillez remplir tous les champs correctement.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop - Paiement</title>
    <link rel="stylesheet" href="css/paiement.css">
</head>
<body>
<header>
        <a href="index.php" class="logo"> <img src="images/logo3.png"  class="logo"></a>
         <nav class="navbar"> 
             <a href="index.php"  >Principal</a>&nbsp;
             <a href="produit.php">produit</a>
             <a href="carte.php" class="active" >Panier</a>
             <a href="contact.php">Contact </a>
             <a href="location.php"  >localisation</a>
         </nav>
          
     </header><br><br><br>
     
     
    <div class="payment-form">
         
        <h1>$ Paiement $</h1>
        <form action="" method="POST"  target="_blank">
            <label for="card_name">Nom sur la carte :</label>
            <input type="text" id="card_name" name="card_name" required placeholder="Votre Nom">

            <label for="card_number">Numéro de carte :</label>
            <input type="text" id="card_number" name="card_number" required maxlength="16" pattern="\d{16}" placeholder="---- ---- ---- ----">

            <label for="expiry_date">Date d'expiration :</label>
            <input type="month" id="expiry_date" name="expiry_date" required>

            <label for="cvv">CVV :</label>
            <input type="password" id="cvv" name="cvv" required maxlength="3" pattern="\d{3}" placeholder="---">

            <button type="submit" class="btn-paiement">Valider le Paiement</button>
        </form>
    </div>
</body>
</html>
