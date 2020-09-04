<?php include_once('header.php') ?>
<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icons/favicon.ico"/>

        </div>
      </nav>


    <div class="row" style="background-image:url('<?php echo base_url();?>assets/images/back.jpg');">
      <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4>Creation d'un compte admin</h4>
              </div>
              <div class="panel-body">
                  <?php $attributes = array("name" => "insertAdminForm");
                  echo form_open("Operation/insertAdmin", $attributes);?>
                  
                  <div class="form-group">
                      <label for="name">Pseudo *</label>
                      <input class="form-control" name="pseudo" placeholder="Pseudo" type="text" value="<?php echo set_value('pseudo'); ?>" />
                      <span class="text-danger"><?php echo form_error('pseudo'); ?></span>
                  </div>

                  <div class="form-group">
                      <label for="subject">Password *</label>
                      <input class="form-control" name="password" placeholder="Password" type="password" />
                      <span class="text-danger"><?php echo form_error('password'); ?></span>
                  </div>
          
          <div class="form-group">
                      <label for="name">Prenom</label>
                      <input class="form-control" name="fname" placeholder="Prenom" type="text" value="<?php echo set_value('fname'); ?>" />
                      <span class="text-danger"><?php echo form_error('fname'); ?></span>
                  </div>

                  <div class="form-group">
                      <label for="name">Nom</label>
                      <input class="form-control" name="lname" placeholder="Nom" type="text" value="<?php echo set_value('lname'); ?>" />
                      <span class="text-danger"><?php echo form_error('lname'); ?></span>
                  </div>
                  
                  <div class="form-group">
                      <label for="email">Email *</label>
                      <input class="form-control" name="email" placeholder="Email" type="text" value="<?php echo set_value('email'); ?>" />
                      <span class="text-danger"><?php echo form_error('email'); ?></span>
                  </div>

                  <div class="form-group">
                      <input name="submit" type="submit" class="btn btn-primary" value="Inserer" />
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
</form>
</br>
<?php include_once('footer.php'); ?>
