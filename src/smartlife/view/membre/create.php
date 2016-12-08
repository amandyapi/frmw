
<div class="page-header">
     <h1>Création de compte</h1>
</div>


<div class="">
    <form action="<?php echo Router::url('membre/create/'); ?>" method="post">
        <div class="form-group">
            <!-- <label for="inputTitre">Titre</label><div class="input-group col-lg-6"><input type="text" name="name" value="" class="form-control">
            </div>-->
            <div class="input-group  col-lg-offset-3 col-sm-offset-4 col-sm-4 col-lg-6 col-sm-offset-4 col-lg-offset-3">
                <?php echo $this->Form->input2('NOM','Nom'); ?>
            </div>
            <br>
            <div class="input-group  col-lg-offset-3 col-sm-offset-4 col-sm-4 col-lg-6 col-sm-offset-4 col-lg-offset-3">
                <?php echo $this->Form->input2('PRENOMS','Prénoms'); ?>
            </div>
            
            
            
            <br>
            <div class="input-group  col-lg-offset-3 col-sm-offset-4 col-sm-4 col-lg-6 col-sm-offset-4 col-lg-offset-3">
                <?php echo $this->Form->input2('EMAIL','Email',array('type' => 'email')); ?>
            </div>
            
            
            
            <br>
            <div class="input-group  col-lg-offset-3 col-sm-offset-4 col-sm-4 col-lg-6 col-sm-offset-4 col-lg-offset-3">
                <?php echo $this->Form->input2('LOGIN','Login'); ?>
            </div>
            
            
            
            <br>
            <div class="input-group  col-lg-offset-3 col-sm-offset-4 col-sm-4 col-lg-6 col-sm-offset-4 col-lg-offset-3">
                <?php echo $this->Form->input2('PASSWORD','Mot de passe',array('type' => 'password')); ?>
            </div>
            
            <div class="actions  col-lg-offset-4 col-sm-offset-4 col-sm-4 col-lg-4 col-sm-offset-4 col-lg-offset-4" align="center">
                <input type="submit" value="Valider" class="btn btn-primary" />
            </div>
            
        </div>
</form>
</div>