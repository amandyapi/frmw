<?php $title_for_layout = $page->NAME; ?>
<h2><?php echo $membre->nommembre; ?> <?php echo $membre->pnommbre; ?></h2>
<figure>
        <img alt="" src="<?php echo Router::webroot("webroot/uploads/profile/$membre->photombre"); ?>" width="100" height="100">
</figure>
<br>
        <div class="row">
            <div class="row">
                
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Identification
                        </div>
                        <div class="panel-body">
                              <table class="table">
                                  <tr>
                                      <td>Nom</td> <td><?php echo $membre->nommembre; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Prénoms</td> <td><?php echo $membre->pnommbre; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Genre</td> <td><?php echo $membre->genremembre; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Date de naissance</td> <td><?php 
                                                $date = new DateTime($membre->dnaiss);
                                                echo $date->format('d-m-Y');?></td>
                                  </tr>
                                  <tr>
                                      <td>E-mail</td> <td><?php echo $membre->emailmembre; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Contact</td> <td><?php echo $membre->phonemembre; ?></td>
                                  </tr>
                                  
                              </table>
							  <br>
							  <table class="table">
                                  <tr>
                                      <td>Pays</td> <td><?php echo $membre->pays; ?></td>
                                  </tr>
                                 
                                  <tr>
                                      <td>Ville</td> <td><?php echo $membre->ville; ?></td>
                                  </tr>
                                  
                              </table>
                        </div>
                        
                    </div>
                </div>
                
                
                <div class="col-lg-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Adhésion
                        </div>
                        <div class="panel-body">
                              <table class="table">
                                  <tr>
                                      <td>Date d'adhésion</td> <td><?php  $date = new DateTime($membre->dateadhesion);
                                                echo $date->format('d-m-Y');?></td>
                                  </tr>
                                  <tr>
                                      <td>Pseudo</td> <td><?php echo $membre->pseudo; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Lien d'affiliation</td> <td>https://www.smarts-life.com/sl/?lnk=<?php echo $membre->lien; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Parrain</td> <td><?php echo $membre->parrain; ?></td>
                                  </tr>
								  
								  
								  
                                  <tr>
                                      <td>etat</td> <td><?php echo $membre->etat; ?>   
									  
									        <?php if ($membre->etat = "inscrit"):?>
											
											<a class="btn btn-info"  href="<?php echo Router::url('admin/abonnementManuel/'.$membre->id); ?>">
															<span class="glyphicon glyphicon-edit"></span>
											</a>
											
											<?php elseif ($membre->etat = "bloquer"):?>
											
											<a class="btn btn-info"  href="<?php echo Router::url('admin/abonnementManuel/'.$membre->id); ?>">
															<span class="glyphicon glyphicon-edit"></span>
											</a>
											
											<?php endif ;?>
											
									  
									  
									  </td>
                                  </tr>
								  
								  
								  
                                  <tr>
                                      <td>ONG</td> 
                                      <td>
                                          <?php echo $membre->ong; ?>
                                      </td>
                                  </tr>
                                  
                              </table>
                        </div>
                        
                    </div>
                </div>
                
                </div>

            
            
        </div>