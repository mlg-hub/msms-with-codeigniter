 <?php
	class Course_model extends CI_Model{

		public function get_course_list(){
			$this->db->select('*');
			$this->db->from('course_list');
			$query = $this->db->get();
			return $query->result();
		}

		public function get_max(){
			$this->db->select('*');
			$this->db->from('max_list');
			$query = $this->db->get();
			return $query->result();
		}
		public function get_class($sch_id){
			$this->db->where('sch_id_class',$sch_id);
			$this->db->select('*');
			$this->db->from('all_class');
			$query = $this->db->get();
			return $query->result();
		}
		public function get_allclass(){
			$this->db->select('*');
			$this->db->from('class_list');
			$query = $this->db->get();
			return $query->result();
		}
		public function get_teachers($sch_id){
			$data = '1';
			$this->db->where('sch_id_staff',$sch_id);
			$this->db->where('dpt_id',$data);
			$query = $this->db->get('all_staff');
			return $query->result();
		}
		public function insert_course($data){
			$this->db->insert('all_subject',$data);
        	return true;
		}
		public function get_course($sch_id,$id){
			$this->db->where('sch_id_sub',$sch_id);
			$this->db->where('id',$id);
			$this->db->select('a.*,b.crs_name');
			$this->db->from('all_subject as a');
			$this->db->join('course_list as b','b.id_course = a.subject_id','left');
			$query = $this->db->get();
			return $query->row();
		}
		public function update_course($sch_id,$data,$id){
			 $this->db->where('sch_id_sub',$sch_id);
	        $this->db->where('id', $id);
	        $this->db->update('all_subject',$data);
	        return true;
		}
		public function delete_course($sch_id,$id){
        $this->db->where('sch_id_sub',$sch_id); 
        $this->db->where('id',$id);
        $this->db->delete('all_subject');
        return true;
    }
    	public function get_tc_course($sch_id,$tc_id){
    		$this->db->where('sch_id_sub',$sch_id);
    		$this->db->where('staff_id',$tc_id);
    		$this->db->select('a.*,b.crs_name');
    		$this->db->from('all_subject as a');
    		$this->db->join('course_list as b','b.id_course = a.subject_id','left');
    		$this->db->group_by('subject_id');
    		$query = $this->db->get();
    		return $query->result();
    	}
    	public function get_theacc_per($sch_id){
    		$acc = '1';
    		$this->db->where('sch_id_per_rec',$sch_id);
    		$this->db->where('access_status',$acc);
    		$query = $this->db->get('period_records');
    		return $query->result();
    	}

	}

 ?>