<?php
// Démarrage de la session pour récupérer les données d'adresses
session_start();

// Vérification de la présence du nombre d'adresses en session
if (!isset($_SESSION['num_addresses'])) {
    // Si non présent, redirige vers la page d'accueil
    header("Location: index.php");
    exit();
}

// Récupération du nombre d'adresses depuis la session
$num_addresses = $_SESSION['num_addresses'];
$addresses = [];

// Récupération des données du formulaire POST
for ($i = 1; $i <= $num_addresses; $i++) {
    $addresses[] = [
        'street' => $POST['street' . $i],
        'street_nb' => $POST['street_nb' . $i],
        'type' => $POST['type' . $i],
        'city' => $POST['city' . $i],
        'zipcode' => $POST['zipcode' . $i],
    ];
}

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Confirmation</title>
</head>
<body>
    <h2>Adresses saisies :</h2>';
foreach ($addresses as $address) {
    echo "<p>";
    foreach ($address as $key => $value) {
        echo "<strong>$key:</strong> $value | ";
    }
    echo "</p>";
}
echo '</body>
</html>';

// Enregistrez les données en base de données ici

// Effacez la session
session_unset();
session_destroy();
?>