
<div class="page-header">
     <h1><?php echo $total; ?> Utilisateurs</h1>
</div>

<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>PRENOMS</th>
                <th>EMAIL</th>
                <th>LOGIN</th>
                <th>EN LIGNE</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $k=>$v): ?>
            <tr>
                <td><?php echo $v->ID; ?></td>
                
                <td><?php echo $v->NOM; ?></td>
                
                <td><?php echo $v->PRENOMS; ?></td>
                
                <td><?php echo $v->EMAIL; ?></td>
                
                
                <td><?php echo $v->LOGIN; ?></td>
                
                
                <td><span class="label label-<?php echo ($v->LOGIN == $this->Session->read('User')->LOGIN)?'success':'danger'; ?>">
                    <?php echo ($v->LOGIN == $this->Session->read('User')->LOGIN)?'En ligne':'Hors ligne'; ?></span>
                </td>
                
                <td>
                    <a href="<?php echo Router::url('admin/users/edit/'.$v->ID); ?>">Editer</a>
                    <a onclick="return confirm('Voulez-vous vraiment supprimer ce contenu?');" href="<?php echo Router::url('admin/users/delete/'.$v->ID); ?>">Supprimer</a>
                </td>
            </tr>                       
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<br><br>
<p class="col-lg-offset-2 col-lg-8 col-lg-offset-2"><a class="btn btn-primary" target="_blank" href="<?php echo Router::url('admin/users/create'); ?>">Nouvel Utilisateur</a></p>
