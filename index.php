<?php
include('config.php');
session_start();

if(isset($_POST['captcha'])) {
    if ($_POST['captcha'] == $_SESSION['captcha']) {
        $req = $db->prepare('INSERT INTO contact (name, email, message) VALUES (:name, :email, :message)');
        $req->execute(array(
            'name' => htmlspecialchars($_POST['name']),
            'email' => htmlspecialchars($_POST['email']),
            'message' => htmlspecialchars($_POST['message'])
        ));
        $error = [
            'type' => 'success',
            'message' => 'Votre message a bien été envoyé'
        ];
    } else {
        $error = [
                'type' => 'danger',
                'message' => 'Le captcha est incorrect'
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eloquéncia</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/eloquencia_round.png" alt="Logo" width="64" height="64" class="d-inline-block">
            Eloquéncia
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link" href="#">Accueil</a>
                <a class="nav-link" href="#">À propos</a>
                <a class="nav-link" href="#">Contact</a>
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
                <div class="d-flex justify-content-center">
                    <a href="#about" class="btn btn-primary btn-lg">Découvrir</a>
                    <a href="https://www.helloasso.com/associations/eloquencia/adhesions/adhesion" class="btn btn-secondary btn-lg">Adhérer</a>
                </div>
            </div>
        </div>
    </div>
</header>
<?php if(isset($error)) { ?>
    <div class="alert alert-<?= $error['type'] ?> text-center" role="alert">
        <?= $error['message'] ?>
    </div>
<?php } ?>
<hr class="my-4">
<div id="about" class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="display-4 text-center">À propos</h2>
            <p class="lead text-center">Eloquéncia est une plateforme de cours en ligne pour apprendre à parler en public. Nous proposons des cours en ligne, des ateliers et des formations pour vous aider à devenir un orateur hors pair.</p>
        </div>
    </div>
</div>
<hr class="my-4">
<div id="team" class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="display-4 text-center">Notre équipe</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <img src="assets/members/1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted text-center">Président</h6>
                    <h5 class="card-title text-center">Marouan JLASSI</h5>
                    <p class="card-text">Présentation de Marouan</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <img src="assets/members/2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted text-center">Vice-Président</h6>
                    <h5 class="card-title text-center">Jean Dupont</h5>
                    <p class="card-text">Présentation de Jean</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <img src="assets/members/3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted text-center">Trésorière</h6>
                    <h5 class="card-title text-center">Jeanne Dupond</h5>
                    <p class="card-text">Présentation de Jeanne</p>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="my-4">
<div id="contact" class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="display-4 text-center">Contact</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message"></textarea>
                </div>
                <div class="mb-3">
                    <label for="captcha" class="form-label">Captcha</label>
                    <img src="Captcha/captcha.php" alt="Captcha">
                    <input type="text" name="captcha" id="captcha" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>
<hr class="my-4">
<!-- Footer -->
<footer class="bg-body-tertiary text-center text-lg-start">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024 Eloquéncia
    </div>
</footer>
</body>
</html>