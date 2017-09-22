<?php
class stds extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function add(){
		$sch_id= $this->session->userdata('sch_id');
		$data['classes'] = $this->Course_model->get_class($sch_id);

		$this->form_validation->set_rules('stfname','firstname', 'trim|required|min_length[4]');
		
		$this->form_validation->set_rules('stlname','last name', 'required');
		$this->form_validation->set_rules('stdob','date of birth', 'required');
		$this->form_validation->set_rules('stparent','parent info', 'required');
		$this->form_validation->set_rules('stid','student id', 'required');
		$this->form_validation->set_rules('stpass','password', 'required');
		$this->form_validation->set_rules('staddr','tel and addr', 'required');

		if($this->form_validation->run() == FALSE){
			//view
			$data['main_content'] = 'admin/stds/add';
  			$this->load->view('layouts/main', $data);
		}else{
			//create data array
			$data = array(
					'st_first_name' => $this->input->post('stfname'),
					'st_last_name' => $this->input->post('stlname'),
					'st_middle_name' => $this->input->post('stmname'),
					'dob' => $this->input->post('stdob'),
					'parent'   => $this->input->post('stparent'),
					'idno'  => $this->input->post('stid'),
					'st_passhash' => md5($this->input->post('stpass')),
					'st_passnohash' => $this->input->post('stpass'),
					'sch_id_std'   => $this->input->post('sch_id'),
					'class_id' => $this->input->post('class_id'),
					'p_info' => $this->input->post('staddr')
				  );

					//Articles Table insert
			$this->User_model->insert_stds($data);
					//create Message
			$this->session->set_flashdata('student_saved','New student has been saved!!!');

			//redirect
			redirect('admin/stds/add');
		}

	}

	public function edit($id){
			$sch_id= $this->session->userdata('sch_id');
			$data['std'] = $this->User_model->get_std($id);
			$data['classes'] = $this->Course_model->get_class($sch_id);

		$this->form_validation->set_rules('stfname','firstname', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('stlname','last name', 'required');
		$this->form_validation->set_rules('stdob','date of birth', 'required');
		$this->form_validation->set_rules('stparent','parent info', 'required');
		$this->form_validation->set_rules('stid','student id', 'required');
		$this->form_validation->set_rules('stpass','password', 'required');
		$this->form_validation->set_rules('staddr','tel and addr', 'required');

		if($this->form_validation->run() == FALSE){
			//view
			$data['main_content'] = 'admin/stds/edit';
  			$this->load->view('layouts/main', $data);
		}else{
			//create data array
			$data = array(
					'st_first_name' => $this->input->post('stfname'),
					'st_last_name' => $this->input->post('stlname'),
					'st_middle_name' => $this->input->post('stmname'),
					'dob' => $this->input->post('stdob'),
					'parent'   => $this->input->post('stparent'),
					'idno'  => $this->input->post('stid'),
					'st_passhash' => md5($this->input->post('stpass')),
					'st_passnohash' => $this->input->post('stpass'),
					'sch_id_std'   => $this->input->post('sch_id'),
					'class_id' => $this->input->post('class_id'),
					'p_info' => $this->input->post('staddr')
				  );

			$this->User_model->update_std($sch_id,$data, $id);

			//create message

			$this->session->set_flashdata('std_updated', 'student info has been saved!!!');

			//redirect
			redirect('admin/welcome/allstds');
		}


	}
	public function delete($id){
		   $sch_id= $this->session->userdata('scho_id');
			$this->User_model->delete_std($sch_id,$id);

			//create a message
			$this->session->set_flashdata('std_deleted', 'One student has been deleted');

			//redirect
			redirect('admin/welcome/allstds');
	}
}