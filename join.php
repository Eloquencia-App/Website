<?php
include('config.php');
session_start();

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
                <a class="nav-link" href="./#">Accueil</a>
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
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="assets/eloquencia_round.png" alt="" width="100" height="100">
            <h1 class="display-5 fw-bold text-body-emphasis">Eloquéncia</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Nous rejoindre</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="./" class="btn btn-outline-secondary btn-lg">Accueil</a>
                    <a href="./#contact" class="btn btn-warning btn-lg" style="">Participer</a>
                </div>
            </div>
        </div>
    </div>
</header>
<hr class="my-4">
<div class="container">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">Une équipe dynamique</h2>
            <p class="lead">devenez le prochain membre de l'association Eloquéncia et participez à la vie associative.</p>
        </div>
        <div class="col-md-5">
            <img src="assets/recrutement_1.png" alt="" width="500" height="500" class="rounded img-thumbnail bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading fw-normal lh-1">Les avantages du monde associatif</h2>
            <p class="lead">Rejoindre notre association, c'est l'opportunité d’acquérir des compétences pratiques et valorisées, d’élargir ton réseau, et de t’épanouir personnellement en t’engageant pour des causes importantes.
                C’est une expérience enrichissante qui te permet non seulement de te préparer pour ton avenir professionnel, mais aussi de contribuer positivement à la société. En plus, cela te donnera l’occasion de faire des rencontres, de développer ta conscience sociale, et de vivre des expériences concrètes que tu pourras valoriser dans ton parcours. Alors, pourquoi ne pas faire le premier pas et nous rejoindre ?
            </p>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="assets/recrutement_2.png" alt="" width="500" height="500" class="rounded img-thumbnail bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">Nous avons besoin de vous !</h2>
            <p class="lead">Nous recherchons des personnes de tous horizons pour former une équipe dynamique, composée de jeunes et d’adultes motivés, afin de rendre notre association encore plus active. Plusieurs missions sont disponibles, et seront proposées en fonction de vos compétences et de vos intérêts. Vous pourrez adapter votre engagement selon vos disponibilités, que ce soit pour un soutien régulier à mi-temps ou une aide ponctuelle. Chaque contribution est précieuse et nous avons besoin de toutes les bonnes volontés !
            </p>
        </div>
        <div class="col-md-5">
            <img src="assets/recrutement_3.png" alt="" width="500" height="500" class="rounded img-thumbnail bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">
        </div>
    </div>
</div>
<footer class="mt-3 bg-body-tertiary text-center text-lg-start footer">
    <div class="text-center p-3">
        © 2024 Eloquéncia | Fait avec ❤️ et hébergé en France
    </div>
</footer>
</body>
</html>