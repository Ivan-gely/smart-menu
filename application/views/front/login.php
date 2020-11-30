<form method="POST" action="<? echo base_url();?>front/login_validation">
    <h3 class="text-success">Connectez vous maintenant !</h3>
    <hr><br>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?=set_value('email');?>" id="email" size="50">
        <?php echo form_error('email'); ?>
    </div>

    <div class="form-group">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control" value="<?=set_value('password');?>" id="password"
            size="50">
        <small id="emailHelp" class="form-text text-muted">Mot de passe d'au moins 6 caractères</small>
        <?
        echo form_error('password');
        ?>
        <? if ($this->session->flashdata('error') == true){?>
        <div class='alert alert-danger mt-2 h-50'><?= $this->session->flashdata('error')?></div>
        <?}?>


    </div>
    <div class="d-flex justify-content-center">     
    <button type="submit" class="btn btn-primary">Connexion</button>
    </div>  
</form><br>


<div><a href="/">Revenir à l'accueil</a></div>