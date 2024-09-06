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
                <a class="nav-link" href="#about">À propos</a>
                <a class="nav-link" href="#contact">Contact</a>
                <a class="nav-link" href="discount">Réduction</a>
                <a class="nav-link" href="#">Connexion</a>
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
<div id="album">
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
            <p class="lead text-center">Eloquéncia est une plateforme de cours en ligne pour apprendre à parler en public. Nous proposons des cours en ligne, des ateliers et des formations pour vous aider à devenir un orateur hors pair.</p>
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
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024 Eloquéncia | Fait avec ❤️ et hébergé en France
    </div>
</footer>
</body>
</html>