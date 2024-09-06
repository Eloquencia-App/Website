<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('config.php');
session_start();


if (isset($_POST['submit'])) {
    $password = htmlspecialchars($_POST['password']);
    $passwordConfirmation = htmlspecialchars($_POST['passwordConfirmation']);
    if ($password == $passwordConfirmation) {
        $req = $db->prepare('UPDATE members SET password = :password WHERE ID = :id');
        $req->execute(array(
            'password' => hash('sha256', htmlspecialchars($password)),
            'id' => htmlspecialchars($_POST['id'])
        ));
        $req = $db->prepare('UPDATE members SET registrationToken = NULL WHERE ID = :id');
        $req->execute(array(
            'id' => htmlspecialchars($_POST['id'])
        ));
        $error = [
            'type' => 'success',
            'fatal' => true,
            'message' => 'Votre mot de passe a bien été modifié'
        ];

    } else {
        $error = [
            'type' => 'warning',
            'fatal' => false,
            'message' => 'Les mots de passe ne correspondent pas'
        ];
    }
} elseif (isset($_GET['token'])) {
    $req = $db->prepare("SELECT ID FROM members WHERE registrationToken = :token");
    $req->execute(array(
        'token' => $_GET['token']
    ));
    $user = $req->fetch();
    if (!$user) {
        $error = [
            'type' => 'danger',
            'message' => 'Le token est invalide',
            'fatal' => true
        ];
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
    <meta property="og:title" content="Confirmation de l'inscription">
    <meta property="og:description" content="Eloquéncia est une association loi 1901 visant à promouvoir l'éloquence et l'art oratoire">
    <title>Confirmation - Eloquéncia</title>
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
                <a class="nav-link" href="./lms">Connexion</a>
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
            <h2 class="display-4 text-center">Créez votre mot de passe</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="passwordConfirmation" class="form-label">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" id="passwordConfirmation" name="passwordConfirmation">
                </div>
                <input type="hidden" name="id" value="<?= $user['ID'] ?>">
                <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
            </form>
        </div>
    </div>
    <?php } ?>
</div>
<hr class="my-4">
<!-- Footer -->
<footer class="bg-body-tertiary text-center text-lg-start footer fixed-bottom">
    <div class="text-center p-3">
        © 2024 Eloquéncia | Fait avec ❤️ et hébergé en France
    </div>
</footer>
<?php if(isset($error) && !$error['fatal']) { ?>
<script>
    const password = document.getElementById("password")
        , confirm_password = document.getElementById("passwordConfirmation");

    function validatePassword(){
        if(password.value !== confirm_password.value) {
            confirm_password.setCustomValidity("Les mots de passe ne correspondent pas");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
<?php } ?>
</body>
</html>