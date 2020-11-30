<div class="container">
    <form method="POST" action="<?= base_url()?>manager/modify_cat_validation/<?=$cat->id?>">

        <br><h3 class="text-success text-center">Modifier la categorie de produits</h3><br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nom de la catégorie</label>
                <input type="text" name="name" class="form-control" id="name" value="<?=$cat->name_cat?>">
                <?php echo form_error('name'); ?>
            </div>

            <div class="form-group col-md-6">
                <label for="description">Description de la catégorie</label>
                <input type="text" name="description" class="form-control" id="description" value="<?=$cat->description_cat?>">
                <?php echo form_error('description'); ?>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" value="submit">Enregistrer les modifications</button>
        </div>

    </form>
</div>