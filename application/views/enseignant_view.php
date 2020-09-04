<?php include_once('header_ens.php'); ?>
</div>
</nav>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Enseignant Page</title>
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icons/favicon.ico"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container" style="background-image:url('<?php echo base_url();?>assets/images/crayon.jpg');">

	<h2>Vos Modules</h2>

	<?php 

		foreach ($ModuleInfo->result() as $row) {
			# code...
			echo "<h3>";
				echo "<ul>";
					echo "<li>";
						echo $row->intitule_module;
					echo "</li>";
				echo "</ul>";
				echo "</h3>";
		}
	?>
	<hr>
		<h2>Liste des seances :</h2>
		<br>           
		<center>
		<table class="table table-dark" border="1px">
	    	<thead>
	    		<tr>
	        		<th>Module</th>
	        		<th>Date seance</th>
	        		<th>Heure debut</th>
	        		<th>Heure fin</th>
	        		<th>Type seance</th>
	        		<th>Absence</th>
	      		</tr>
	    	</thead>
	    	<tbody>
				<?php
					foreach ($SeanceInfo->result() as $row)
					{
						echo "<tr>";
					        echo "<td>" . $row->intitule_module . "</td>";
					        echo "<td>" . $row->date_seance . "</td>";
					        echo "<td>" . $row->heure_debut . "</td>";
					        echo "<td>" . $row->heure_fin . "</td>";
					        echo "<td>" . $row->type_seance . "</td>";


					         ?> <td>


					        <button type="button" class="btn btn-default btn-sm">		        
									    <span  aria-hidden="true" type="button" data-toggle="modal" data-target="#modalRegisterForm">Afficher</span>
									</button>

									
							</td><?php

					        ?>
					        		<?php  $attributes = array("name" => "selectAbSeaForm", "class" => "form-inline");
        echo form_open("absence/abSeance", $attributes);?>
					        									<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
																  aria-hidden="true">
																  <div class="modal-dialog" role="document">
																    <div class="modal-content">
																      <div class="modal-header text-center">
																        <h4 class="modal-title w-100 font-weight-bold">Gestion des absences</h4>
																        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																          <span aria-hidden="true">&times;</span>
																        </button>
																      </div>
																      <div class="modal-body mx-3">
																        <div class="md-form mb-5">
																          <i class="fas fa-user prefix grey-text"></i>
																          <label data-error="wrong" data-success="right" for="date_sea">Date de Seance</label>
																          <input type="date" name="date_sea" class="form-control validate" value="<?php echo $row->date_seance ?>">
																        </div>
																        <div class="md-form mb-5">
																          <i class="fas fa-envelope prefix grey-text"></i>
																          <label data-error="wrong" data-success="right" for="heure_deb">Heure debut </label>
																          <input type="time" name="heure_deb" class="form-control validate" value="<?php echo $row->heure_debut ?>">
																          
																        </div>

																        <div class="md-form mb-4">
																          <i class="fas fa-lock prefix grey-text"></i>
																          <label data-error="wrong" data-success="right" for="heure_fin">heure fin</label>
																          <input type="time" name="heure_fin" class="form-control validate" value="<?php echo $row->heure_fin ?>">
																          
																        </div>

																      </div>
																      <div class="modal-footer d-flex justify-content-center">
																        <button class="btn btn-deep-orange" type="submit" value="Afficher">Afficher</button>
																      </div>
																    </div>
																  </div>
																</div><br><br>
									<?php echo form_close() ?>

					      		
					        <?php 
					    echo "</tr>";
					}
				?>
			</tbody>
  		</table>

	</div>
</div>
</div>
	<hr>

</body>
</html>

<?php include_once('footer.php'); ?>