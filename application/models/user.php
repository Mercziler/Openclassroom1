<?php 
	/**
	 * 
	 */
	class user extends CI_Model
	{
		
		public function getPosts()
		{
			# code...
			$query = $this->db->get('user');
			if ($query->num_rows() > 0) {
				# code...
				return $query->result();
			}
		}

		public function addPost($data){

			return $this->db->insert('user',$data);
		}


		public function add_admin($data){
				return $this->db->insert('admin',$data);
		}
	}
?>