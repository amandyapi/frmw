

<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Liste des membres</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>pays</th>
                                            <th>nom</th>
                                            <th>prenoms</th>
                                            <th>pseudo</th>
                                            <th>email</th>
                                            <th>etat</th>
                                            <th>actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($membres as $key => $value):?> 
											<?php if ($value->etat == "inscrit"):?>
											<tr class="warning">
											<?php elseif($value->etat =="abonner"):?>
											<tr class="success">
											<?php else:?>
											<tr>
											<?php endif ;?>
												   <td> 
													   <a href="<?php echo Router::url('membres_show/'.$value->id); ?>">
														   <?php echo $value->id; ?>
													   </a>
												   </td>
												   <td> <?php echo $value->pays; ?></td>
												   <td> <?php echo $value->nommembre; ?></td>
												   <td><?php echo $value->pnommbre; ?></td>
												   <td><?php echo $value->pseudo; ?></td>
												   <td><?php echo $value->emailmembre; ?></td>
												   <td><?php echo $value->etat; ?></td>
												   <td> 
													   <a class="btn btn-info"  href="<?php echo Router::url('admin/membresShow/'.$value->id); ?>">
															<span class="glyphicon glyphicon-info-sign"></span>
													   </a>
													   <?php if ($value->etat !='abonner'){ ?>
                                                        <a target="" title="abonnement" class="btn btn-info" href="<?php echo Router::url('admin/abonnementManuel/'.$value->id); ?>">
                                                          <span class="glyphicon glyphicon-pencil"></span>
                                                       </a>
                                                   <?php } ?> 
													   <a class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce membre?');" href="<?php echo Router::url('admin/membresDelete/'.$value->id); ?>">
															<span class="glyphicon glyphicon-remove"></span>
													   </a>
												   </td>
											   </tr>
										   
                                      <?php endforeach ;?>
                                    </tbody>
                                </table>
                            </div>
                            
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>