document.addEventListener("DOMContentLoaded", function() {
    // Fonction pour charger dynamiquement le contenu de chaque page
    function loadContent(page) {
        fetch(page)
            .then(response => response.text())
            .then(data => {
                // Charge le contenu dans #main-content
                document.getElementById('main-content').innerHTML = data;
            })
            .catch(error => console.error('Erreur lors du chargement de la page :', error));
    }

    // Charger la page "Ordres"
    let ordre = document.getElementById('ordre');
    if (ordre) {
        ordre.addEventListener('click', function() {
            console.log("Chargement d'ordres.php");
            loadContent('ordre.php');
        });
    }
    
    let carteB = document.getElementById('Carte_B');
    if (carteB) {
        carteB.addEventListener('click', function() {
            console.log("Chargement de carteB.php");
            loadContent('carteB.php');
        });
    }
    

    

    /*let tabletteLink = document.getElementById('tabletteLink');
    if (tabletteLink) {
        tabletteLink.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche la page de se recharger
            console.log("Chargement de tablette.php");
            loadContent('tablette.php');  // Redirection vers tablette.php
        });
    }

    
*/
    // Gérer la déconnexion
    let logout = document.getElementById('logout');
    if (logout) {
        logout.addEventListener('click', function() {
            console.log("Redirection vers login_admin.php");
            window.location.href = 'login_admin.php';  // Redirection vers la page de déconnexion
        });
    }
});






