 <?php
	class Class_model extends CI_Model{

		public function insert_class($data){
			$this->db->insert('all_class',$data);
        	return true;
		}
		public function get_class($sch_id, $id){
			$this->db->where('sch_id_class',$sch_id);
			$this->db->where('id',$id);
			$query = $this->db->get('all_class');
			return $query->row();
		}
		public function update_class($sch_id,$data,$id){
			 $this->db->where('sch_id_class',$sch_id);
	        $this->db->where('id', $id);
	        $this->db->update('all_class',$data);
	        return true;
		}
		public function delete_class($sch_id,$id){
        $this->db->where('sch_id_class',$sch_id); 
        $this->db->where('id',$id);
        $this->db->delete('all_class');
        return true;
    }
    	public function get_course_class($sch_id, $tc_id){
    		$this->db->where('staff_id',$tc_id);
    		$this->db->where('sch_id_sub',$sch_id);
    		$this->db->select('c.crs_name,a.class_id,b.class_name,a.max_cat,a.max_exam');
    		$this->db->from('all_subject as a');
    		$this->db->join('all_class as b','b.id = a.class_id','left');
    		$this->db->join('course_list as c','c.id_course = a.subject_id');
    		$query = $this->db->get();
    		 return $query->result();
    	}
    	//used for teacher to get all the student for a particular course
    	public function get_class_std($sch_id,$class_id){
    		$this->db->where('sch_id_std',$sch_id);
    		$this->db->where('class_id',$class_id);
    		$this->db->select('*');
    		$this->db->from('all_student');
    		$query = $this->db->get();
    		return $query->result();
    	}
        //get for the report
        public function get_class_std_report($sch_id,$class_id){
            $this->db->where('sch_id_std',$sch_id);
            $this->db->where('class_id',$class_id);
            $this->db->select('*');
            $this->db->from('all_student');
            $query = $this->db->get();
            return $query->result();

        }
        public function get_std_marks($sch_id,$class_id,$sub_id){
            $acc = '1';
            $this->db->where('sch_id_rec',$sch_id);
            $this->db->where('clss_id',$class_id);
            $this->db->where('sub_id',$sub_id);
            $this->db->where('b.access_status',$acc);
            $this->db->select('a.*,b.term,b.year,c.idno,c.st_first_name,c.st_middle_name,c.st_last_name');
            $this->db->from('perform_record as a');
            $this->db->join('period_records as b','b.id = a.period_id','left');
            $this->db->join('all_student as c','c.id = a.std_id','left');

            $query = $this->db->get();
            return $query->result();   
        }
    	public function get_std_info($sch_id,$std_id){
    		$this->db->where('sch_id_std',$sch_id);
    		$this->db->where('id',$std_id);
    		$query = $this->db->get('all_student');
    		return $query->row();

    	} 
    	public function get_max($sch_id,$sub_id,$class_id){
    		$this->db->where('sch_id_sub',$sch_id);
    		$this->db->where('subject_id',$sub_id);
    		$this->db->where('class_id',$class_id);
    		$query =$this->db->get('all_subject');

    		return $query->row(); 
    	}
    	public function get_classname($sch_id,$class_id){
    		$this->db->where('sch_id_class',$sch_id);
    		$this->db->where('id',$class_id);
    		$query = $this->db->get('all_class');
    		return $query->row();
    	}
        public function get_titu($sch_id){
            $status = '0';
            $this->db->where('sch_id_titu',$sch_id);
            $this->db->where('status_titu',$status);
            $this->db->select('a.*,b.class_name,c.st_fname,c.st_mname,c.st_lname');
           $this->db->from('all_titulaire as a');
           $this->db->join('all_class as b','b.id = a.class_id_titu','left');
           $this->db->join('all_staff as c','c.id = a.staff_id_titu','left');
           $query = $this->db->get();
           return $query->result();
        }
        public function get_staff_titu($sch_id){
            $dpt = '1';
            $this->db->where('sch_id_staff',$sch_id);
            $this->db->where('dpt_id',$dpt);
            $this->db->select('a.id,a.st_fname,a.st_mname,a.st_lname');
            $this->db->from('all_staff as a');
            $query = $this->db->get();
            return $query->result();

        }

        public function get_class_titu($sch_id,$tc_id){
            $this->db->where('sch_id_class',$sch_id);
            $this->db->where('titu_id',$tc_id);
            $query = $this->db->get('all_class');
            return $query->result();
        }
        public function get_thestd($sch_id,$std_id){
            $status = '1';
            $this->db->where('sch_id_rec',$sch_id);
            $this->db->where('std_id',$std_id);
            $this->db->where('status',$status);
            $this->db->select('a.*,b.name,c.crs_name,d.term,d.year,e.st_first_name,e.st_middle_name,e.st_last_name');
            $this->db->from('perform_record as a');
            $this->db->join('course_list as c','c.id_course = a.sub_id','left');
            $this->db->join('class_list as b','b.id = a.clss_id','left');
            $this->db->join('period_records as d','d.id = a.period_id')->where('access_status','1');
            $this->db->join('all_student as e','e.id = a.std_id','left');
            
          $query = $this->db->get();
          return $query->result();

        }
        public function thestdident($sch_id,$std_id){
            $this->db->where('sch_id_std',$sch_id);
            $this->db->where('id',$std_id);
            $this->db->select('a.st_first_name,a.st_middle_name,a.st_last_name,a.idno');
            $this->db->from('all_student as a');
           $query = $this->db->get();
           return $query->row();
        }

        public function set_std_vis($sch_id,$std_id,$sub_id,$data){
             $this->db->where('sch_id_rec',$sch_id);
             $this->db->where('std_id',$std_id);
             $this->db->where('sub_id',$sub_id);
             $this->db->update('perform_record',$data);
             return true;

        }
        public function set_std_unvis($sch_id,$std_id,$sub_id,$data){
             $this->db->where('sch_id_rec',$sch_id);
             $this->db->where('std_id',$std_id);
             $this->db->where('sub_id',$sub_id);
             $this->db->update('perform_record',$data);
             return true;

        }
        public function set_pa_vis($sch_id,$std_id,$sub_id,$data){
             $this->db->where('sch_id_rec',$sch_id);
             $this->db->where('std_id',$std_id);
             $this->db->where('sub_id',$sub_id);
             $this->db->update('perform_record',$data);
             return true;

        }
        public function set_pa_unvis($sch_id,$std_id,$sub_id,$data){
             $this->db->where('sch_id_rec',$sch_id);
             $this->db->where('std_id',$std_id);
             $this->db->where('sub_id',$sub_id);
             $this->db->update('perform_record',$data);
             return true;

        }

	}

 ?>