<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop - Votre Panier</title>
    <link rel="stylesheet" href="css/carte.css">
</head>

<header>
    <a href="index.php" class="logo"> <img src="images/logo3.png" class="logo"></a>
    <nav class="navbar">
        <a href="index.php">Principal</a>&nbsp;
        <a href="produit.php">produit</a>
        <a href="carte.php" class="active">Panier</a>
        <a href="contact.php">Contact </a>

        <a href="location.php">localisation</a>
    </nav>


</header><br><br><br>

<body>




    <?php
    include 'config.php';
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('location: login.php'); // Redirige vers la page de connexion
        exit();
    }



    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $quantity = max(1, intval($_POST['quantity']));

        $_SESSION['cart'][] = [
            'product_id' => $product_id,
            'user_id' => $user_id,
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'quantity' => $quantity,
        ];

        header('location: carte.php');
        exit();
    }


    // Mettre à jour la quantité ou supprimer le produit
    if (isset($_POST['update_cart'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['product_id'] == $_POST['product_id']) {
                // Vérifier que la quantité est définie et est un entier positif
                $new_quantity = max(1, intval($_POST['quantity']));
                $item['quantity'] = $new_quantity;

                // Mettre à jour la quantité dans la base de données
    
                mysqli_query($conn, "UPDATE `cart` SET quantity = '$new_quantity' WHERE user_id = '{$item['user_id']}' AND product_id = '{$item['product_id']}'") or die('Query failed: ' . mysqli_error($conn));
                break;
            }
        }
    }

    if (isset($_POST['remove_item'])) {
        //echo json_encode($_SESSION['cart'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['product_id'] == $_POST['product_id']) {
                unset($_SESSION['cart'][$key]);

                // Supprimer le produit de la base de données
                //$user_id = $item['user_id'];user_id = '$user_id' AND // Remplacez par l'ID de l'utilisateur connecté
                mysqli_query($conn, "DELETE FROM `cart` WHERE  product_id = '{$item['product_id']}' AND user_id = '{$item['user_id']}' ") or die('Query failed: ' . mysqli_error($conn));
                break;
            }
        }
    }

    // Affichage du panier sous forme de tableau
    echo '<h1>Votre Panier</h1>';
    if (!empty($_SESSION['cart'])) {
        $total_price = 0;
        echo '<table border="1">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Image</th>';
        echo '<th>Nom</th>';
        echo '<th>Prix</th>';
        echo '<th>Quantité</th>';
        echo '<th>Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($_SESSION['cart'] as $item) {
            $total_item_price = (float) $item['price'] * $item['quantity'];
            $total_price += $total_item_price;

            echo '<tr>';
            echo '<td><img src="images/' . $item['image'] . '" alt="" width="100"></td>';
            echo '<td>' . htmlspecialchars($item['name']) . '</td>';
            echo '<td> ' . number_format((float) $item['price'], 2) . 'DT</td>';
            echo '<td>';
            echo '<form method="POST" action="">';
            echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($item['product_id']) . '">';
            echo '<input type="number" name="quantity" value="' . $item['quantity'] . '" min="1" required>';
            echo '<button type="submit" name="update_cart">Mettre à jour</button>';
            echo '</form>';
            echo '</td>';
            echo '<td>';
            echo '<form method="POST" action="">';
            echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($item['product_id']) . '">';
            echo '<button type="submit" name="remove_item">Supprimer</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '<div class="cart-total">';
        echo '<h2>Total de la commande : ' . number_format((float) $total_price, 2) . ' DT</h2> &nbsp;&nbsp;&nbsp;&nbsp;';

        echo '<form action="paiement.php" method="POST">';
        echo '<button type="submit" class="btn-paiement">Payer</button>';
        echo '</form> <br><br>';

        echo '</div>';

        echo '</div>';
    } else {
        echo '<p>Votre panier est vide.</p>';
    }

    echo '<div> <h1></h1></div>';
    // Enregistrer le panier dans la base de données
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            // Vérifier si le produit existe déjà dans le panier
            $check_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '{$item['user_id']}' AND product_id = '{$item['product_id']}'") or die('Query failed: ' . mysqli_error($conn));

            if (mysqli_num_rows($check_cart) > 0) {
                // Mettre à jour la quantité si le produit existe déjà
                mysqli_query($conn, "UPDATE `cart` SET quantity =  {$item['quantity']} WHERE user_id = '{$item['user_id']}' AND product_id = '{$item['product_id']}'") or die('Query failed: ' . mysqli_error($conn));
            } else {
                // Ajouter le produit au panier
                mysqli_query($conn, "INSERT INTO `cart` (user_id, product_id, name, price, image, quantity) 
                    VALUES ('{$item['user_id']}', '{$item['product_id']}', '{$item['name']}', '{$item['price']}', '{$item['image']}', '{$item['quantity']}')") or die('Query failed: ' . mysqli_error($conn));
            }
        }
    }






    ?>

</body>

</html>