<?php include_once('header.php') ?>
        </div>
      </nav>
	<div class="container">

	<div class="row">
	    <div class="col-md-6 col-md-offset-3">
	        <?php echo $this->session->flashdata('verify_msg'); ?>
	    </div>
	</div>
		
		<div class="row" style="background-image:url('<?php echo base_url();?>assets/images/role.png');">
		    <div class="col-md-4 col-md-offset-4">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                <h4>Choix du Module</h4>
		            </div>
		            <div class="panel-body">

						<?php $attributes = array("name" => "mdlForm", "class" => "form-inline");
			            echo form_open("AffMdl/AffMdlDone", $attributes);?>

			            <div class="form-group">
			                <label for="cmdl"> Nom du Module </label><br>
			            	<select name="cmdl" class="form-control" size="1">
							    <?php 
								    foreach ($ModuleInfo->result() as $row)
									{
								?>
							    <option value="<?php echo $row->intitule_module; ?>">
								<?php 
									echo $row->intitule_module;
						  echo "</option>";
							    	}
								?>
							</select><hr>
			                <center><input name="submit" type="submit" class="btn btn-primary" value="Affecter" /></center>
			            </div>
						<br><br>
						
			            
			            
			            <?php echo form_close(); ?>
			            <br>
			            <?php echo $this->session->flashdata('msg'); ?>
		            </div>
		        </div>
		    </div>
		</div>

	</div>

	<!-- footer -->
     <footer class="container-fluid bg-4 text-center navbar-fixed-bottom">
          <?php include_once('footer.php'); ?>
     </footer>
</body>
</html>