<?php include_once('header.php') ?>
        </div>
      </nav>

		<div class="row" style="background-image:url('<?php echo base_url();?>assets/images/role.png');">
		    <div class="col-md-2 col-md-offset-5">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                <h4>Changer le role</h4>
		            </div>
		            <div class="panel-body">
						<?php 

							// Pour recuperer le type de l'utilisateur actuel
							// ( c'est ps logique mais je vais la laissée pour le moment) 
							$type_usr = $this->session->userdata('type');

							// pour garder les statues des radion bouttons ;)
							if ($type_usr=='admin') {
								$chckAdmin=TRUE;  $chckEns=FALSE;  $chckEtu=FALSE;
							}
							elseif ($type_usr=='ens') {
								$chckAdmin=FALSE;  $chckEns=TRUE;  $chckEtu=FALSE;
							}
							elseif ($type_usr=='etu') {
								$chckAdmin=FALSE;  $chckEns=FALSE;  $chckEtu=TRUE;
							}
							// else cocher l'admin par default ^^ 
							else {
								$chckAdmin=TRUE;  $chckEns=FALSE;  $chckEtu=FALSE;
							}
							

							$admin = array(
							    'name'        => 'nv_type',
							    'id'          => 'admin',
							    'value'       => 'admin',
							    'checked'	  => $chckAdmin,
							    );

							$ens = array(
							    'name'        => 'nv_type',
							    'id'          => 'ens',
							    'value'       => 'ens',
							    'checked'	  => $chckEns,
							    );

							$etu = array(
							    'name'        => 'nv_type',
							    'id'          => 'etu',
							    'value'       => 'etu',
							    'checked'	  => $chckEtu,
							    );
						?>

						<?php echo form_open('chngRole/chngRoleAdminDone'); ?>
							<?php 
								echo form_radio($admin);
								echo form_label('Admin', 'admin'); 
								echo "<br><br>";
								echo form_radio($ens);
								echo form_label('Enseignant', 'ens'); 
								echo "<br><br>";
								echo form_radio($etu);
								echo form_label('Etudiant', 'etu'); 
								echo "<br><br>";
				                $blue = array(
				                    'class' => 'btn btn-danger',
				                    'name' => 'submit',
				                    'value' => 'Changer'
				                    );
				                echo form_submit($blue);
					         ?>
						<?php echo form_close(); ?>
		            </div>
		        </div>
		    </div>
		</div>
	</div>	


	<!-- footer -->
    <footer class="container-fluid bg-4 text-center navbar-fixed-bottom">
        <?php $this->load->view('footer'); ?>
    </footer>
</body>
</html>