<br>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <img src="/uploads/logo/<?=$user_id?>_logo_thumb?t=<?=time()?>" class="card-img-top" alt="logo">
                <a href="<?=base_url()?>manager/establishment" class="btn btn-primary"><?=$est->name?></a>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><?=$est->address?><br>
                            <?=$est->zip?><br>
                            <?=$est->city?><br><br>
                        </li>
                        <li>
                            <p>Tel :
                                <? if($est->tel == '')
                        {
                           echo 'Non renseigné';
                        } else {
                            echo $est->tel;
                        }?>
                            </p>
                        </li>
                        <li>
                            <p>Web :
                                <? if($est->website == '')
                        {
                           echo 'Non renseigné'; 
                        } else {
                            echo $est->website;
                        }?>
                        </li>
                        <li>
                            <a href="<?=base_url()?>manager/establishment">Modifier les informations de contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8">
            <div class="text-center">
                <h3 class="text-success">Profil de votre établissement</h3>
                <hr>
                <br>
            </div>
            <div>
                <h4><?=$est->name?></h4>
                <p><a href="<?=base_url()?>manager/establishment">Modifier le nom de votre établissement</a></p>

                <h4>Accès à votre carte</h4>
                <p><a href="<?=base_url().'user?est_id='.$est->id?>" target="_blank">Votre carte est accessible - ICI
                        -</a></p>
                <h4>Catégories de produits</h4>
                <span>Votre carte contient ------ catégorie.</span>
                <p><a href="<?=base_url()?>manager/add_category">Créer une nouvelle catégorie</a></p>

                <h4>Produits</h4>
                <span>Votre carte contient ------- produit.</span>
                <p><a href="<?=base_url()?>manager/add_product">Créer un nouveau produit</a></p>
            </div>
        </div>

    </div>

</div>