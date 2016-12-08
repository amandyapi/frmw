
<div class="page-header">
     <h1>Editer un Utilisateur</h1>
</div>


<div class="center-block">
    <form action="<?php echo Router::url('admin/pages/edit/'.$id); ?>" method="post">
        <div class="form-group">
            <!-- <label for="inputTitre">Titre</label><div class="input-group col-lg-6"><input type="text" name="name" value="" class="form-control">
            </div>-->
            
            <div class="input-group col-sm-6 col-lg-6">
                <?php echo $this->Form->input('NAME','Titre'); ?>
            </div>
            <br>
            <div class="input-group col-sm-6 col-lg-6">
                <?php echo $this->Form->input('SLUG','Url'); ?>
            </div>
            <br>
            <div class="input-group col-sm-10 col-lg-10">
                <?php echo $this->Form->input('ID','hidden'); ?>
            </div>
            <br>
            <div class="input-group col-sm-10 col-lg-10">
                <?php echo $this->Form->input('CONTENT','Contenu',array('class' => 'wysiwyg','type' => 'textarea', 'rows' => 5, 'cols' => 10)); ?>
            </div>
            <br>
            <div class="input-group col-sm-10 col-lg-10">
                <?php echo $this->Form->input('ONLINE','En ligne',array('type' => 'checkbox')); ?>
            </div>
            
            <div class="actions col-sm-10 col-lg-10" align="center">
                <input type="submit" value="Valider" class="btn btn-primary" />
            </div>
            
        </div>
</form>
</div>