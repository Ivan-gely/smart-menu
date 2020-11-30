<form method="POST" action="<?= base_url()?>front/form_validation">
    <h3 class="text-success">Pret pour l'aventure ?</h3><hr><br>
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" class="form-control" value="<?=set_value('pseudo');?>" id="pseudo" size="30">
        <?php echo form_error('pseudo'); ?>
    </div>
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
        <?php echo form_error('password'); ?>
    </div>

    <div class="form-group">
        <label for="passconf">Confirmation du mot de passe</label>
        <input type="password" name="passconf" class="form-control" value="<?=set_value('passconf');?>" id="passconf"
            size="50"><br>
        <?php echo form_error('passconf'); ?>
    </div>

    <div class="d-flex justify-content-center">    
    <button type="submit" value="Submit" class="btn btn-primary">Inscription</button>
    </div>
</form><br>

<div><a href="/">Revenir à l'accueil</a></div>