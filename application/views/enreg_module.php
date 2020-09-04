<?php include_once('header.php') ?>;
<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icons/favicon.ico"/>

        </div>
      </nav>

  <div class="row" >
      <div class="col-md-6 col-md-offset-3">
          <?php echo $this->session->flashdata('verify_msg'); ?>
      </div>
  </div>

  <div class="row" style="background-image:url('<?php echo base_url();?>assets/images/back.jpg');">
      <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h4>Creation d'un Module</h4>
              </div>
              <div class="panel-body">
                  <?php $attributes = array("name" => "insertModuleForm");
                  echo form_open("Operation/insert_module", $attributes);?>
                  
                  <div class="form-group">
                      <label for="name">Nom du Module *</label>
                      <input class="form-control" name="mname" placeholder="Nom du Module" type="text" value="<?php echo set_value('mname'); ?>" />
                      <span class="text-danger"><?php echo form_error('mname'); ?></span>
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