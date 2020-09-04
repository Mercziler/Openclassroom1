<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class logout extends CI_Controller {

		
		public function index(){

			$this->session->sess_destroy();

	    		 header("location:http://localhost:81/Openclassroom/index.php");
	    		 exit();

		}
	}
	?>
	