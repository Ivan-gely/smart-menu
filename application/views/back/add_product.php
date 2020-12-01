<div class="container">
    <?php echo form_open_multipart('manager/add_product_validation'); ?>
        <br>
        <h3 class="text-success text-center">Ajouter un produit</h3><br>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="cat">Catégorie du produit</label>
                <select id="cat" name="cat" class="form-control">
                    <option>Choisir une catégorie</option>
                    <?foreach($cat as $key => $value){?>
                    <option><?=$value->name_cat?></option>
                    <?}?>
                </select>
                <?php echo form_error('cat'); ?>
            </div>
        </div><br>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="name">Nom du produit</label>
                <input type="text" name="name" class="form-control" id="name" value=<?=$this->input->post('name')?>>
                <?php echo form_error('name'); ?>
            </div>

            <div class="form-group col-md-5">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description"
                    value="<?=$this->input->post('description')?>">
                <?php echo form_error('description'); ?>
            </div>

            <div class="form-group col-md-2">
                <label for="price">Prix</label>
                <input type="number" name="price" class="form-control" id="price"
                    value="<?=$this->input->post('price')?>">
                <?php echo form_error('price'); ?>
            </div>
    </form>

</div>

<div class="text-center">
    <button type="submit" class="btn btn-primary" value="submit">Créer un produit</button>
</div>

</form>
</div>