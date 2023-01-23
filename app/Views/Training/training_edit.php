<?php

use App\Controllers\Training;

$base = base_url(); ?>
<?= $this->extend('layouts/profil') ?>
<?= $this->section('header') ?>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="<?= $base ?>/css/stylemain.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700,700i|Source+Code+Pro:400,700&display=swap">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="modalDelete" class="modal" tabindex="-1">
    <form action="/former/training/edit" method="POST">
        <input type="hidden" id="action" name="action" value="delete">
        <input type="hidden" id="id_page" name="id_page">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="msg_delete">Voulez-vous supprimer cette page?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-primary">Oui</button>
                </div>
            </div>
        </div>
    </form>
</div>

<h1 class="ms-3"><?= $title ?></h1>
<hr class="mb-2 mt-2">
<section class="Content ">
    <link rel="stylesheet" href="<?= $base ?>/css/default.min.css" />
    <div class="row">
        <div class="col-12 ">
            <form name="form_training" id="form_training">
                <input type="hidden" id="id_page" name="id_page" value="<?= $page["id_page"] ?>">
                <input type="hidden" id="id_training" name="id_training" value="<?= $id_training ?>">
                <input type="hidden" id="title" name="title" value="<?= $training['title'] ?>">
                <div class="row justify-content-between">
                    <div class="col mb-2">
                        <input readonly class="form-control" id="name" name="name" type="text" placeholder="Nom de la formation" value="<?= $training['title'] ?>" />
                    </div>
                </div>
                <div class="form-group mb-2 row">
                    <label for="select" class="col-2 col-form-label">Catégorie</label>
                    <div class="col-10">
                        <select id="select" name="select" class="form-select">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category["id_category"] ?>"><?= $category["name"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-12  form-floating mb-3">
                    <input class="form-control" id="image_url" name="image_url" type="text" placeholder="Image de la page" value="<?= base_url() . "/assets/article.svg" ?>" />
                    <label for="image_url">Image de la page</label>
                </div>
                <div class=" fullwidth editor mt-2">
                    <textarea id="content" name="content" >
                </textarea>
                </div>
                <div class="row fullwidth mt-2">
                    <div class="row align-items-center">
                        <div id="add" class=" col-1 "><a onclick="onSave()" class=" btn btn-outline-primary">Sauver</a></div>
                        <div class="col">
                            <input type="checkbox" id="publish" name="publish" checked>
                            <label for="publish">Publier</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= $base ?>/js/sceditor.min.js"></script>
<script src="<?= $base ?>/js/languages/fr.js"></script>
<script src="<?= $base ?>/js/bbcode.min.js"></script>
<script src="<?= $base ?>/js/monocons.min.js"></script>

<script>
    const modalDelete = new bootstrap.Modal('#modalDelete');
    const formDelete = document.getElementById('modalDelete');
    const area = document.getElementById('content');
    const image_url = document.getElementById('image_url');


    // init  de l'éditeur
    function initEditor() {
        sceditor.create(content, {
            format: 'xhtml',
            width: '100%',
            height: '330px',
            icons: 'monocons',
            style: '<?= $base ?>/css/default.min.css',
            locale: 'fr-FR'
        });
    }
    initEditor();

    // Sauvegarder des données
    function onSave() {
        form_training.action = "/former/training/save";
        form_training.method = "post";
        form_training.content.value = sceditor.instance(content).val();
        form_training.image_url.value = image_url.value;
        form_training.submit();
    }    
    let text=sceditor.instance(content).val('<?= $page['content'] ?>', false);
    area.value=text.val();
</script>
<?= $this->endSection() ?>