<?php $title_for_layout = 'Login'; ?>

<div class="page-header">
    <h1 class="text-danger">Connectez vous</h1>
</div>


<div class="">
    <form action="<?php echo Router::url('users/login'); ?>" method="post">
        <div class="form-group center-block">
            <!-- <label for="inputTitre">Titre</label><div class="input-group col-lg-6"><input type="text" name="name" value="" class="form-control">
            </div>-->
            
            <div class="input-group col-sm-4 col-lg-4 center-block clearfix">
                <?php echo $this->Form->input2('LOGIN','Identifiant'); ?>
            </div>
            <br>
            <div class="input-group col-sm-4 col-lg-4 center-block clearfix">
                <?php echo $this->Form->input2('PASSWORD','Mot de passe',array('type' => 'password')); ?>
            </div>
            <br>
            <div class="actions col-lg-offset-4 col-sm-offset-4 col-sm-4 col-lg-4 col-sm-offset-4 col-lg-offset-4" align="center">
                <input type="submit" value="Se connecter" class="btn btn-primary" />
            </div>
            
        </div>
</form>
</div>