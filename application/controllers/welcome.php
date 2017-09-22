<?php
class welcome extends MY_Controller{

	public function index(){

		$data['main_content'] = 'welcome';
  		$this->load->view('layouts/main', $data);
	}

	
	public function register(){
		/*$data['main_content'] = 'register';
  		$this->load->view('layouts/main', $data);*/

    		//school validation rules 
    	$this->form_validation->set_rules('schname', 'school Name', 'trim|required|min_length[2]|max_length[50]');
    	$this->form_validation->set_rules('schusername','school UserName','trim|required|min_length[2]|max_length[20]');
    	$this->form_validation->set_rules('schemail', 'school email', 'trim|required|valid_email');
    $this->form_validation->set_rules('schpassword', 'school password', 'trim|required|min_length[4]|max_length[50]');
    	$this->form_validation->set_rules('schpassword2', 'Confirm Password', 'trim|matches[schpassword]');
    	//admin validation rules
    	$this->form_validation->set_rules('adfname', 'admin FirstName', 'trim|required|min_length[2]|max_length[50]');
    	$this->form_validation->set_rules('adlname', 'admin LastName', 'trim|required|min_length[2]|max_length[50]');
    	$this->form_validation->set_rules('adusername','Admin UserName','trim|required|min_length[2]|max_length[20]');
    	$this->form_validation->set_rules('ademail', 'Admin email', 'trim|required|valid_email');
    $this->form_validation->set_rules('adpassword', 'admin password', 'trim|required|min_length[4]|max_length[50]');
    	$this->form_validation->set_rules('adpassword2', 'Confirm admin Password', 'trim|matches[adpassword]');


    	if( $this->form_validation->run() == FALSE){
    		
    		//load view
    		$data['main_content'] = 'register';
    	$this->load->view('layouts/main', $data);
    	
    	}else{
    		if($this->User_model->register()){
    			$this->session->set_flashdata('registered', 'You are now registered and can login with your admin credentials');
    			redirect('login');	
    		}
    	}
	}

	public function login(){

   			$this->form_validation->set_rules('schpassword', 'Password', 'trim|required|min_length[4]|max_length[50]');
    		$this->form_validation->set_rules('schusername', 'username', 'trim|required|min_length[4]|max_length[20]');

    		 if($this->form_validation->run() == FALSE){
        	//laod view
	        	$data['main_content'] = 'login';
	  			$this->load->view('layouts/main', $data);

            }else{

    		$username = $this->input->post('schusername');
    		$password = md5($this->input->post('schpassword'));

    		$sch_id = $this->User_model->login($username, $password);

    			// validata user
    		if($sch_id){
    			// create array of user data

    			$data = array(
    					'sch_id'=> $sch_id,
    					'sch_username'=> $username,
    					'logged_in' => true
    				);
    			//set session userdata
    			$this->session->set_userdata($data);
    			//set message 
    			$this->session->set_flashdata('pass_login', 'you are now logged in your school pannel');
    			redirect('access');

    		}else{
    			$this->session->set_flashdata('fail_login', 'your login info has failed');
    			//laod view
	        	$data['main_content'] = 'login';
	  			$this->load->view('layouts/main', $data);
    		}
    	}
    }

    public function logout(){
		//unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('sch_id');
		$this->session->unset_userdata('schusername');

		$this->session->sess_destroy();

		//set message
		$this->session->set_flashdata('logged_out','You have been looged out');
		redirect('welcome');

	}

	public function access(){
		//laod view
	        	$data['main_content'] = 'access';
	  			$this->load->view('layouts/main', $data);
	}
}