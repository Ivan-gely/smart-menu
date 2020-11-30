<div class="container"><br>
    <form method="POST" action="<?= base_url()?>manager/establishment_validation">
        <h3 class="text-success text-center">Création de votre établissement</h3><hr><br>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nom de votre établissement</label>
                <input type="text" name="name" class="form-control" id="name" value=<?=$this->input->post('name')?>>
                <?php echo form_error('name'); ?>
            </div>

            
            <div class="form-group col-md-6">
                <label for="addressweb">Adresse web d'accès à votre carte</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class=" input-group-text" id="addressweb"><?= base_url()?></span>
                    </div>
                    <input type="text" name="addressweb" class="form-control" id="addressweb" aria-describedby="addressweb"
                        value="<?=$this->input->post('addressweb')?>">
                </div>
                <?php echo form_error('addressweb'); ?>
            </div>  
        </div>
        

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="address">Numéro et nom de la rue</label>
                <input type="text" class="form-control" name="address" id="address" value="<?=$this->input->post('address')?>">
                <?php echo form_error('address'); ?>
            </div>

            <div class="form-group col-md-3">
                <label for="zip">Code postal</label>
                <input type="number" class="form-control" name="zip" id="zip" value="<?=$this->input->post('zip')?>">
                <?php echo form_error('zip'); ?>
            </div>

            <div class="form-group col-md-3">
                <label for="city">Ville</label>
                <input type="text" class="form-control" name="city" id="city" value="<?=$this->input->post('city')?>">
                <?php echo form_error('city'); ?>
            </div>

            <div class="form-group col-md-6">
                <label for="city">Téléphone</label>
                <input type="text" class="form-control" name="tel" id="tel" value="<?=$this->input->post('tel')?>">
                <?php echo form_error('tel'); ?>
            </div>

            <div class="form-group col-md-6">
                <label for="city">Site web</label>
                <input type="text" class="form-control" name="website" id="website" value="<?=$this->input->post('website')?>">
                <?php echo form_error('website'); ?>
            </div>
        </div><br>

        <div class="text-center">
            <button type="submit" class="btn btn-primary" value="submit">Enregistrer les informations</button>
        </div>

    </form>
</div>