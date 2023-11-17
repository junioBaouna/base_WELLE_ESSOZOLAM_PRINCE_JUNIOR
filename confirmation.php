<!-- confirmation.php -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $addresses = [];

    // Assurez-vous de remplacer les valeurs de connexion avec les vôtres
    $conn = mysqli_connect("localhost", "root", "", "ecom1_tp2");

    // Vérification de la connexion
    if (!$conn) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }

    // Préparation de la requête pour l'insertion
    $stmt = mysqli_prepare($conn, "INSERT INTO address (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");

    // Vérification de la préparation de la requête
    if (!$stmt) {
        die("Erreur de préparation de la requête : " . mysqli_error($conn));
    }

    // Liaison des paramètres
    mysqli_stmt_bind_param($stmt, "sisss", $street, $street_nb, $type, $city, $zipcode);

    // Boucle pour récupérer et afficher les adresses
    for ($i = 1; $i <= $_POST['num_addresses']; $i++) {
        $street = $POST['street_' . $i];
        $street_nb = $POST['street_nb_' . $i];
        $type = $POST['type_' . $i];
        $city = $POST['city_' . $i];
        $zipcode = $POST['zipcode_' . $i];

        // Exécution de la requête préparée
        if (!mysqli_stmt_execute($stmt)) {
            echo "Erreur lors de l'insertion dans la base de données : " . mysqli_stmt_error($stmt);
        }

        $addresses[] = [
            'street' => $street,
            'street_nb' => $street_nb,
            'type' => $type,
            'city' => $city,
            'zipcode' => $zipcode,
        ];

        // Affichage des données
        echo "<p>";
        foreach ($addresses[$i - 1] as $key => $value) {
            echo "<strong>$key:</strong> $value | ";
        }
        echo "</p>";
    }

    // Ajoutez un bouton de validation
    echo '<form action="validate_addresses.php" method="post">';
    echo '<input type="hidden" name="num_addresses" value="' . $_POST['num_addresses'] . '">';
    echo '<button type="submit">Valider les adresses</button></form>';

    // Fermeture de la connexion à la base de données
    mysqli_close($conn);
} else {
    // Si la méthode de requête n'est pas POST, ça redirige vers la base de donné
    header("Location: index.php");
    exit();
}
?>