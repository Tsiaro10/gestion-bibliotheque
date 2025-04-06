<?php
session_start();
if(!isset($_SESSION["ide"])) {
  header("Location: inscription.php");
  exit; // Assure que le script s'arrête après la redirection
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'emprunt</title>
    <link rel="stylesheet" href="chemin_vers_votre_css/style.css">
</head>
<body>
    <div class="container">
        <h2>Confirmation d'emprunt</h2>
        <p>Merci d'avoir emprunté ce livre. Vous pouvez maintenant le consulter.</p>
        <a href="page_principale.php" class="btn btn-primary">Retour à la page principale</a>
    </div>
</body>
</html>
