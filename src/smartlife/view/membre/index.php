

<div class="page-header">
    <h1 class="text-center text-emp text-uppercase"><?php echo $membre->pseudo; ?></h1>
    
    <p class="lead text-center">
       Les informations de votre profil dans le tableau ci-dessous.
    </p>
</div>
<div class="row">
    <div class="col-lg-4">
        <img alt="" class="center-block" src="<?php echo Router::webroot("webroot/uploads/profile/$membre->photombre"); ?>" width="150" height="160">
    </div>
    <div class="col-lg-5">
    <table class="center-block table table-bordered table-striped">
            <tr>
                <th>NOM</th>
                <th><?php echo $membre->nommembre; ?></th>
            </tr>
            <tr>
                <th>PRENOMS</th>
                <th><?php echo $membre->pnommbre; ?></th>
            </tr> 
            
            <tr>
                <th>PSEUDO</th>
                <th><?php echo $membre->pseudo; ?></th>
            </tr> 
            
            <tr>
                <th>EMAIL</th>
                <th><?php echo $membre->emailmembre; ?></th>
            </tr>
            
            <tr>
                <th>GENRE</th>
                <th><?php echo $membre->genremembre; ?></th>
            </tr>
            
            <tr>
                <th>DATE DE NAISSANCE</th>
                <th><?php echo $membre->dnaiss; ?></th>
            </tr>
            
            <tr>
                <th>PAYS</th>
                <th><?php echo $membre->pays; ?></th>
            </tr>
            
            <tr>
                <th>VILLE</th>
                <th><?php echo $membre->ville; ?></th>
            </tr>
            
            <tr>
                <th>TELEPHONE</th>
                <th><?php echo $membre->phonemembre; ?></th>
            </tr>
            
            <tr>
                <th>LIEN DE PARRAINAGE</th>
                <th><?php echo "smarts-life.com/$membre->lien"; ?></th>
            </tr>
            
            <tr>
                <th>PARRAIN</th>
                <th><?php echo $membre->parrain; ?></th>
            </tr>
            
            <tr>
                <th>CONTRAT</th>
                <th><?php echo $membre->contrat; ?></th>
            </tr>
            
            <tr>
                <th>DATE D'ADHESION</th>
                <th><?php echo $membre->dateadhesion; ?></th>
            </tr>
        </tbody>
    </table>
    </div>
</div>
<br><br>
<p class="col-lg-offset-5 col-md-offset-5 col-lg-3 col-md-3 col-md-offset-4 col-lg-offset-4"><a class="btn btn-primary center-block" target="_blank" href="<?php echo Router::url('edit_profil/'.$membre->id); ?>">Modifiez vos informations</a></p>
