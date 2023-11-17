<!-- validate_addresses.php -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num_addresses = isset($_POST['num_addresses']) ? (int)$_POST['num_addresses'] :0;

    // Affichage des adresses pour validation
    echo '<h2>Adresses saisies :</h2>';
    for ($i = 1; $i <= $num_addresses; $i++) {
        echo "<p>";
        echo "<strong>Adresse $i:</strong><br>";
        echo "Street: " . $POST['street' . $i] . "<br>";
        echo "Street Number: " . $POST['street_nb' . $i] . "<br>";
        echo "Type: " . $POST['type' . $i] . "<br>";
        echo "City: " . $POST['city' . $i] . "<br>";
        echo "Zip Code: " . $POST['zipcode' . $i] . "<br>";
        echo "</p>";
    }
    
    // Formulaire pour confirmer ou modifier les adresses
    echo '<form action="process_validation.php" method="post">';
    echo '<button type="submit" name="confirmation" value="yes">Les adresses sont correctes</button>';
    echo '<button type="submit" name="confirmation" value="no">Modifier les adresses</button>';
    echo '</form>';} else {
        // Si la méthode de requête n’est pas POST, redirige vers la page d’accueil
        header("Location: index.php");
        exit();
        }
        ?>