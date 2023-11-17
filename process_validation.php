<!-- process_validation.php -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération de la décision de l'utilisateur (yes ou no)
    $confirmation = isset($_POST['confirmation']) ? $_POST['confirmation'] : '';

    if ($confirmation === 'yes') {
        // Redirection vers la page de remerciement si les adresses sont correctes
        header("Location: thank_you.php");
        exit();
    } elseif ($confirmation === 'no') {
        // Redirection vers la page d'édition si les adresses doivent être modifiées
        header("Location: address_form.php");
        exit();
    } else {
        // En cas de décision invalide, redirige vers la page d'accueil
        header("Location: index.php");
        exit();
    }
} else {
    // Si la méthode de requête n'est pas POST, redirige vers la page d'accueil
    header("Location: index.php");
    exit();
}
?>