<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
		//$posts =  $this->user->getPosts();
		//$this->load->view('welcome_message',['posts'=>$posts]);
	}



	//

	public function save(){
		$this->form_validation->set_rules('login','login','required');
		$this->form_validation->set_rules('Password','Password','required');
		$this->form_validation->set_rules('type_user','type_user','required');
		$this->form_validation->set_rules('Access','Access','required');

		if ($this->form_validation->run()) {
			# code...
			//echo "Success";
			$data = $this->input->post();
			unset($data['envoyer']);
			/*echo "<pre>";
			print_r($data);
			echo "</pre>";*/
			$this->load->model('user');
			if($this->user->addPost($data)){
				$this->session->set_flashdata('msg','Message envoyer');

			}else{
				$this->session->set_flashdata('msg','Failed');
			}
			return redirect('welcome');

		}else{
			//echo validation_errors();
			$this->load->view('user');
		}

	}

	

	


	public function enreg_admin(){
		//$this->load->view('enreg_admin');


		$this->form_validation->set_rules('nom_admin','nom_admin','required');
		$this->form_validation->set_rules('prenom_admin','prenom_admin','required');
		$this->form_validation->set_rules('email_admin','email_admin','required');

		if ($this->form_validation->run()) {
			# code...
			$data = $this->input->post();
			unset($data['envoyer']);
			$this->load->model('user');

			if ($this->user->add_admin($data)) {
				# code...
				$this->session->set_flashdata('msg','Message envoyer');
			}else{
				$this->session->set_flashdata('msg','Failed');
			}
			return redirect('welcome');
		}else{
			$this->load->view('user');
		}
	}

 
 public function logout(){

 	$this->load->view('login');
 }

}
