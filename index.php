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
    <meta name="description" content="Eloquéncia est une association loi 1901 visant à promouvoir l'éloquence et l'art oratoire">
    <meta name="keywords" content="éloquence, oratoire, association, loi 1901, parler en public, discours, formation, cours en ligne">
    <meta name="author" content="Eloquéncia">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="language" content="fr">
    <meta property="og:site_name" content="Eloquéncia">
    <meta property="og:site" content="https://eloquencia.org">
    <meta property="og:title" content="Accueil">
    <meta property="og:description" content="Eloquéncia est une association loi 1901 visant à promouvoir l'éloquence et l'art oratoire">
    <title>Accueil - Eloquéncia</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/eloquencia.css">
    <script src="js/bootstrap.js"></script>
    <script defer type="text/javascript" src="js/klaro-js/config.js"></script>
    <script defer type="text/javascript" src="https://cdn.kiprotect.com/klaro/v0.7.22/klaro.js"></script>
    <link rel="stylesheet" href="https://cdn.kiprotect.com/klaro/v0.7.22/klaro.min.css" />
    <script type="text/plain" data-type="text/javascript" data-name="matomo" data-src="js/analytics.js"></script>
    <noscript><p><img referrerpolicy="no-referrer-when-downgrade" data-src="https://analytics.eloquencia.org/matomo.php?idsite=1&amp;rec=1" style="border:0;" alt="" data-type="image" data-name="matomo"/></p></noscript>
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
                <a class="nav-link" href="#about">À propos</a>
                <a class="nav-link" href="#contact">Contact</a>
                <a class="nav-link" href="discount">Réduction</a>
                <a class="nav-link" href="join">Rejoindre</a>
                <a class="nav-link" href="./lms">Connexion</a>
            </div>
        </div>
    </div>
</nav>
<header>
    <div class="container">
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="assets/eloquencia_round.png" alt="" width="100" height="100">
            <h1 class="display-5 fw-bold text-body-emphasis">Eloquéncia</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">La plateforme de cours en ligne pour apprendre à parler en public</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="#about" class="btn btn-outline-secondary btn-lg">Découvrir</a>
                    <a href="https://www.helloasso.com/associations/eloquencia/adhesions/adhesion" class="btn btn-warning btn-lg" style="">Adhérer</a>
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
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/banniere_reduction.png" class="d-block w-100" alt="..." id="carousel-item-1">
            <div class="carousel-caption d-none d-md-block">
                <a href="discount" class="btn btn-warning">Profiter de la réduction</a>

            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<hr class="my-4">
<div id="album">
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex flex-row">
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img src="assets/vignette_eloquence.png" alt="Vignette éloquence" width="100%" height="225">
                        <div class="card-body">
                            <p class="card-text">L'éloquence est un art oratoire qui permet de valoriser la prise de parole en public par des techniques et autres.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img src="assets/vignette_avantages.png" alt="Vignette avantages" width="100%" height="225">
                        <div class="card-body">
                            <p class="card-text">En tant qu'adhérents, accédez à des leçons, la gratuité de nos événements, et bien d'autres encore.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge text-bg-warning">Adhérents</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img src="assets/vignette_eloquencia.png" alt="Vignette Eloquéncia" width="100%" height="225">
                        <div class="card-body">
                            <p class="card-text">Eloquéncia à pour but de valoriser l'art oratoire dans le milieu local ainsi qu'aux élèves de collèges et lycées</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="my-4">
<div id="about" class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="display-4 text-center">À propos</h2>
            <p class="lead text-center">Eloquéncia est une association loi 1901 visant à promouvoir l'art de l'éloquence. Elle propose une plateforme de cours en ligne pour apprendre à parler en public, des ateliers et des formations pour vous aider à devenir un orateur hors pair.</p>
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
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="display-4 text-center">Mentions légales</h2>
            <p class="lead text-center">Pour consulter les mentions légales, <a href="legal">cliquez ici</a>
            </p>
        </div>
    </div>
</div>
<hr class="my-4">
<footer class="bg-body-tertiary text-center text-lg-start footer">
    <div class="text-center p-3">
        © 2024 Eloquéncia | Fait avec ❤️ et hébergé en France
    </div>
</footer>
</body>
</html>