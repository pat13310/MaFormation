<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/php/functions/util.php') ?>
<?= $this->extend('layouts/profil') ?>
<?= $this->section('content') ?>
<!-- <div class="title3 ms-1 mb-2"><?= $title ?></div> -->
<div class='ms-2'><h1><?= $subtitle ?></h1></div>
<div class='container px-2 my-3'>
    <form id='contactForm' action='/superadmin/add/admin'method="post">
        <div class='row'>
            <div class='col-md-6'>
                <div class='form-floating mb-3'>
                    <select class='form-select' id='selectionnezLeProfil'name="type" aria-label='Sélectionnez le profil'>
                        <option value='3' >Super Administrateur</option>
                        <option value='5' selected>Administrateur</option>
                    </select>
                    <label for='selectionnezLeProfil'>Sélectionnez le profil</label>
                </div>
                <div class='form-floating mb-3'>
                    <input class='form-control' id='mail' type='mail' name='mail' placeholder='Adresse mail' />
                    <label for='mail'>Adresse mail (*)</label>
                </div>
                <div class='form-floating mb-3'>
                    <input class='form-control' id='motDePasse' name='password' type='password' placeholder='Mot de passe' />
                    <label for='motDePasse'>Mot de passe (*)</label>
                </div>
                <div class='form-floating mb-3'>
                    <select class='form-select' id='genre' name="gender"aria-label='Genre'>
                        <option value='0'>Madame</option>
                        <option value='1'>Monsieur</option>
                        <option value='Null'selected >Non renseigné</option>
                    </select>
                    <label for='genre'>Genre</label>
                </div>
                <div class='form-floating mb-3'>
                    <input class='form-control' id='nom' name="name" type='text' placeholder='Nom' />
                    <label for='nom'>Nom (*)</label>
                </div>
                <div class='form-floating mb-3'>
                    <input class='form-control' id='prenom' name="firstname" type='text' placeholder='Prénom' />
                    <label for='prenom'>Prénom (*)</label>
                </div>
                <div class='mb-3'>
                    <div class='form-check'>
                        <input class='form-check-input' id='inscrit' type='checkbox' name='newsletters'checked />
                        <label class='form-check-label' for='inscrit'>S&#x27;abonner à la newsletters</label>
                    </div>
                </div>
                <div class='d-grid'>
                    <button class='btn btn-primary col-sm-6 btn-lg' type='submit'>Ajouter</button>
                </div>                
            </div>
            <div class='col-md-6'>
                <div class='form-floating mb-3'>
                    <textarea class='form-control' id='adresse' name="address" type='text' placeholder='adresse' style='height: 8.2rem;'></textarea>
                    <label for='adresse'>adresse</label>
                </div>
                <div class='form-floating mb-3'>
                    <input class='form-control' id='codePostal' name="cp" type='text' placeholder='code postal' />
                    <label for='codePostal'>code postal</label>
                </div>
                <div class='form-floating mb-3'>
                    <input class='form-control' id='ville' name="city" type='text' placeholder='Ville' />
                    <label for='ville'>Ville</label>
                </div>
                <div class='form-floating mb-3'>
                    <input class='form-control' id='pays' name="country" type='text' placeholder='Pays' value="France"/>
                    <label for='pays'>Pays</label>
                </div>
                <div class='form-floating mb-3'>
                    <input class='form-control' id='telephone' name="phone" type='text' placeholder='Téléphone' />
                    <label for='telephone'>Téléphone</label>
                </div>
                <?php if (isset($validation)) : ?>
                    <div class="col-12 mt-2">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>


<?= $this->section('js') ?>

<?= $this->endSection() ?>