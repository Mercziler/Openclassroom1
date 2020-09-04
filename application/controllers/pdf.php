<?php 

defined('BASEPATH') or exit('NO direct script access allowed');

class pdf extends CI_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pdf_model');

		//$this->load->library('session');

	}

		public function index(){

			$idUser = $this->session->userdata('idUser');

			//echo "$idUser";

			$data['infoabsence'] = $this->pdf_model->get_all_abs($idUser);

			$this->load->view('pdf_view',$data);
		}


		public function admin(){

			$data['adminInfo'] = $this->pdf_model->all_admin_show();
			$this->load->view('Adminpdf',$data);
		}


		public function enseignant(){

			$data['ensInfo'] = $this->pdf_model->all_ens_show();
			$this->load->view('enseignant_pdf',$data);
		}


		public function etudiant(){

			$data['etuInfo'] = $this->pdf_model->all_etu_show();
			$this->load->view('etudiant_pdf',$data);

		}

				public function module(){

			$data['moduleInfo'] = $this->pdf_model->all_module_show();
			$this->load->view('module_pdf',$data);

		}

}

?>