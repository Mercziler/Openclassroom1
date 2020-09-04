
<?php include_once('header_ens.php'); ?>
</div>
</nav>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Enseignant Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/style.css" ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	

</head>
<body>
	
	<div class="container" style="background-image:url('<?php echo base_url();?>assets/images/crayon.jpg');">

	<hr>
        <?php if ($affTable): ?>

        	<?php // chuuuu ! hna llé3ba XD 
        		$idSea = $TableSeaInfo->row(0)->id_seance;
        		$this->session->set_userdata('idSea', $idSea);
        	?>

			<h2>Info sur la Seance :</h2>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>Module</th>
		        		<th>Date seance</th>
		        		<th>Heure debut</th>
		        		<th>Heure fin</th>
		        		<th>Type seance</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php
						echo "<tr>";
					        echo "<td>" . $TableSeaInfo->row(0)->intitule_module . "</td>";
					        echo "<td>" . $TableSeaInfo->row(0)->date_seance . "</td>";
					        echo "<td>" . $TableSeaInfo->row(0)->heure_debut . "</td>";
					        echo "<td>" . $TableSeaInfo->row(0)->heure_fin . "</td>";
					        echo "<td>" . $TableSeaInfo->row(0)->type_seance . "</td>";
					    echo "</tr>";
					?>
				</tbody>
	  		</table>


			<h2>Liste des etudiants :</h2>
			<center>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>CNE</th>
		        		<th>Nom</th>
		        		<th>Prenom</th>
		        		<th>Affecter une absence</th>
		        		<th>Absence déja affecter</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php  
						// var_dump($etuAbsInfo->result());
						foreach ($TableSeaInfo->result() as $row)
						{
							echo "<tr>";
						        echo "<td>" . $row->CNE . "</td>";
						        echo "<td>" . $row->nom_etu . "</td>";
						        echo "<td>" . $row->prenom_etu . "</td>";
						        ?>
								<td>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								    <button type="button" class="btn btn-default btn-sm">
							        	<a href="AffectAbs?id=<?php echo $row->id_user;?>">
									    <span class="glyphicon glyphicon-flash" aria-hidden="true"></span>
									</button>
								</td>
								<?php
								// $idEtu_chk = $this->session->flashdata('idEtu_chk');

								// maintenant on va remplir la colonne "Absence déja affecter"
								$check_abs = $this->absence_model->check_absence($row->id_seance, $row->id_user);
								// Si l'absence est deja affecter à l'etudiant, on prend l'id de l'etudiant
								if ($check_abs > 0) {
									echo "<td> OUI </td>";
								}else{
									echo "<td></td>";
								}
								echo form_close();
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
				<?php echo "Nombre des Etudiants: " . $TableSeaInfo->num_rows(); ?>
			</center>
        
        <?php else: ?>

			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <?php endif; ?>



		<br>



	</div>
		<!-- footer -->
		
</body>
	
	<!-- Ce petit script pour cacher la partie de justification d'absence et comm -->
	<script type="text/javascript">
		$(".answer").hide();
		$(".abs_question").click(function() {
		    if($(this).is(":checked")) {
		        $(".answer").show(200);
		    } else {
		        $(".answer").hide(300);
		    }
		});
	</script>

</html>
</div>
</div>
<?php include_once('footer.php'); ?>