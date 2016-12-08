<?php $title_for_layout = 'Login'; ?>
<?php echo $this->Session->flash(); ?>
<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Veuillez entrer vos identifiants svp</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo Router::url('admin/login'); ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Non d'utilisateur" name="nom" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mot de passe" name="pass" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Se souvenir de moi
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form 
                                <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                                <div class="form-group" align="center">
                                    <input type="submit" value="Se connecter" class="btn btn-lg btn-success btn-block" />
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>