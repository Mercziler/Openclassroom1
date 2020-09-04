<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class admin extends CI_Controller
{
	
		public function index() {

			// Limiter l'access

				$this->load->model('show_model');

				// all_etu_show() retourne tt les infos sur les etudiants
				$data['etuInfo'] = $this->show_model->all_etu_show();

				// all_ens_show() retourne tt les infos sur les enseignants
				$data['ensInfo'] = $this->show_model->all_ens_show();

				// all_admin_show() retourne tt les infos sur les admins
				$data['adminInfo'] = $this->show_model->all_admin_show();

				// all_module_show() retourne tt les infos sur les modules
				$data['moduleInfo'] = $this->show_model->all_module_show();

				// choix (role) de radio botton (jebnaha mn name d radio button)
				$data['role'] = $this->input->post('type');

				// on passe les données obtenues a "admin_view"
				$this->load->view('Acceuil-admin', $data);

				//header('location:http://localhost:81/Openclassroom/index.php/Admin/');

			} 

		}

?>