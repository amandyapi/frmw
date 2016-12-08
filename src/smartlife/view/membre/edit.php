
<div class="page-header col-lg-offset-2 col-lg-8 col-lg-offset-2">
    <h1 class="">Editer les informations de votre profil</h1>
</div>


<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
    <form action="<?php echo Router::url('edit_profil/'.$id); ?>" method="post">
        <div class="form-group col-lg-6 ">
            <!-- <label for="inputTitre">Titre</label><div class="input-group col-lg-6"><input type="text" name="name" value="" class="form-control">
            </div>-->
            
            <div class="input-group">
                <?php echo $this->Form->input('nommembre','Nom'); ?>
            </div>
            <br>
            <div class="input-group">
                <?php echo $this->Form->input('pnommbre','Prénoms'); ?>
            </div>
            <br>
            <div class="input-group">
                <?php echo $this->Form->input('id','hidden'); ?>
            </div>
            <br>
            <div class="input-group">
                <?php echo $this->Form->input('genremembre','Genre',array('type' => 'radio', 
                    'value' => array('Masculin' => 'M','Feminin' => 'F'))); ?>
            </div>
            <br>
            <div class="input-group">
                <?php echo $this->Form->input('pays','Pays',array('type' => 'select', 
                    'value' => array(1 => "Cote d'ivoire", 2 => 'Togo', 3 => 'Burkina Faso', 4 => 'Mali'))); ?>
            </div>
            <br>
            <div class="input-group">
                <?php echo $this->Form->input('ville','Ville'); ?>
            </div>
            <br>
            <div class="input-group">
                <?php echo $this->Form->input('phonemembre','Telephone'); ?>
            </div>
            <br>
            <div class="input-group">
                <?php echo $this->Form->input('dnaiss','Date de naissance',array('type' => 'date' )); ?>
            </div>
            
            <div class="actions" align="center" style="margin-top: 10px;">
                <input type="submit" value="Valider" class="btn btn-primary" />
            </div>
            
        </div>
</form>
</div>