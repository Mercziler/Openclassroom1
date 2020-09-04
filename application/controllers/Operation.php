<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operation extends CI_Controller {



		/*public function index(){
			$this->load->view('enreg_etudiant');
		}*/

	public function admin() {

		$this->load->view('Enregistrement_admin');

	}
			public function enseignant(){
		$this->load->view('enreg_enseignant');
	}

	
	public function module(){
		$this->load->view('enreg_module');
	}


		public function etudiant(){
			$this->load->view('enreg_etudiant');
		}


		public function insertAdmin(){

				$this->load->model('insert_model');

				$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
				//$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|md5'); matches[cpassword]|
				$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email_admin]');

				if ($this->form_validation->run()==FALSE){
					$this->load->view('Enregistrement_admin');
				}else{
					if ($this->input->post('submit') == "Inserer") {
						# code...Remplissage de la table User
						$userData = array(
							'login' => $this->input->post('pseudo'),
							'password' => $this->input->post('password'),
							'type_user' => 'admin',
							'access' => '1'
						);
						#remplissage de la table Admin
						$adminData = array(
							'nom_admin' => $this->input->post('lname'),
							'prenom_admin' => $this->input->post('fname'),
							'email_admin' => $this->input->post('email')
						);

						// insert form data into database
						if ($this->insert_model->insert_adm($userData, $adminData))
						{				
							// successfully
							$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Le nouveau utilisateur est enregistré avec succès !</div>');
							redirect('Operation/insertAdmin');
						}
						else{
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
							redirect('Operation/insertAdmin');
						}
					}
					else{
						redirect('Operation/insertAdmin');
					}

				}
		}




		// fonction d'upload d'image avec un nom random
		private function do_upload($etu,$ens) {

			$type = explode('.', $_FILES["photo"]["name"]);

			$type = strtolower($type[count($type)-1]);

			if($ens)
				$url = "img/ens/".uniqid(rand()).'.'.$type;
			elseif($etu)
				$url = "img/etu/".uniqid(rand()).'.'.$type;

			if(in_array($type, array("jpg", "jpeg", "gif", "png")))

				if(is_uploaded_file($_FILES["photo"]["tmp_name"]))

					if(move_uploaded_file($_FILES["photo"]["tmp_name"],$url))

						return $url;

			return "";
		}





		public function insert_enseignant(){
			
				$this->load->model('insert_model');

				//set validation rules
				$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
				$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('adrs', 'Adresse', 'trim|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('ville', 'Ville', 'trim|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('phone', 'Phone', 'trim|min_length[3]|max_length[30]s');
			

				//validate form input
				if ($this->form_validation->run() == FALSE)
		        {
					// fails
	                $this->load->view('enreg_enseignant');
		        }
		        else
				{
					if ($this->input->post('submit') == "Inserer")
	               	{

						// insert ens registration details into database
						// ce qui va etre inserer dans la table User
						$userData = array(
							'login' => $this->input->post('pseudo'),
							'password' => $this->input->post('password'),
							'type_user' => 'enseignant',
							'access' => '1'
						);

						// get url de l'image
						$etu = false; 
	               		$ens = true;
	               		$url = $this->do_upload($etu, $ens);

						var_dump($url);

						// ce qui va etre inserer dans la table enseignant
						$ensData = array(
							'nom_ens' => $this->input->post('lname'),
							'prenom_ens' => $this->input->post('fname'),
							'adresse_ens' => $this->input->post('adrs'),
							'ville_ens' => $this->input->post('ville'),
							'photo_ens' => $url,
							'email_ens' => $this->input->post('email'),
							'phone_ens' => $this->input->post('phone')
						);

						// insert form data into database
						if ($this->insert_model->insert_enseignant($userData, $ensData))
						{				
							// successfully
							$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Le nouveau utilisateur est enregistré avec succès !</div>');
							redirect('Operation/insert_enseignant');
						}
						else
						{
							// error
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
							redirect('Operation/insert_enseignant');
						}
					}
					else
	               	{
	                    redirect('Operation/insert_enseignant');
	               	}

				}
		}


		public function insert_module(){
			
			$this->load->model('insert_model');

			//set validation rules
				$this->form_validation->set_rules('mname', 'Module name', 'trim|required|min_length[3]|max_length[30]');
				
				//validate form input
				if ($this->form_validation->run() == FALSE)
		        {
					// fails
	                $this->load->view('enreg_module');
		        }
				else
				{
					if ($this->input->post('submit') == "Inserer")
	               	{
						// ce qui va etre inserer dans la table Module
						$mdlData = array(
							'intitule_module' => $this->input->post('mname')
						);

						// insert form data into database
						if ($this->insert_model->insert_module($mdlData))
						{				
							// successfully
							$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Le nouveau module est enregistré avec succès !</div>');
							redirect('Operation/insert_module');
						}
						else
						{
							// error
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
							redirect('Operation/insertModule');
						}
					}
					else
	               	{
	                    redirect('Operation/insert_module');
	               	}
				}
		}




	 function insert_etudiant(){

	 	$this->load->model('insert_model');

				$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
				$this->form_validation->set_rules('cne', 'CNE', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('date_naiss', 'Date Naissance');
				$this->form_validation->set_rules('ville_naiss', 'Ville Naissance ', 'trim|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('adrs', 'Adresse', 'trim|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('ville', 'Ville', 'trim|min_length[3]|max_length[30]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('phone', 'Phone', 'trim|min_length[3]|max_length[30]');


				
				if ($this->form_validation->run() == FALSE)
		        {
					// fails
	                $this->load->view('enreg_etudiant');
		        }
		        else
				{
					if ($this->input->post('submit') == "Inserer")
	               	{

	               		// get url de l'image
	               		$etu = true;
	               		$ens = false;
	               		$url = $this->do_upload($etu,$ens);

						// insert etu registration details into database
						// ce qui va etre inserer dans la table User
						$userData = array(
							'login' => $this->input->post('pseudo'),
							'password' => $this->input->post('password'),
							'type_user' => 'etudiant',
							'access' => '1'
						);

						// insert ens registration details into database
						// ce qui va etre inserer dans la table User
						$userData = array(
							'login' => $this->input->post('pseudo'),
							'password' => $this->input->post('password'),
							'type_user' => 'etudiant',
							'access' => '1'
						);

						// ce qui va etre inserer dans la table etudiant
						$etuData = array(
							'CNE' => $this->input->post('cne'),
							'nom_etu' => $this->input->post('lname'),
							'prenom_etu' => $this->input->post('fname'),
							'date_naiss_etu' => $this->input->post('date_naiss'),
							'ville_naiss_etu' => $this->input->post('ville_naiss'),
							'adresse_etu' => $this->input->post('adrs'),
							'ville_etu' => $this->input->post('ville'),
							'photo_etu' => $url,
							'email_etu' => $this->input->post('email'),
							'phone_etu' => $this->input->post('phone')
						);

						// insert form data into database
						if ($this->insert_model->insert_etudiant($userData, $etuData))
						{				
							// successfully
							$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Le nouveau utilisateur est enregistré avec succès !</div>');
							redirect('Operation/insert_etudiant');
						}
						else
						{
							// error
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
							redirect('Operation/insert_etudiant');
						}
					}
					else
	               	{
	                    redirect('Operation/insert_etudiant');
	               	}	

	            }

        }
    }