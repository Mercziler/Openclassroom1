<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class logout extends CI_Controller {

		
		public function index(){

			$this->session->sess_destroy();

	    		 header("location:http://openclassroom1-openclassroom1.127.0.0.1.nip.io/index.php");
	    		 exit();

		}
	}
	?>
	
