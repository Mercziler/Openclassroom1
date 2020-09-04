<?php 

	/**
	 * 
	 */
	class pdf_model extends CI_Model
	{


		public function get_all_abs($idUser) {

		// étape 2 : get id_module from affecter table where id = id_ens (les modules affecter a cet ens)
		// étape 3 : get nom_module from Module table à l'aide de id_module
		// étape 4 : get id_etu from Etudier table where id = id_module
		// étape 5 : get * from Etudiant table where id = id_etu
		// étape 6 : get * from seance table where id = id_etu
		// étape 7 : get * from absence table where id = id_etu
			//


		$query = $this->db->query(
			"SELECT DISTINCT module.intitule_module, 
					etudiant.CNE, etudiant.nom_etu , etudiant.prenom_etu, 
					absence.justifiee, absence.comm_abs, 
					seance.date_seance, seance.heure_debut, seance.heure_fin, seance.type_seance
			FROM enseignant, affecter, module, etudier, etudiant, seance, absence
			WHERE affecter.id_user = enseignant.id_user
			AND affecter.id_module = module.id_module
			AND etudier.id_user = etudiant.id_user
			AND seance.id_module = module.id_module
			AND seance.id_seance = absence.id_seance
			AND absence.id_user = etudiant.id_user
			AND enseignant.id_user = '".$idUser."'
			ORDER BY etudiant.nom_etu
			");

		return $query;
	}




	public function all_admin_show() { // kant *

		$query = $this->db->query("SELECT login, nom_admin, prenom_admin, email_admin, access 
									FROM Admin, User 
									WHERE Admin.id_user=User.id_user
									ORDER BY access DESC");

		return $query; 

	}



	public function all_ens_show() {

		$query = $this->db->query("SELECT * FROM Enseignant, User 
									WHERE Enseignant.id_user=User.id_user
									ORDER BY access DESC");

		return $query; 

	}


		public function all_etu_show() { 

		$query = $this->db->query("SELECT * FROM Etudiant, User 
									WHERE Etudiant.id_user=User.id_user
									ORDER BY access DESC");

		return $query; 

	}



		public function all_module_show() {

		$query = $this->db->query("SELECT * FROM Module");

		return $query; 

	}

}

?>