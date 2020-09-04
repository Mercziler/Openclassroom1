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
	                <h4>Modification d'un compte admin</h4>
	            </div>
	            <div class="panel-body">
	                <?php $attributes = array("name" => "insertAdminForm");
	                echo form_open("edit/editAdmin", $attributes);?>
	                
	                <div class="form-group">
	                    <label for="name">Pseudo *</label>
	                    <input class="form-control" name="pseudo" placeholder="Pseudo" type="text" value="<?php echo $fillAdminInfo['login']; ?>" /> 
	                    <span class="text-danger"><?php echo form_error('pseudo'); ?></span>
	                </div>
	                <div class="form-group">
	                    <label for="name">Prenom</label>
	                    <input class="form-control" name="fname" placeholder="Prenom" type="text" value="<?php echo $fillAdminInfo['nom_admin']; ?>" />
	                    <span class="text-danger"><?php echo form_error('fname'); ?></span>
	                </div>
	                <div class="form-group">
	                    <label for="name">Nom</label>
	                    <input class="form-control" name="lname" placeholder="Nom" type="text" value="<?php echo $fillAdminInfo['prenom_admin']; ?>" />
	                    <span class="text-danger"><?php echo form_error('lname'); ?></span>
	                </div>
	                <div class="form-group">
	                    <label for="email">Email *</label>
	                    <input class="form-control" name="email" placeholder="Email" type="text" value="<?php echo $fillAdminInfo['email_admin']; ?>" />
	                    <span class="text-danger"><?php echo form_error('email'); ?></span>
	                </div>
	                 <div class="form-group">
	                    <input name="submit" type="submit" class="btn btn-primary" value="Update" />
	                    <input name="cancel" type="reset" class="btn btn-default" value="Cancel" />
	                </div>
	                <?php echo $this->session->flashdata('msg'); ?>

	                <?php echo form_close(); ?>
	                
	            </div>
	        </div>
	    </div>
	</div>
</div>
</div>

</body>
</html>
<?php include_once('footer.php'); ?>