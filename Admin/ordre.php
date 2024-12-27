<?php
// Configuration de la connexion à la base de données
$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'shop_db';

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête pour récupérer les données du tableau `cart`
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);
// Statistiques
$totalOrders = $conn->query("SELECT COUNT(*) AS total FROM cart")->fetch_assoc()['total'];
$totalSales = $conn->query("SELECT SUM(price) AS total_sales FROM cart")->fetch_assoc()['total_sales'];
$totalProducts = $conn->query("SELECT SUM(quantity) AS total_products FROM cart")->fetch_assoc()['total_products'];
$topCustomer = $conn->query("
    SELECT user_id, COUNT(*) AS orders_count 
    FROM cart 
    GROUP BY user_id 
    ORDER BY orders_count DESC 
    LIMIT 1
")->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des commandes</title>
    <!-- Lien vers Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style/ordre.css"> 
</head>
<body>
     
    <table>
        <thead>
            <tr>
                <th>ID <i class="fas fa-id-card-alt"></i></th>
                <th>ID Utilisateur <i class="fas fa-user"></i></th>
                <th>Nom du Produit <i class="fas fa-cogs"></i></th>
                <th>Quantité <i class="fas fa-sort-numeric-up"></i></th>
                <th>Prix Total <i class="fas fa-dollar-sign"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                // Afficher chaque ligne du résultat
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['price'] . " TND</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Aucune commande trouvée.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="stats-container">
    <div class="stat-card">
        <h3>Total des Commandes</h3>
        <p><?php echo $totalOrders; ?></p>
    </div>
    <div class="stat-card">
        <h3>Total des Ventes</h3>
        <p><?php echo $totalSales; ?> TND</p>
    </div>
    <div class="stat-card">
        <h3>Total des Produits</h3>
        <p><?php echo $totalProducts; ?></p>
    </div>
    <div class="stat-card">
        <h3>Meilleur Client</h3>
        <p>Client ID : <?php echo $topCustomer['user_id']; ?></p>
        <small><?php echo $topCustomer['orders_count']; ?> commandes</small>
    </div>
</div>

    
  </body>
</html>
<?php
// Fermeture de la connexion
$conn->close();
?>
