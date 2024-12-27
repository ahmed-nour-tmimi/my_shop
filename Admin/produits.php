<?php
include 'config.php'; // Connexion à la base de données
session_start();

// Si l'administrateur n'est pas connecté, rediriger vers la page de connexion
if (!isset($_SESSION['admin_id'])) {
    header('Location: login_admin.php');
    exit();
}

// Récupérer toutes les catégories
$categories_query = mysqli_query($conn, "SELECT * FROM `categories`") or die('Query failed');
$categories = [];
while ($row = mysqli_fetch_assoc($categories_query)) {
    $categories[] = $row;
}

// Récupérer tous les produits
$products_query = mysqli_query($conn, "SELECT p.*, c.name AS category_name FROM `products` p LEFT JOIN `categories` c ON p.category_id = c.id") or die('Query failed');
$products = [];
while ($row = mysqli_fetch_assoc($products_query)) {
    $products[] = $row;
}

// Gestion de l'insertion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $prix = mysqli_real_escape_string($conn, $_POST['prix']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    if (!empty($name) && !empty($prix) && !empty($image) && !empty($category_id)) {
        $query = "INSERT INTO `products` (name, price, image, category_id) VALUES ('$name', '$prix', '$image', '$category_id')";
        
        if (mysqli_query($conn, $query)) {
            $success_message = "Produit ajouté avec succès!";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
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
    <title>Ajouter un Produit</title>
    <link rel="stylesheet" href="./produits.css">
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
        
    </header>

    <!-- Formulaire d'ajout du produit -->
    <div class="form-container">
        <?php if (isset($success_message)) : ?>
            <div class="success"><?= $success_message; ?></div>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <div class="error"><?= $error_message; ?></div>
        <?php endif; ?>

        <center><h1 style="color: #ff914d;">-- Insérer un Produit --</h1></center><br>
        <form method="POST" action="">
            <label for="name">Nom du produit:</label>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="prix">Prix du produit:</label>
            <input type="number" id="prix" name="prix" required><br><br>
            
            <label for="image">Image (nom du fichier):</label>
            <input type="text" id="image" name="image" required><br><br>
            
            <label for="category_id">Catégorie:</label>
            <select id="category_id" name="category_id" required>
                <option value="">Sélectionner une catégorie</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id']; ?>"><?= htmlspecialchars($category['name']); ?></option>
                <?php endforeach; ?>
            </select><br><br>
            
            <button type="submit">Ajouter le produit</button>
        </form>
    </div>

    <!-- Liste des produits -->
    <div class="product-list">
        <h2>Liste des Produits</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']); ?></td>
                        <td><?= htmlspecialchars($product['price']); ?></td>
                        <td><img src="../client/images/<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" width="50"></td>
                        <td><?= htmlspecialchars($product['category_name']); ?></td>
                        <td>
                            <a href="edit_product.php?id=<?= $product['id']; ?>" class="action-btn">Modifier</a>
                            <a href="delete_product.php?id=<?= $product['id']; ?>" class="action-btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer class="footer-logos">
        <a href="index.php" class="logo left-logo-bottom">
        
        </a>
        
    </footer>
</body>
</html>
