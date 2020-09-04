
<!DOCTYPE html>
<html>
<head>
	<title>Convertion HTML</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container"></br>
			<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<tr>
							<th>ID</th>
		        			<th>Module</th>
						</tr>

						<a href=""></a>
						
						<?php 

							foreach ($moduleInfo->result() as $row) {
								# code...
								echo '<tr>
						        	 <td>' . $row->id_module .'</td>
						        	 <td>' . $row->intitule_module.'</td>
						    		</tr>
						    		';
							}


						 ?>
					</table>
			</div>
</div>
		<div>
			<center><button class="btn btn-primary"  id="print">Print this web page</button></center>
		</div>

					<script src="<?php echo base_Url();?>assets/js/printThis.js"></script>
					<script src="<?php echo base_Url();?>assets/js/jquery.min.js"></script>
	
	</body>
	</html>	
	
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
        header: "<h1>Liste des Modules</h1>",               // prefix to html
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
