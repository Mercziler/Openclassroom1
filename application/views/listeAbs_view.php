
<?php include_once('header_ens.php'); ?>
</div>
</nav>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Enseignant Page</title>
</head>
<body>
	<script src="<?php echo base_Url();?>assets/js/printThis.js"></script>
	<script src="<?php echo base_Url();?>assets/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/select2/dist/css/select2.css" ?>">
	<script src="<?php echo base_Url();?>assets/select2/dist/js/select2.js"></script>

	<div class="container" style="background-image:url('<?php echo base_url();?>assets/images/crayon.jpg');">

		<script>
        $(document).ready(function() { $("#e1").select2(); });
    </script>


	<hr>

        

		<?php if ($EtuAbsInfo) : ?>

			<?php // var_dump($EtuAbsInfo->result()); ?>
			<h2>Les absence de <?php echo $EtuAbsInfo->row(0)->nom_etu; ?>:</h2>
			<center>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>Module</th>
		        		<th>justifiee</th>
		        		<th>Commentaire</th>
		        		<th>date de la seance</th>
		        		<th>heure debut</th>
		        		<th>heure fin</th>
		        		<th>type seance</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php
						foreach ($EtuAbsInfo->result() as $row)
						{
							echo "<tr>";
						        echo "<td>" . $row->intitule_module . "</td>";
						        if ($row->justifiee==1) {
						        	
						        	echo "<td> OUI </td>";
						        }else{
						        	echo "<td> NON </td>";
						        }
						         echo "<td>" . $row->comm_abs . "</td>";
						        echo "<td>" . $row->date_seance . "</td>";
						        echo "<td>" . $row->heure_debut . "</td>";
						        echo "<td>" . $row->heure_fin . "</td>";
						        echo "<td>" . $row->type_seance . "</td>";
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
				<?php echo "Nombre Total des Absences de l'étudiant ". $EtuAbsInfo->row(0)->nom_etu ." : ". $EtuAbsInfo->num_rows(); ?>
				<br><br>

				<br><br>
		</center>
</div>
				<center>
				<div>
					<button type="button" class="btn btn-default btn" id="print">
					    <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
					    Imprimer</a>
					</button>
				</div>
				</center>
				<script >
	$('#print').click(function(){

		$('.container').printThis({
			debug: false,               // show the iframe for debugging
        importCSS: true,            // import parent page css
        importStyle: false,         // import style tags
        printContainer: true,       // print outer container/$.selector
        loadCSS: "http://localhost:81/Openclassroom/index.php/pdf",                // path to additional css file - use an array [] for multiple
        pageTitle: "Impression",              // add title to print page
        removeInline: false,        // remove inline styles from print elements
        removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
        printDelay: 333,            // variable print delay
        header: "",               // prefix to html
        footer: null,               // postfix to html
        base: false,                // preserve the BASE tag or accept a string for the URL
        formValues: true,           // preserve input/form values
        canvas: false,              // copy canvas content
        doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
        removeScripts: false,       // remove script tags from print content
        copyTagClasses: false,      // copy classes from the html & body tag
        beforePrintEvent: null,     // callback function for printEvent in iframe
        beforePrint: null,          // function called before iframe is filled
        afterPrint: null            // function called before iframe is removed
		});
	})
</script>

		<!-- Si allAbsInfo affiche la table de allAbsInfo-->
		<?php else : ?>
			<?php $attributes = array("name" => "selectCNEForm", "class" => "form-inline");
	            echo form_open("enseignant/listeAbs", $attributes);?>

	            <select name="cne" class="form-control" size="1" id="e1">
					    <?php 
						    foreach ($NomEtuAbsInfo->result() as $row)
							{
						?>
					    <option value="<?php echo $row->CNE; ?>">
						<?php 
							echo $row->nom_etu;
				  echo "</option>";
					    	}
						?>
					</select>	            
	                <center><input name="submit" type="submit" class="btn btn-primary" value="Afficher" /></center>

	            <?php echo form_close(); ?>

			<br>

			<h2>Liste des absence :</h2>
			<center>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>Module</th>
		        		<th>CNE</th>
		        		<th>Nom</th>
		        		<th>Prenom</th>
		        		<th>justifiee</th>
		        		<th>Commentaire</th>
		        		<th>date de la seance</th>
		        		<th>heure debut</th>
		        		<th>heure fin</th>
		        		<th>type seance</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php
						foreach ($allAbsInfo->result() as $row)
						{
							echo "<tr>";
						        echo "<td>" . $row->intitule_module . "</td>";
						        echo "<td>" . $row->CNE . "</td>";
						        echo "<td>" . $row->nom_etu . "</td>";
						        echo "<td>" . $row->prenom_etu . "</td>";
						        echo "<td>" . $row->justifiee . "</td>";
						        echo "<td>" . $row->comm_abs . "</td>";
						        echo "<td>" . $row->date_seance . "</td>";
						        echo "<td>" . $row->heure_debut . "</td>";
						        echo "<td>" . $row->heure_fin . "</td>";
						        echo "<td>" . $row->type_seance . "</td>";
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
				<?php echo "Nombre Total des Absences: " . $allAbsInfo->num_rows(); ?>
				<br><br>
				<button type="button" class="btn btn-default btn" >
		        	<a href="http://localhost:81/Openclassroom/index.php/pdf" >
				    <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
				    Export Data</a>
				</button>
				<br><br>
		</center>
	<?php endif; ?>

	</div>
</div>
</div>



	<!-- footer -->
	<?php $this->load->view('footer.php'); ?>
</body>
</html>