 <?php
class welcome extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

	public function index(){
		$data['main_content'] = 'admin/welcome/welcome';
  		$this->load->view('layouts/main', $data);
	}

	public function adlogin(){

			$this->form_validation->set_rules('adpassword', 'Password', 'trim|required|min_length[4]|max_length[50]');
    		$this->form_validation->set_rules('adusername', 'Username', 'trim|required|min_length[4]|max_length[20]');

    		 if($this->form_validation->run() == FALSE){
        	//laod view
	        	$data['main_content'] = 'admin/welcome/adlogin';
	  			$this->load->view('layouts/main', $data);

            }else{

    		$username = $this->input->post('adusername');
    		$password = md5($this->input->post('adpassword'));

    		$ad_id = $this->User_model->adlogin($username, $password);

    			// validata user
    		if($ad_id){
    			// create array of user data

    			$data = array(
    					'ad_id'=> $ad_id,
    					'adusername'=> $username,
    					'adlogged_in' => true
    				);
    			//set session userdata
    			$this->session->set_userdata($data);
    			//set message 
    			$this->session->set_flashdata('pass_login', 'you are now logged in your school pannel');
    			redirect('admin/welcome');

    		}else{
    			$this->session->set_flashdata('fail_login', 'your login info has failed');
    			//laod view
	        	$data['main_content'] = 'admin/welcome/adlogin';
	  			$this->load->view('layouts/main', $data);
    		}
    	}
     }

     public function alltcrs(){
     	$sch_id = $this->session->userdata('sch_id');

     	$data['teachers'] = $this->User_model->get_teachers($sch_id);
        $data['tcrs_tot'] = $this->User_model->get_tot_teacher($sch_id);

     	$data['main_content'] = 'admin/welcome/alltcrs';
  		$this->load->view('layouts/main', $data);
     }

     public function allstds(){
     		$sch_id = $this->session->userdata('sch_id');
     		$data['students'] = $this->User_model->get_students($sch_id);
            $data['stds_tot'] = $this->User_model->get_tot_stds($sch_id);
     		$data['main_content'] = 'admin/welcome/allstds';
  		    $this->load->view('layouts/main', $data);
     }
     public function allclss(){
     	$sch_id = $this->session->userdata('sch_id');
     		$data['classes'] = $this->User_model->get_classes($sch_id);
            $data['titus'] = $this->Class_model->get_titu($sch_id);
            $data['clss_tot'] = $this->User_model->get_tot_clss($sch_id);
            $data['crs_tots'] = $this->User_model->get_tot_class_crs($sch_id);
     		$data['main_content'] = 'admin/welcome/allclss';
  		    $this->load->view('layouts/main', $data);

     }
     public function allcrs(){
     	$sch_id = $this->session->userdata('sch_id');
     		$data['courses'] = $this->User_model->get_allcrs($sch_id);
     		$data['main_content'] = 'admin/welcome/allcrs';
  		    $this->load->view('layouts/main', $data);
     }

     public function allstaff(){
     	$sch_id = $this->session->userdata('sch_id');
     	$data['staffs'] = $this->User_model->get_allstaff($sch_id);
     		$data['main_content'] = 'admin/welcome/allstaff';
  		    $this->load->view('layouts/main', $data);

     }
     public function staff(){
		$sch_id = $this->session->userdata('sch_id');
		//print_r($this->session->userdata());
		$data['main_content'] = 'admin/welcome/staff';
  		$this->load->view('layouts/main', $data);
	}
    public function allper(){
        $sch_id = $this->session->userdata('sch_id');
        $data['periods'] = $this->School_model->allper($sch_id);
        $data['accesses']  = $this->School_model->acc_period($sch_id);
        $data['main_content'] = 'admin/welcome/allper';
        $this->load->view('layouts/main', $data);
    }
    public function all_t(){
        $sch_id = $this->session->userdata('sch_id');
        $data['allttitu'] = $this->School_model->alltitu($sch_id);

        //view
        $data['main_content'] = 'admin/welcome/all_t';
        $this->load->view('layouts/main', $data);
    }

}