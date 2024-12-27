<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link rel="stylesheet" href="css/carte.css">
</head>
<body>
<?php
include 'config.php';
session_start();

if (isset($_GET['category'])) {
    $category_name = mysqli_real_escape_string($conn, $_GET['category']);
    
    // Get the category ID from the categories table
    $category_query = mysqli_query($conn, "SELECT id FROM `categories` WHERE name = '$category_name'") or die('Category query failed');
    
    if (mysqli_num_rows($category_query) > 0) {
        $category_data = mysqli_fetch_assoc($category_query);
        $category_id = $category_data['id'];

        // Fetch products from the products table for the given category
        $products_query = mysqli_query($conn, "SELECT * FROM `products` WHERE category_id = $category_id") or die('Products query failed');

        if (mysqli_num_rows($products_query) > 0) {
            while ($product = mysqli_fetch_assoc($products_query)) {
                echo '<div class="product-box">
                        <img src="images/' . htmlspecialchars($product['image'], ENT_QUOTES) . '" alt="">
                        <div class="product-name">' . htmlspecialchars($product['name'], ENT_QUOTES) . '</div>
                        <div class="product-price">' . htmlspecialchars($product['price'], ENT_QUOTES) . ' DT</div>
                        <form action="carte.php" method="POST">
                            <input type="hidden" name="product_id" value="' . htmlspecialchars($product['id'], ENT_QUOTES) . '">
                            <input type="hidden" name="product_name" value="' . htmlspecialchars($product['name'], ENT_QUOTES) . '">
                            <input type="hidden" name="product_price" value="' . htmlspecialchars($product['price'], ENT_QUOTES) . '">
                            <input type="hidden" name="product_image" value="' . htmlspecialchars($product['image'], ENT_QUOTES) . '">
                            <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
                        </form>
                      </div>';
            }
        } else {
            echo '<p>Aucun produit trouvé dans cette catégorie.</p>';
        }
    } else {
        echo '<p>Catégorie invalide.</p>';
    }
} else {
    echo '<p>Catégorie invalide.</p>';
}
?>
</body>
</html>
