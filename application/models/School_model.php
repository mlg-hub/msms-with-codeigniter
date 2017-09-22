 <?php
	class School_model extends CI_Model{

		public function insert_period($data){
			$this->db->insert('period_records',$data);
			return true;
		}
		public function allper($sch_id){
			$this->db->where('sch_id_per_rec', $sch_id);
			$this->db->select('*');
			$this->db->from('period_records');
			$query = $this->db->get();
			return $query->result();
		}

		public function acc_period($sch_id){
			$status = '1';
			$this->db->where('sch_id_per_rec', $sch_id);
			$this->db->where('access_status',$status);
			$query = $this->db->get('period_records');
			return $query->result();
		}
		public function set_access($sch_id,$status,$data){
			$this->db->where('sch_id_per_rec', $sch_id);
			$this->db->where('id',$status);
			$this->db->update('period_records',$data);
			return true;
		}
		public function inacc($sch_id,$id,$data){
			$this->db->where('sch_id_per_rec', $sch_id);
			$this->db->where('id',$id);
			$this->db->update('period_records',$data);
			return true;
		}
		public function update_period($sch_id,$id,$data){
			$this->db->where('sch_id_per_rec',$sch_id);
			$this->db->where('id',$id);
			$this->db->update('period_records',$data);
			return true;
		}
		public function single_per($id,$sch_id){
			$this->db->where('sch_id_per_rec', $sch_id);
			$this->db->where('id',$id);
			$query = $this->db->get('period_records');
			return $query->row();

		}
		public function delete_period($sch_id,$id){
			$this->db->where('sch_id_per_rec', $sch_id);
			$this->db->where('id',$id);
			 $this->db->delete('period_records');
			 return true;
		}
		public function insert_marks($data){
			$this->db->insert('perform_record',$data);
			return true;
		}
		public function checkmarks($sch_id,$std_id,$class_id,$sub_id){
			$acc = '1';
			$this->db->where('sch_id_rec',$sch_id);
			$this->db->where('sub_id',$sub_id);
			$this->db->where('clss_id',$class_id);
			$this->db->where('std_id',$std_id);
			$this->db->select('a.*,b.id,b.access_status');

			$this->db->from('perform_record as a');
			$this->db->join('period_records as b','b.id = a.period_id','left');
			$this->db->where('b.access_status',$acc);

			$query = $this->db->get();
			return $query->row();
		}

		public function update_edit_process_marks($sch_id,$std_id,$class_id,$sub_id,$data){
			$this->db->where('sch_id_rec',$sch_id);
			$this->db->where('std_id',$std_id);
			$this->db->where('clss_id',$class_id);
			$this->db->where('sub_id',$sub_id);
			$this->db->update('perform_record',$data);
			return true;
		}
		public function set_active($sch_id,$std_id,$class_id,$sub_id,$data){
			$this->db->where('sch_id_rec',$sch_id);
			$this->db->where('std_id',$std_id);
			$this->db->where('clss_id',$class_id);
			$this->db->where('sub_id',$sub_id);
			$this->db->update('perform_record',$data);
			return true;
		}
	}

 ?>