

<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>pseudo</th>
                                            <th>montant du retrait</th>                                          
                                            <th>date demande</th>
                                            <th>solde en cash</th>
                                            <th>numéro</th>
                                             <th>état</th>
                                             <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($demandretrait as $key => $value):?>  
                                               <td> <?php echo $value->id; ?></td>
                                               <td> <?php echo $value->membre; ?></td>
                                               <td> <?php echo $value->montant; ?></td>
                                               <td><?php echo $value->datdemand; ?></td>
                                               <td><?php echo   $membre->cash; ?></td>
                                               <td><?php echo $value->numero; ?></td>
                                               <td><?php echo $value->etat; ?></td>
                                               <td> 
                                                   <a class="btn btn-info" href="<?php echo Router::url('admin/demandeValider/'.$value->id); ?>">
                                                        <span class="glyphicon glyphicon-info-sign"></span>
                                                   </a>
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