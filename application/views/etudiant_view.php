<?php include_once('header_etu.php'); ?>


        </div>
      </nav>



<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Etudiant Page</title>
	<style type="text/css">
	.container {
		margin-bottom: 25px;
	}
	</style>
</head>
<body>

	<div class="container">
	
		<!-- header -->
		<hr/>

	<center>
		
		<!-- ADD here les infos de l'etudiant ;) please  DONE-->
		<?php $info_etu = $etuAbsInfo->row(0) ?>
		<h3>L'étudiant <b><?php echo $info_etu->nom_etu ." ". $info_etu->prenom_etu; ?></b></h3>
		<div class="col-md-6 col-md-offset-3 well">
			<?php $img = '<img src="' . base_url($info_etu->photo_etu) . '" height="250" width="250" class="pull-left" >';?>

			<?php echo $img; ?>

			<p>CNE : <b><?php echo $info_etu->CNE; ?></b></p>
			<p>Nom : <b><?php echo $info_etu->nom_etu; ?></b></p>
			<p>Prenom : <b><?php echo $info_etu->prenom_etu; ?></b></p>
			<p>Date de naissance : <b><?php echo $info_etu->date_naiss_etu; ?></b></p>
			<p>Ville de naissance : <b><?php echo $info_etu->ville_naiss_etu; ?></b></p>
			<p>Adresse : <b><?php echo $info_etu->adresse_etu; ?></b></p>
			<p>Ville : <b><?php echo $info_etu->ville_etu; ?></b></p>
			<p>Email : <b><?php echo $info_etu->email_etu; ?></b></p>
			<p>Telephone : <b><?php echo $info_etu->phone_etu; ?></b></p>
		</div>

		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

		<!-- Si il n'y a pas d'absence id_absence va etre vide ;) donc je l'exploit-->		
		<?php if(!empty($etuAbsInfo->row(0)->id_absence)): ?>

			<h3><b><?php echo $info_etu->nom_etu ." ". $info_etu->prenom_etu; ?></b></h3>
			<br>           
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
						// var_dump($etuAbsInfo->result());
						foreach ($coursInfo->result() as $row)
						{
							echo "<tr>";
						        echo "<td>" . $row->intitule_module . "</td>";
						        echo "<td>" . $row->date_seance . "</td>";
						        echo "<td>" . $row->heure_debut . "</td>";
						        echo "<td>" . $row->heure_fin . "</td>";
						        echo "<td>" . $row->type_seance . "</td>";
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
				<?php echo "Nombre Total d'absences: " . $coursInfo->num_rows(); ?>

		<?php else : ?>
				<br>
				<?php echo "Nombre Total d'absences: 0"; ?>
		<?php endif; ?>
	</center>
	</div>

	<!-- footer -->
	<?php $this->load->view('footer.php'); ?>
	
</body>
</html>