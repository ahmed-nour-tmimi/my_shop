<?php
include 'config.php'; 
session_start(); 

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    $query = "SELECT name FROM admin WHERE id = '$admin_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $admin_name = $row['name']; 
    } else {
        // Si aucun administrateur n'est trouvé
        $admin_name = "Administrateur non trouvé";
    }
} else {
    // Rediriger l'utilisateur si la session n'est pas active
    header('Location: login_admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
</head>

<body>

    <!-- Header -->
    <header>
        <div class="logosec">
        <div class="title">
            <i class="fas fa-user-shield"></i> Admin : <span><?php echo htmlspecialchars($admin_name); ?></span>
        </div>
        </div>

        <a href="index.php" class="logo right-logo">
            <img src="images/logo3.png" alt="Logo Right">
        </a>
         
    </header>
    <!-- Main content area -->
 


    <!-- Main container -->
    <!-- Main container -->
<div class="main-container">
    <!-- Navigation -->
    <div class="navcontainer">
        <nav class="nav">
            <div class="nav-upper-options">
                <!-- <div class="nav-option option1" id="ds">
                    <i class="fas fa-tachometer-alt"></i>
                    <h3> Dashboard </h3>
                </div> -->

                <div class="nav-option option2" id="ordre">
                    <i class="fas fa-file-alt"></i>
                    <h3> Ordres </h3>
                </div>
                <div class="nav-option option6" id="Carte_B">
                    <i class="fas fa-credit-card"></i>
                    <h3> Carte Bancaire </h3>
                </div>

                <!-- Produit avec menu déroulant -->
                <div class="nav-option option3" id="Produits">
                    <i class="fas fa-box"></i>
                    <h3> <a href="produits.php">Produits</a></h3>
                    <!-- <ul class="submenu">
                        <li><a href="smartphone.php">Smartphone</a></li>
                        <li><a href="tablette.php" >Tablette tactile</a></li>
                        <li><a href="ordinateur.php">Ordinateur</a></li>
                        <li><a href="#" >Vidéo projecteurs</a></li>
                        <li><a href="#"  >Téléviseurs</a></li>
                        <li><a href="#">Appareils Photos</a></li>
                        <li><a href="#"  >SON</a></li>
                        <li><a href="#"  >Climatisation</a></li>
                        <li><a href="#"  >SmartWatch</a></li>
                        <li><a href="#"  >Imprimantes</a></li>
                    </ul> -->
                </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


                

                <div class="nav-option logout" id="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <h3> Logout </h3>
                </div>
            </div>
        </nav>
    </div>

    <!-- Main content area -->
    <div class="box-container" id="main-content">
        <!-- Le contenu des autres pages (articles.php, report.php, etc.) se chargera ici -->
    </div>
</div>

        <!-- Main content area -->
        <div class="box-container" id="main-content">
            <!-- Le contenu des autres pages (articles.php, report.php, etc.) se chargera ici -->
        </div>
    </div>
</div>
<script src="js/index.js">
  

</script>


</body>
</html>
