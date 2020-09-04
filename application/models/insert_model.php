<?php 
	/**
	 * 
	 */
	class insert_model extends CI_Model
	{
		
		function insert_adm($userData, $adminData)
		{
			# code...
			// insertion dans la table User
		// Si l'insertion dans la table User est effectue avec success
		if ($this->db->insert('user', $userData)) {
			// get last id here :)
			$last_id = $this->db->insert_id();

			// hahaha :D
			$adminData['id_user'] = $last_id;
			
			// insertion dans la table admin
			// Si les données sont inseres avec success dans les deux table retourne TRUE
			if ($this->db->insert('admin', $adminData)) {
				return TRUE;
			} else {
				return FALSE;
			}

		}
	}




	function insert_enseignant($userData, $adminData)
		{
			# code...
			// insertion dans la table User
		// Si l'insertion dans la table User est effectue avec success
		if ($this->db->insert('user', $userData)) {
			// get last id here :)
			$last_id = $this->db->insert_id();

			// hahaha :D
			$adminData['id_user'] = $last_id;
			
			// insertion dans la table admin
			// Si les données sont inseres avec success dans les deux table retourne TRUE
			if ($this->db->insert('enseignant', $adminData)) {
				return TRUE;
			} else {
				return FALSE;
			}

		}
	}


	public function insert_seance($seanceData) {

		// très simple !
		if ($this->db->insert('seance', $seanceData))
			return TRUE;
		else
			return FALSE;

	}



	function insert_module($mdlData){

		if ($this->db->insert('Module', $mdlData))
			return TRUE;
		else
			return FALSE;
	}	



	 function insert_etudiant($userData, $etuData) {
		// insertion dans la table User
		// Si l'insertion dans la table User est effectue avec success
		if ($this->db->insert('user', $userData)) {
			// get last id here :)
			$last_id = $this->db->insert_id();

			// hahaha :D
			$etuData['id_user'] = $last_id;

			// insertion dans la table etudiant
			// Si les données sont inseres avec success dans les deux table retourne TRUE
			if ($this->db->insert('etudiant', $etuData)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
}

?>