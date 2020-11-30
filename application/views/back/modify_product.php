<div class="container">
    <form method="POST" action="<?= base_url()?>manager/modify_product_validation/<?=$product->id?>">

        <br><h3 class="text-success text-center">Modifier le produit</h3><br>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="name">Nom du produit</label>
                <input type="text" name="name" class="form-control" id="name" value="<?=$product->name_product?>">
                <?php echo form_error('name'); ?>
            </div>

            <div class="form-group col-md-5">
                <label for="description">Description du produit</label>
                <input type="text" name="description" class="form-control" id="description" value="<?=$product->description_product?>">
                <?php echo form_error('description'); ?>
            </div>

            <div class="form-group col-md-2">
                <label for="price">Prix du produit</label>
                <input type="text" name="price" class="form-control" id="price" value="<?=$product->price_product?>">
                <?php echo form_error('price'); ?>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" value="submit">Enregistrer les modifications</button>
        </div>

    </form>
</div>