<?php $title_for_layout = $page->name ?>
<div class="c-content-box c-size-md c-bg-white">
		<div class="container">
			<div class="c-content-feedback-1 c-option-1">
				<div class="row">
					<div class="col-md-6">
						<div class="c-container c-bg-green c-bg-img-bottom-right" style="background-image:url(assets/base/img/content/misc/feedback_box_1.png)">
							<div class="c-content-title-1 c-inverse">
								<h3 class="c-font-uppercase c-font-bold">A propos du solde</h3>
								<div class="c-line-left">
								</div>
								<p class="c-font-lowercase" style="text-align: justify">
									Le solde cash est alimenté grâce aux comissions de parrainage, aux bonus sur vos commandes et aux profits de vos investissements CROWFOUNDING, vous pouvez y effectuer des retraits à partir de 20 000frs. En dessous de ce seuil, tout retraits est impossible
								</p><br/>
								<a href="<?php echo Router::url('membre/formdmdretait'); ?>" class="btn btn-md c-btn-border-2x c-btn-white c-btn-uppercase c-btn-square c-btn-bold">Effectuer un retrait</a>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="table-responsive">
								<table class="table">
								<thead><tr><th>Date et heure</th><th>Montant rechargé</th><th>Reférence</th></tr></thead>
								<tbody><?php //debug($retraits); die(); ?>
                                                                    <tr><th >DEPOTS</th></tr>
                                                                        <?php foreach($depots as $key => $value):?>
									<tr><td><?php echo $value->datdepot; ?></td><td><?php echo $value->montant; ?>F.CFA</td><td><?php echo $value->id; ?>2066612</td></tr>
                                                                        <?php endforeach ;?>
                                                                        <tr><th row="scope">RETRAITS</th></tr>
                                                                        <?php foreach($retraits as $key => $value):?>
									<tr><td><?php echo $value->datretrait; ?></td><td><?php echo $value->montant; ?>F.CFA</td><td><?php echo $value->id; ?>2066612</td></tr>
                                                                        <?php endforeach ;?>
                                                                         <tr><th row="scope"></th><td>SOLDE</td><td><?php echo $compte->solde; ?>F.CFA</td></tr>
								</tbody>
								</table>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	