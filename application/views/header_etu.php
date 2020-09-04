<div style="background-image:url('<?php echo base_url();?>assets/images/crayon.jpg');"><center><h2>Gestion Des Absences</h2></center></div>

<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icons/favicon.ico"/> .
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icons/favicon.ico"/>

  <link href="<?php echo base_url();?>assets/css/simple-sidebar.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/style.css" ?>">

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>




</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"> </div>
      <div class="list-group list-group-flush">

      </div>
    </div>
       <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">derouler</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">

          </ul>

           <ul class="nav nav-pills pull-right" style="margin-top:10px">
        <?php if($this->session->userdata('logged_in')): ?>

                         <?php echo form_open('logout'); ?>

                              <?php 
                                   $blue = array(
                                        'class' => 'btn btn-primary',
                                        'name' => 'submit',
                                        'value' => 'déconnecté'

                                        );
                              ?>

                              <?php if($this->session->userdata('username')): ?>
                                   <?php 
                                        echo "Vous etes connecté en tant que <b>" . $this->session->userdata('username') . "</b>";
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo form_submit($blue); 
                                   ?>
                                   <br><br>
                         <?php echo form_close(); ?>
                                   
                              <?php endif; ?>
                        
                    <!-- Sinon on affiche "login" --> 
                    <?php else: ?>
                         <li class="active"><a href="http://localhost:81/Openclassroom/index.php">Login</a></li>
                    <?php endif; ?>

        </ul> 