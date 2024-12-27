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
$sql = "SELECT * FROM cartes_bancaires";
$result = $conn->query($sql);
 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des commandes</title>
    <!-- Lien vers Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style/carteB.css"> 
</head>
<body>
     
    <table>
        <thead>
        <tr>
            <th>Card_Name <i class="fas fa-credit-card"></i></th>
            <th>Card_Number <i class="fas fa-credit-card"></i></th>
            <th>Expiry_date <i class="fas fa-calendar-alt"></i></th>
            <th>CVV <i class="fas fa-shield-alt"></i></th>
            <th>created_at <i class="fas fa-clock"></i></th>
        </tr>
        </thead>
        <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                // Afficher chaque ligne du résultat
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['card_name'] . "</td>";
                    echo "<td>" . $row['card_number'] . "</td>";
                    echo "<td>" . $row['expiry_date'] . "</td>";
                    echo "<td>" . $row['cvv'] . "</td>";
                    echo "<td>" . $row['created_at'] . "  </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Aucune commande trouvée.</td></tr>";
            }
            ?>
        </tbody>
    </table>

     
    
  </body>
</html>
<?php
// Fermeture de la connexion
$conn->close();
?>
