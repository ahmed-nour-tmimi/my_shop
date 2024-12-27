<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-fz53t/nv1NlIsL8knsvR7b6vTTmG3QkpiW5LDIcJw8tiZutjrm1tY6IvETnAd8CC" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/index1.css">

</head>
<body>
    
<header>
        <a href="index.php" class="logo"> <img src="images/logo3.png"  class="logo"></a>
         <nav class="navbar"> 
             <a href="index.php" class="active">Principal</a>&nbsp;
             <a href="produit.php">produit</a>
             <a href="carte.php"  >Panier</a>
             <a href="contact.php">Contact </a>
             <a href="location.php"  >localisation</a>
         </nav>
          
     </header><br><br><br>

     <div class="home" id="home">     
        <div class="swiper home-slider">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide slide slide1">
                    <div class="content">
                       <!--<img src="logo.png" class="logo1">-->
                        <h3><span class="shop2">Tech</span> facile, <br>futur entre vos mains.</h3>
                        
                        <p><span class="shop">MyShop</span> – Simplifiez votre vie avec les meilleures <br> technologies du moment !
                            </p>
                        <img src="images/image.png">
                        <a href="produit.php" class="btn_Home">order now</a>
                        
                         
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br> 


    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="images/f1 (1).png" alt="">
            <h6>Livraison gratuite</h6>
        </div>
        <div class="fe-box">
            <img src="images/f2.png" alt="">
            <h6>Commande en ligne</h6>
        </div>
        <div class="fe-box">
            <img src="images/f3.png" alt="">
            <h6>Économisez de l'argent</h6>
        </div>
         
        <div class="fe-box">
            <img src="images/f5.png" alt="">
            <h6>Bonne vente</h6>
        </div>
        <div class="fe-box">
            <img src="images/f6.png" alt="">
            <h6>Assistance F24/7</h6>
        </div>
        

    </section>

      <br><br><br>
    <section id="product1" class="section-p1"> 
        <h2><span class="pros">----</span>Pr<span class="pros">od</span>ui<span class="pros">ts</span> ph<span class="pros">ar</span>es<span class="pros">----</span></h2>
        <p>  Parmi les technologies les plus avancées et les appareils les plus performants</p>
        <div class="pro-container">
            <div class="pro">
                <img src="images/tel4.jpg" >
                <div class="des">
                    <span>APPLE</span>
                    <h5>Smartphone Apple iPhone 15 </h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                         
                    </div>
                    <h4>4050Dt</h4>
                </div>
                 

            </div>
            <div class="pro">
                <img src="images/product-2.jpg" >
                <div class="des">
                    <span>Colmi</span>
                    <h5>Montre Connectée COLMI P81 / Gris</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>120Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/product-3.jpg" >
                <div class="des">
                    <span>Canon</span>
                    <h5>Appareil Photo Reflex Canon EOS 2000D</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>2199Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/product-4.jpg" >
                <div class="des">
                    <span>KAKU</span>
                    <h5>Haut-parleur portable sans fil </h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>70Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/product-5.jpg" >
                <div class="des">
                    <span>JeDel</span>
                    <h5>Micro Casque</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>88Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/product-6.jpg" >
                <div class="des">
                    <span>Hisense</span>
                    <h5>Téléviseur HISENSE</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>1250Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/tel1.jpg" >
                <div class="des">
                    <span>infinix</span>
                    <h5>Smartphone infinix Pro /bleu </h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>400Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/tel2.jpg " >
                <div class="des">
                     <span>infinix</span>
                    <h5>Smartphone infinix not 30 /green </h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>700Dt</h4>
                </div>
 
            </div>
        </div>

    </section>
    <br><br><br>
    <section id="banner" class="section-m1">
        <h4>Service de réparation</h4>
        <h2>Jusqu'à <span>70 off</span>  - Téléviseur & Récepteur </h2>
        <button class="normal">Explorer plus</button>


    </section>
    <br><br><br>

    <section id="product1" class="section-p1"> 
        <h2> <span class="pros">----</span>No<span class="pros">uv</span>elle Arr<span class="pros">iv</span>ée<span class="pros">----</sapn></h2>
        <p>  Nouveaux Téléviseurs & Récepteur / Abonnement</p>
        <div class="pro-container">
            <div class="pro">
                <img src="images/tv1.jpg" >
                <div class="des">
                    <span>Toshiba</span>
                    <h5>TV TOSHIBA 32" Fire </h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                         
                    </div>
                    <h4>659Dt</h4>
                </div>
                 

            </div>
            <div class="pro">
                <img src="images/tv2.jpg" >
                <div class="des">
                    <span>biolux</span>
                    <h5>TV BIOLUX 40'' ECO40R Full HD</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>700Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/tv3.jpg" >
                <div class="des">
                    <span>Sony</span>
                    <h5>TV Sony Bravia LED HD 32</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>736Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/tv4.jpg" >
                <div class="des">
                    <span>TELEFUNKEN</span>
                    <h5>TV Telefunken D6 43" Full HD</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>900Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/rec1.jpg" >
                <div class="des">
                    <span>Récepteur</span>
                    <h5>Récepteur ALPHASAT-4K</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>266Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/rec2.jpg" >
                <div class="des">
                    <span>WAKA</span>
                    <h5>Box Android Waka Box WB700</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>258Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/rec3.jpg" >
                <div class="des">
                    <span>Xiaomi</span>
                    <h5>MI TV Stick Android Full HD </h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>86Dt</h4>
                </div>
 
            </div>
            <div class="pro">
                <img src="images/rec4.jpg " >
                <div class="des">
                     <span>JOYSAT</span>
                    <h5>Récepteur JOYSAT SJ-3010HD </h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>122Dt</h4>
                </div>
 
            </div>
        </div>
      </section>



      <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
      ?>
      
    <br><br><br>
    
      <section id="newsletter" class="section-p1 section-m1"> 
        <div class="newstext">
           <h3 class="wl">&nbsp;<span style="color:#ff914d;">--MyShop--</span> vous souhaite la bienvenue</h3>
        <h4 style="margin-left: 120px;">--Votre compte Mrs <span class="us"><?php echo $fetch_user['name']; ?></span></h4>
            <p style="margin-left: 120px;">--username : <span><?php echo $fetch_user['name']; ?></span> </p>
            <p style="margin-left: 120px;">--email : <span><?php echo $fetch_user['email']; ?></span> </p>
        </div>
        <div class="form" style="margin-right: 80px;">
        <a href="login.php" class="btn" >login</a>
         <a href="register.php" class="option-btn">register</a>
         <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
             
        </div>

    </section>
    <br><br><br>
    
    <footer class="section-p1">
        <div class="col">
            <img src="images/logo4.png" alt="" class="logo" style="margin-left: 10px;">

            <h4 style="margin-left: 10px;">Contact</h4>
            <p style="margin-left: 10px;"><strong> Adresse :</strong> 12 Rue Montfleury</p>
            <p style="margin-left: 10px;"><strong>Téléphone :</strong> (+216) 23 557 166</p>
            <p style="margin-left: 10px;"><strong> Heures :</strong> 8:00-17:00 ,Mon-Stat</p>
            <div class="follow">
                <h4 style="margin-left: 10px;">Suivez-nous</h4>
                <div class="icon" style="margin-left: 10px;">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>           
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">À propos</a>
             
            <a href="#">Politique de confidentialité</a>
            <a href="#">Conditions générales</a>
            <a href="contact.php">Contactez-nous</a>
        </div>
        <div class="col">
            <h4>Mon compte"</h4>
            <a href="login.php">Connexion</a>
            <a href="carte.php">Voir le panier</a>
            <a href="#">Ma liste de souhaits</a>
            <a href="#">Suivre ma commande</a>
            <a href="#"> Aide</a>
        </div>
        <div class="col install">
            <h4>Installer l'application</h4>
            <p>Depuis l'App Store ou Google Play</p>
            <div class="row" style="margin-right: 10px;">
                <img src="images/app.jpg">
                <img src="images/play.jpg">
                
            </div>
            <p>Passerelles de paiement sécurisées</p>
            <img src="images/pay.png">
        </div>
      

    </footer>
</body>
</html>