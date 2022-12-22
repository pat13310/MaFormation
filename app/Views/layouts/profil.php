<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/php/functions/util.php') ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url() . '/css/style.css' ?>" rel="stylesheet">
    <?= $this->renderSection("header") ?>
    <title><?= $title; ?></title>
</head>
<body>
    <header>
        <nav class="navbar   navbar-expand-lg <?=changeMainTheme($user['type']) ?>">
            <div class="container-fluid">
                <a class="noselect navbar-brand" href="/"><img class="noselect logo" src="<?=base_url() ?>/assets/<?= getLogoColor($user['type'])?>"> Ma Formation</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form action="#" class="d-flex search me-4">
                    <input class="noselect form-control me-2" type="search" placeholder="Chercher" aria-label="Search">
                    <button class="noselect btn <?= getMenuButtonColor($user['type'])?>" type="submit">Chercher</button>
                </form>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="noselect navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="noselect nav-link active" aria-current="page" href="/">Accueil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                A propos
                            </a>
                            <?=fillMenuNav("About") ?>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="noselect nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Actualités
                            </a>
                            <?=fillMenuNav("News") ?>
                        </li>
                        <li class="nav-item">
                            <a class="noselect nav-link" href="contact">Contact</a>
                        </li>
                    </ul>
                    <?php if (!session()->get('isLoggedIn')) : ?>
                        <!-- Bouton de connexion -->
                        <a href='/login' class="noselect btn btn-primary btn-login">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z">
                                </path>
                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z">
                                </path>
                            </svg> Se Connecter
                        </a>
                        <!-- Menu Drop de déconnexion -->
                    <?php else : ?>
                        <div class="noselect dropdown ">
                                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?= $user['image_url'] ?>" alt="MF" width="50px" height="50px" class="rounded-circle-frame">
                                    <span class="d-none d-sm-inline mx-3"><?=$user['name']  ?></span>
                                </a>
                                <ul class="noselect dropdown-menu dropdown-menu text-small shadow">
                                    <li><a class="dropdown-item" href="/parameters">Paramètres</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/logout">Se déconnecter</a></li>
                                </ul>
                            </div>                            
                    <?php endif ?>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <section>
            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 <?=changeMenuTheme($user['type']) ?>">
                        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                            <!-- <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none"> -->
                                <span class="fs-5 d-none d-sm-inline relief mb-3">Bienvenue</span>
                            <!-- </a> -->
                            <div class=" pb-4">
                                <!-- <a href="#" class="d-flex align-items-center text-white text-decoration-none" > -->
                                    <span class="d-none d-sm-inline "><?=$user['name'] ?></span>
                                    <span class="d-none d-sm-inline "><?=$user['firstname']  ?></span>
                                <!-- </a>                                 -->
                            </div>
                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                                                             
                                <?= fillMenuDashBoard($user['type']) ?>
                            </ul>
                            <hr>
                        </div>
                    </div>
                    <div class="col py-2">
                        <?= $this->renderSection("content") ?>
                    </div>
                </div>
            </div>
        </section>

    </section>
    <!-- Footer -->
    <footer class="noselect <?=changeFooterTheme($user['type']) ?> text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn w-h-40 circle btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn w-h-40 circle btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn w-h-40 circle btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn w-h-40 circle btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn w-h-40 circle btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-linkedin"></i></a>

                <!-- Github -->
                <a class="btn w-h-40 circle btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fa fa-github"></i></a>
            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>S'abonner à la lettre d'informations</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="form5Example21" class="form-control" />
                                <label class="form-label" for="form5Example21">Adresse mail</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Souscrire
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->

            <!-- Section: Text -->
            <section class="mb-4">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                    repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                    eum harum corrupti dicta, aliquam sequi voluptate quas.
                </p>
            </section>
            <!-- Section: Text -->

            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">A propos</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Nos formateurs</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Nos formations</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">F.A.Q.</a>
                            </li>
                            <li>
                                <a href="#!" class="btn btn-outline-light mb-4">Me Financer</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Actualités</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Nos Articles</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Nos Publications</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Nos Vidéos</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Nos Livres</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Mon espace personnel</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Profil</a>
                            </li>

                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Nous contacter</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">7 promenade Robert Laffont
                                    13002 Marseille – France
                                </a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">+33 (0)4 84 35 13 13</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">ma-formation@gmail.com</a>
                            </li>
                            <li>
                                <a href="#!" class="btn btn-outline-light mb-4">Contacter</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <p><a class="text-white" href="https://maformation.com/">Termes et conditions générales</a>
                &nbsp;&nbsp;&nbsp;&nbsp;<a class="text-white" href="https://maformation.com/">Mentions légales</a></p>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <?= $this->renderSection("js") ?>

</body>

</html>