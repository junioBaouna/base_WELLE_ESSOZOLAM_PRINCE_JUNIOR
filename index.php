<?php
// Démarrage de la session pour suivre l'état de l'utilisateur
session_start();

// Vérification de la méthode de la requête
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si la requête est POST, l'utilisateur a soumis le formulaire
    handleNumAddresses();
} else {
    // Sinon, affiche le formulaire pour saisir le nombre d'adresses
    displayNumAddressesForm();
}




// Fonction pour afficher le formulaire de saisie du nombre d'adresses
function displayNumAddressesForm() {
    echo '<!DOCTYPE html>
    <html>
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Adresse Form</title>
    </head>
    <body>
    <center><h1> bonjour à vous  vous assistez ici a mon tp junior start</h1></center>
    
        <form action="index.php" method="post">
            <label for="num_addresses">Combien d\'adresses voulez vous inserer ?</label>
            <input type="number" name="num_addresses" required>
            <button type="submit">Continuer</button>
        </form>
    </body>
    </html>';
}

// Fonction pour traiter le nombre d'adresses saisi par l'utilisateur
function handleNumAddresses() {
    // Récupération du nombre d'adresses depuis la requête POST
    $num_addresses = isset($_POST['num_addresses']) ? (int)$_POST['num_addresses'] : 0;

    // Stockage du nombre d'adresses en session
    $_SESSION['num_addresses'] = $num_addresses;

    // Redirection vers le formulaire d'adresses
    header("Location: address_form.php");
    exit();
}
?>






