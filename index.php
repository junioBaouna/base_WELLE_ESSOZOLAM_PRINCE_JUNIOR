<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Accueil</title>
</head>
<body>
    <!--<h1>Bienvenue sur mon site de commerce électronique</h1>
    <p>Vous pouvez commencer en ajoutant vos adresses.</p>
    <a href="/address_form.php">Ajouter des adresses</a>-->
    <form action="address_form.php" method="post">
        <label for="num_addresses">veuillez saisir le nombre d'adresses ?</label>
        <input type="number" name="num_addresses" required>
        <button type="submit">Continuer</button>
    </form>
    </form>
    
</body>
</html>