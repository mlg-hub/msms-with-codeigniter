<?php
	class Setting_model extends CI_Model{

			//global setting
		public function get_global_settings(){
			$query = $this->db->get('settings');
			$result = $query->result();
			return $result;
		}
	}

 ?>