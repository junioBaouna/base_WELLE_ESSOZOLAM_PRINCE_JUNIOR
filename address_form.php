<?php
// Démarrage de la session pour récupérer le nombre d'adresses
session_start();


// Vérification de la présence du nombre d'adresses en session
if (!isset($_SESSION['num_addresses'])) {
    
    // Si ça ny est pas,  ça vas nous rediriger vers la page d'accueil
    header("Location: index.php");
    exit();
}

// Récupération du nombre d'adresses depuis la session
$num_addresses = $_SESSION['num_addresses'];

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Adresse Form</title>
</head>



<body>


    <form action="confirmation.php" method="post">';
for ($i = 1; $i <= $num_addresses; $i++) {
    echo "<h2>Adresse $i</h2>";
    // Appel de la fonction pour afficher les champs du formulaire
    displayFormField("street_$i", "Street:", "text", 50, true);

    displayFormField("street_nb_$i", "Street Number:", "number", null, true);

    displaySelectField("type_$i", "Type:", ["livraison", "facturation", "autre"], true);

    displaySelectField("city_$i", "City:", ["Montreal", "Laval", "Toronto", "Quebec"], true);
    
    displayFormField("zipcode_$i", "Zip Code:", "text", 6, true);
}


echo '<button type="submit">Continuer</button>
</form>
</body>
</html>';


// Fonction pour afficher les champs du formulaire
function displayFormField($name, $label, $type, $maxlength, $required) {

    echo "<label for=\"$name\">$label</label>";
    echo "<input type=\"$type\" name=\"$name\" ";

    if ($maxlength !== null) {
        echo "maxlength=\"$maxlength\" ";

    }


    if ($required) {
        echo "required";

    }


    echo ">";

}





// Fonction pour afficher les champs de sélection du formulaire
function displaySelectField($name, $label, $options, $required) {
    echo "<label for=\"$name\">$label</label>";
    echo "<select name=\"$name\" ";
    if ($required) {
        echo "required";
    }
    echo ">";
    foreach ($options as $option) {
        echo "<option value=\"$option\">$option</option>";
    }
    echo "</select>";
}
?>