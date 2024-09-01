<?php
include('config.php');
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if(false === $ext = array_search(
            $finfo->file($_FILES['file']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
            ),
            true
        )) {
        $error = [
            'type' => 'danger',
            'message' => 'Le fichier doit être une image',
            'fatal' => false
        ];
    } else {
        if (!isset($_POST['name'])) {
            $error = [
                'type' => 'danger',
                'message' => 'Veuillez renseigner votre nom et prénom',
                'fatal' => false
            ];
        } elseif (!isset($_POST['email'])) {
            $error = [
                'type' => 'danger',
                'message' => 'Veuillez renseigner une adresse mail',
                'fatal' => false
            ];
        } elseif ($_FILES['file']['size'] < 5000000) {
            $req = $db->prepare('INSERT INTO discounts (name, email, proof) VALUES (:name, :email, :file)');
            $req->execute(array(
                'name' => htmlspecialchars($_POST['name']),
                'email' => htmlspecialchars($_POST['email']),
                'file' => file_get_contents($_FILES['file']['tmp_name']),
            ));
            $error = [
                'type' => 'success',
                'message' => 'Votre demande a bien été envoyée',
                'fatal' => true
            ];

        } else {
            $error = [
                'type' => 'danger',
                'message' => 'Le fichier est trop volumineux',
                'fatal' => false
            ];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Eloquéncia est une association loi 1901 visant à promouvoir l'éloquence et l'art oratoire">
    <meta name="keywords" content="éloquence, oratoire, association, loi 1901, parler en public, discours, formation, cours en ligne">
    <meta name="author" content="Eloquéncia">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="language" content="fr">
    <meta property="og:site_name" content="Eloquéncia">
    <meta property="og:site" content="https://eloquencia.org">
    <meta property="og:title" content="Réduction">
    <meta property="og:description" content="Eloquéncia est une association loi 1901 visant à promouvoir l'éloquence et l'art oratoire">
    <title>Réduction - Eloquéncia</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./">
            <img src="assets/eloquencia_round.png" alt="Logo" width="64" height="64" class="d-inline-block">
            Eloquéncia
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link" href="./">Accueil</a>
                <a class="nav-link" href="./#about">À propos</a>
                <a class="nav-link" href="./#contact">Contact</a>
                <a class="nav-link" href="discount">Réduction</a>
                <a class="nav-link" href="#">Connexion</a>
            </div>
        </div>
    </div>
</nav>
<header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 text-center">Eloquéncia</h1>
                <p class="lead text-center">La plateforme de cours en ligne pour apprendre à parler en public</p>
            </div>
        </div>
    </div>
</header>

<hr class="my-4">
<div id="contact" class="container">
    <?php if(isset($error) && $error['fatal']) { ?>
        <div class="alert alert-<?= $error['type'] ?> text-center" role="alert">
            <?= $error['message'] ?>
        </div>
    <?php } else {?>
    <div class="card">
        <div class="card-body">
            <h2 class="display-4 text-center">Demander une réduction</h2>
            <p class="lead text-center">Vous êtes un(e) étudiant(e) ou âgé(e) de moins de 18 ans ? Demandez une réduction sur votre adhésion à l'association !</p>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom et prénom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Justificatif d'identité ou certificat de scolarité</label>
                    <input type="file" class="form-control" id="file" name="file" required accept="image/png, image/jpeg" alt="">
                    <p class="text-muted">Le fichier doit être au format PNG ou JPEG et ne doit pas dépasser 5 Mo</p>
                </div>
                <p class="text-muted">En soumettant ce formulaire, vous acceptez que vos données soient utilisées pour traiter votre demande de réduction. Une fois la demande traitée, vos données seront supprimées.</p>
                <button type="submit" class="btn btn-success" name="submit">Envoyer</button>
            </form>
        </div>
    </div>
    <?php } ?>
</div>
<hr class="my-4">
<!-- Footer -->
<footer class="bg-body-tertiary text-center text-lg-start footer fixed-bottom">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024 Eloquéncia | Fait avec ❤️ et hébergé en France
    </div>
</footer>
</body>
</html>