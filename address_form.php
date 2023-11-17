<!-- address_form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Adresse Form</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération du nombre d'adresses à saisir
        $num_addresses = isset($_POST['num_addresses']) ? (int)$_POST['num_addresses'] : 0;

        // Affichage du formulaire pour chaque adresse
        echo '<form action="confirmation.php" method="post">';
        for ($i = 1; $i <= $num_addresses; $i++) {
            echo "<h2>Adresse $i</h2>";
            echo '<label for="street_' . $i . '">Street:</label><input type="text" name="street_' . $i . '" maxlength="50" required>';
            echo '<label for="street_nb_' . $i . '">Street Number:</label><input type="number" name="street_nb_' . $i . '" required>';
            echo '<label for="type_' . $i . '">Type:</label><select name="type_' . $i . '"><option value="livraison">Livraison</option><option value="facturation">Facturation</option><option value="autre">Autre</option></select>';
            echo '<label for="city_' . $i . '">City:</label><select name="city_' . $i . '"><option value="Montreal">Montreal</option><option value="Laval">Laval</option><option value="Toronto">Toronto</option><option value="Quebec">Quebec</option></select>';
            echo '<label for="zipcode_' . $i . '">Zip Code:</label><input type="text" name="zipcode_' . $i . '" maxlength="6" required>';
        }
        echo '<button type="submit">Continuer</button></form>';
    } else {
        // Si la méthode de requête n'est pas POST, redirige vers la page d'accueil
        header("Location: index.php");
        exit();
    }
    ?>
</body>
</html>