<?php $title_for_layout = 'Demande de retrait du compte cash'; ?>
<div class="row" style="margin-top: 20px">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Veuillez remplir les champs svp</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo Router::url('membre/dmdeffectue'); ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="montant" name="montant" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="numero sur lequel vous voulez recevoir le transfert" name="numero" type="text" autofocus>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form 
                                <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                                <div class="form-group" align="center">
                                    <input type="submit" value="Soumettre" class="btn btn-lg btn-success btn-block" />
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>