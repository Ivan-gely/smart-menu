<div class="container">
    <div class="table-responsive">
        <table class="table mt-5">
            <thead class="bg-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ordre d'affichage</th>
                    <th scope="col">Catégorie de produits</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <? foreach($cat as $table => $value){?>
            <tbody>
                <tr>
                    <th scope="row"><?=$value->id?></th>
                    <td></td>
                    <td><?=$value->name_cat?></td>
                    <td><a href="<?=base_url()?>manager/modify_cat/<?=$value->id?>" class="btn btn-primary">Modifier</a>
                    </td>
                    <td><a href="<?=base_url()?>manager/delete_cat/<?=$value->id?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            </tbody>
            <?}?>
        </table>
    </div>
</div>