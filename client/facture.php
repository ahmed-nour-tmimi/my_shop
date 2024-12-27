<?php
require_once('FPDF-master/fpdf.php');
session_start();

// Vérifier si le panier existe
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die('Votre panier est vide.');
}
$date = date('d-m-Y');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 35);
$pdf->SetTextColor(255, 145, 77);

$pdf->Image('images/logo4.png', 170, 10, 25); 

$pdf->SetXY(50, 10); // Positionner à 50 mm du côté gauche pour laisser de la place au logo
$pdf->Cell(0, 10, '-Facture-', 0, 1, 'L'); // Titre de la facture aligné à gauche
$pdf->Ln(20);

// Ajouter les informations de l'entreprise
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(0, 5, "MyShop - Vente de produits technologiques", 0, 1, 'L');
$pdf->Cell(0, 5, "Adresse : Avenue de la Technologie, Tunis", 0, 1, 'L');
$pdf->Cell(0, 5, "Telephone : +216 23 557 166", 0, 1, 'L');
$pdf->Cell(0, 5, "Email : my_shop1@gmail.com", 0, 1, 'L');
$pdf->Ln(10);

// Infos acheteur et date
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Date de la commande : ' . $date, 0, 1, 'R');
$pdf->Ln(5);

// Tableau des produits
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(230, 230, 230);
$pdf->Cell(90, 10, 'Nom du Produit', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Prix (DT)', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Quantite', 1, 0, 'C', true);
$pdf->Cell(45, 10, 'Total (DT)', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 12);
$total_price = 0;

foreach ($_SESSION['cart'] as $item) {
    $total_item_price = (float)$item['price'] * $item['quantity'];
    $total_price += $total_item_price;

    $pdf->Cell(90, 10, $item['name'], 1);
    $pdf->Cell(30, 10, number_format($item['price'], 2), 1, 0, 'R');
    $pdf->Cell(25, 10, $item['quantity'], 1, 0, 'C');
    $pdf->Cell(45, 10, number_format($total_item_price, 2), 1, 1, 'R');
}

// Total général
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(240, 240, 240); // Couleur de fond pour le total
$pdf->Cell(145, 10, 'Total de la commande :', 1, 0, 'R', true);
$pdf->Cell(45, 10, 'DT ' . number_format($total_price, 2), 1, 1, 'R', true);
$pdf->Ln(10);

// Message de succès de paiement
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetTextColor(0, 102, 0);  // Couleur verte pour indiquer la réussite
$pdf->Cell(0, 10, 'Votre paiement a ete effectue avec succes !', 0, 1, 'C'); // Message de succès
$pdf->Ln(10);

// Remerciements (alignés à gauche)
$pdf->SetFont('Arial', 'I', 12);
$pdf->SetTextColor(100, 100, 100);
$pdf->MultiCell(0, 10, "Merci d'avoir choisi MyShop ! Nous esperons vous revoir bientot.\nPour toute question, veuillez nous contacter.", 0, 'L');

// Pied de page
$pdf->SetY(-5); // Positionner en bas de la page
$pdf->SetFont('Arial', 'I', 10);
$pdf->SetTextColor(150, 150, 150);
$pdf->Cell(0, 10, 'MyShop - Facture generee automatiquement', 0, 0, 'C');

// Afficher le PDF
$pdf->Output('facture.pdf', 'I');
?>
