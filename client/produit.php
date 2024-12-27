<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

// Récupérer les catégories
$categories_query = mysqli_query($conn, "SELECT * FROM `categories`") or die('query failed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link rel="stylesheet" href="css/produit.css">
</head>

<body>
    <header>
        <a href="index.php" class="logo"> <img src="images/logo3.png" class="logo"></a>

        <nav class="navbar">
            <a href="index.php">Principal</a>
            <a href="produit.php" class="active">produit</a>
            <a href="carte.php">Panier</a>
            <a href="contact.php">Contact</a>
            <a href="location.php">Localisation</a>
        </nav>
    </header>

    <div class="main-container">
        <!-- Affichage des produits -->
        <div class="product-display" id="product-display">
            <h2>Produits</h2>
             
            <div id="product-list"></div>
        </div>

        <!-- Liste des boutons de catégorie -->
        <div class="category-buttons">
            <h2>Catégories</h2>
            <?php while ($category = mysqli_fetch_assoc($categories_query)): ?>
                <button onclick="showProducts('<?php echo $category['name']; ?>')">
                    <?php echo $category['name']; ?>
                </button>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
        let lastCategory = null;

        function showProducts(category) {
            lastCategory = category;
            document.getElementById('product-list').innerHTML = '';
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_products.php?category=' + category, true);
            xhr.onload = function () {
                if (this.status == 200) {
                    document.getElementById('product-list').innerHTML = this.responseText;
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>