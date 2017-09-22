 <?php
	class User_model extends CI_Model{

		public function register(){
    	$data = array(
    			'sch_name' => $this->input->post('schname'),
    			'sch_username' => $this->input->post('schusername'),
    			'sch_email' => $this->input->post('schemail'),
    			'sch_pass' => md5($this->input->post('schpassword')),
    			'ad_firstname' => $this->input->post('adfname'),
    			'ad_lastname' => $this->input->post('adlname'),
                'ad_username' => $this->input->post('adusername'),
    			'ad_email' => $this->input->post('ademail'),
    			'ad_password' => md5($this->input->post('adpassword'))

    			);
    			$insert = $this->db->insert('all_schools', $data);
    		return $insert;
    }

    public function login($username, $password){

    	//validate

    	$this->db->where('sch_username',$username);
    	$this->db->where('sch_pass',$password);

    	$result = $this->db->get('all_schools');

    	if($result->num_rows() == 1){
    		return $result->row(0)->id;
    	} else{
    		return false;
    	}
    }

    public function adlogin($username, $password){

        //validate

        $this->db->where('ad_username',$username);
        $this->db->where('ad_password',$password);

        $result = $this->db->get('all_schools');

        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else{
            return false;
        }
    }
    public function tlogin($sch_id,$username,$password){
        $dpt='1';
        $this->db->where('sch_id_staff',$sch_id);
        $this->db->where('dpt_id',$dpt);  
        $this->db->where('st_id',$username);
        $this->db->where('st_passhash',$password);
        $result = $this->db->get('all_staff');
        if($result->num_rows() == 1){
            return $result->row(0)->id;
        }else{
            return false;
        }

    }
    // get teacher identification
    public function get_ident($tc_id){
        $this->db->where('id', $tc_id);
       $query =  $this->db->get('all_staff');
       return  $query->row();
    }

    public function get_teachers($sch_id){
        $dpt_id = '1';
        $this->db->where('sch_id_staff',$sch_id);
        $this->db->where('dpt_id',$dpt_id);
        $this->db->select('a.*');
        $this->db->from('all_staff as a');
        

        $query = $this->db->get();
        return $query->result();
    }
    //get all teacher of the school
    public function get_tot_teacher($sch_id){
        $dpt_id = '1';
        $this->db->where('sch_id_staff',$sch_id);
        $this->db->where('dpt_id',$dpt_id);
        $query = $this->db->get('all_staff');
        return $query->num_rows();
    }
    public function get_students($sch_id){
        $this->db->where("sch_id_std",$sch_id);
        $this->db->select('s.*,c.class_name');
        $this->db->from('all_student as s');
        $this->db->join('all_class as c','c.id = s.class_id','left');
       
        $query = $this->db->get();
        return $query->result();
    }
    public function get_tot_stds($sch_id){
        $this->db->where("sch_id_std",$sch_id);
        $query = $this->db->get('all_student');
        return $query->num_rows();
    }
    public function get_classes($sch_id){

        $this->db->where('sch_id_class',$sch_id);
        $this->db->select('c.*,b.st_fname, b.st_mname, b.st_lname');
        $this->db->from('all_class as c');
        $this->db->join('all_staff as b','b.id = c.titu_id','left');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function get_tot_clss($sch_id){
         $this->db->where('sch_id_class',$sch_id);
         $query = $this->db->get('all_class');
         return $query->num_rows();
    }
    public function get_tot_class_crs($sch_id){
         $this->db->where('sch_id_sub',$sch_id);
         $query =$this->db->get('all_subject');
         return $query->result();


    }
    public function get_allcrs($sch_id){
        $this->db->where('sch_id_sub',$sch_id);
        $this->db->select('d.*, b.st_fname, b.st_mname, b.st_lname, b.st_id,c.class_name,a.crs_name');
        $this->db->from('all_subject as d');
        $this->db->join('all_staff as b','b.id = d.staff_id','left');
        $this->db->join('all_class as c','c.id = d.class_id','left')->order_by('class_name');
        $this->db->join('course_list as a','a.id_course = d.subject_id','left');
     
        $query = $this->db->get();
        return $query->result();
    }

    public function get_allstaff($sch_id){
        $this->db->where('sch_id_staff',$sch_id);
        $this->db->select('a.*,b.dept_name');
        $this->db->from('all_staff as a');
        $this->db->join('all_departement as b','b.id = a.dpt_id','left');
     
        $query = $this->db->get();
        return $query->result();
    }
    public function get_staff($sch_id,$id){
        $this->db->where('sch_id_staff',$sch_id);
        $this->db->where('id',$id);
        $query = $this->db->get('all_staff');

        return $query->row();
    } 
    public function update_staff($sch_id,$data, $id){
        $this->db->where('sch_id_staff',$sch_id);
        $this->db->where('id', $id);
        $this->db->update('all_staff',$data);
        return true;
    }

    public function get_alldept(){
        $this->db->select('*');
        $this->db->from('all_departement');
        $query = $this->db->get();
        return $query->result();
    }
    public function insert_staff($data){
        $this->db->insert('all_staff',$data);
        return true;
    }
    public function delete_staff($sch_id,$id){
         $this->db->where('sch_id_staff',$sch_id); 
        $this->db->where('id',$id);
        $this->db->delete('all_staff');
        return true;
    }
    public function insert_stds($data){
        $this->db->insert('all_student',$data);
        return true;
    }
    public function update_std($sch_id,$data,$id){
        $this->db->where('sch_id_std',$sch_id);
        $this->db->where('id',$id);
        $this->db->update('all_student',$data);
        return true;
    }
    public function delete_std($sch_id,$id){
        $this->db->where('sch_id_std',$sch_id); 
        $this->db->where('id',$id);
        $this->db->delete('all_student');
        return true;
    }
    public function get_std($id){
        $this->db->where('id', $id);
        $query = $this->db->get('all_student');
        return $query->row();
    }
    public function get_tc_info($sch_id,$tc_id){
        $this->db->where('sch_id_staff',$sch_id);
        $this->db->where('id',$tc_id);
        $query = $this->db->get('all_staff');
        return $query->row();
    }
    public function update_pass($sch_id,$tc_id,$data){
        $this->db->where('sch_id_staff',$sch_id);
        $this->db->where('id',$tc_id);
        $this->db->update('all_staff',$data);
        return true;
    }

}

?>