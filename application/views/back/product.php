<div class="container">
<div class="table-responsive">
    <? foreach($prod_cat as $cat_name => $products){?>
    <table class="table mt-5">
        <thead class="bg-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ordre d'affihage</th>
                <th scope="col"><?= $cat_name?></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            <? foreach($products as $k => $product){?>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td><?= $product->name_product?></td>
                <td><a href="<?=base_url()?>manager/modify_product/<?=$product->id?>"
                        class="btn btn-primary">Modifier</a>
                </td>
                <td><a href="<?=base_url()?>manager/delete_product/<?=$product->id?>"
                        class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?}?>
        </tbody>
    </table>
    <?}?>
</div>

</div>