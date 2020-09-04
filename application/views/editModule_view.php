<!DOCTYPE html>
<html>

<?php include_once('header.php') ?>
<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icons/favicon.ico"/>

        </div>
      </nav>

	<div class="row">
	    <div class="col-md-6 col-md-offset-3">
	        <?php echo $this->session->flashdata('verify_msg'); ?>
	    </div>
	</div>


	<div class="row" style="background-image:url('<?php echo base_url();?>assets/images/back.jpg');">
	    <div class="col-md-6 col-md-offset-3">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h4>Modification du nom du module</h4>
	            </div>
	            <div class="panel-body">
	                <?php $attributes = array("name" => "editMdlForm");
	                echo form_open("edit/editMdl", $attributes);?>
	                
	                <div class="form-group">
	                    <label for="name">Nom du Module *</label>
	                    <input class="form-control" name="mname" placeholder="Nom du Module" type="text" value="<?php echo $fillMdlInfo['intitule_module']; ?>" /> 
	                    <span class="text-danger"><?php echo form_error('mname'); ?></span>
	                </div>
	                
	                <div class="form-group">
	                    <input name="submit" type="submit" class="btn btn-primary" value="Update" />
	                    <input name="cancel" type="reset" class="btn btn-default" value="Cancel" />
	                </div>
	                <?php echo form_close(); ?>
	                <?php echo $this->session->flashdata('msg'); ?>
	            </div>
	        </div>
	    </div>
	</div>
</div>
</div>
	<!-- footer -->
     <footer class="container-fluid bg-4 text-center navbar-fixed-bottom">
          <?php $this->load->view('footer.php'); ?>
     </footer>
</body>
</html>