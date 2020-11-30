<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
    /* Style the active class, and buttons on mouse-over */
    .selected {
        border: solid 2px green;
    }
    </style>

    <title>Smart-menu</title>
</head>

<body>

    <div class="container">
        <h1 class="text-center text-primary">SMART-MENU</h1><br><br>

        <div class="container text-primary">
            <h2>Bienvenue - <?=$this->session->userdata('pseudo')?></h2>

            <nav class="navbar navbar-expand-lg navbar-dark bg-success">

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url()?>manager">Tableau de bord</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="<?= base_url()?>manager/establishment">Etablissement</a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href="<?= base_url()?>manager/customization">Personalisation</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Catégories de produits
                            </a>
                            <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url()?>manager/add_category">Ajouter une
                                    catégorie de produits</a>
                                <a class="dropdown-item" href="<?= base_url()?>manager/category">Vos catégories de
                                    produits</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Produits
                            </a>
                            <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?= base_url()?>manager/add_product">Ajouter un
                                    produit</a>
                                <a class="dropdown-item" href="<?= base_url()?>manager/product">Vos produits</a>
                            </div>
                    </ul>
                    <div class="nav-item"><a class="nav-link" href="<?= base_url()?>manager/logout">Déconnexion</a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="contents"><?=$contents ?></div>

        <div class="position-relative text-center fixed-bottom text-primary">
            <hr>
            <footer>&copy Ivan GELY <?=date('Y')?></footer>
        </div>
    </div>
</body>

<!-- Tinymce est un WYSIWYG -> https://www.tiny.cloud/docs/quick-start/-->
<script src="https://cdn.tiny.cloud/1/qcnyp5wya874wu8o538o0rr38qatb9moockqsnbfr6u5hy64/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#mytextarea',
    height: 400,
    language: 'fr_FR',
    plugins: ['advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table template paste help'
    ],
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'forecolor | bullist numlist outdent indent | link image | ' +
        'preview',
    menu: {
        favs: {
            title: 'My Favorites',
            items: 'code visualaid | searchreplace | emoticons'
        }
    },
});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>

</html>