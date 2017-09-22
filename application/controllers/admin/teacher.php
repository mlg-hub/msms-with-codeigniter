<?php
class teacher extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function add(){
		$sch_id= $this->session->userdata('sch_id');
		$this->form_validation->set_rules('tfname','First name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('tmname','Middle name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('tlname','last name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('tid','Assign ID', 'required');
		$this->form_validation->set_rules('tpass','Password', 'trim|required|min_length[6]');

		if($this->form_validation->run() == FALSE){
			//view
			$data['main_content'] = 'admin/teacher/add';
  			$this->load->view('layouts/main', $data);
		}else{
			//create data array
			$data = array(
					'st_fname'         => $this->input->post('tfname'),
					'st_mname'          => $this->input->post('tmname'),
					'sch_id'   => $this->input->post('sch_id'),
					'st_id_staff'   => $this->input->post('tid'),
					'st_lname'       => $this->input->post('tlname'),
					'dpt_id'        => $this->input->post('dpt'),
					'st_passhash'        =>md5($this->input->post('tpass')),
					'st_passnohash'        => $this->input->post('tpass')
				  );

					//Articles Table insert
			$this->User_model->insert_staff($data);
					//create Message
			$this->session->set_flashdata('teacher_saved','New teacher has been saved!!!');

			//redirect
			redirect('admin/teacher/add');
		}
	}
	public function edit($id){
		$sch_id= $this->session->userdata('sch_id');
		$data['staff'] = $this->User_model->get_staff($sch_id,$id);
		$this->form_validation->set_rules('tfname','First name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('tmname','Middle name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('tlname','last name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('tid','Assign ID', 'required');
		$this->form_validation->set_rules('tpass','Password', 'trim|required|min_length[6]');

		if($this->form_validation->run() == FALSE){

			$data['staff'] = $this->User_model->get_staff($sch_id,$id);
			//view
			$data['main_content'] = 'admin/teacher/edit';
			$this->load->view('layouts/main',$data);
		}else{
			// create data array

			//create data array
			$data = array(
					'st_fname'         => $this->input->post('tfname'),
					'st_mname'          => $this->input->post('tmname'),
					'sch_id_staff'   => $this->input->post('sch_id'),
					'st_id'   => $this->input->post('tid'),
					'st_lname'       => $this->input->post('tlname'),
					'dpt_id'        => $this->input->post('dpt'),
					'st_passhash'        =>md5($this->input->post('tpass')),
					'st_passnohash'        => $this->input->post('tpass')
				  );

			//Article tables update
			$this->User_model->update_staff($sch_id,$data, $id);

			//create message

			$this->session->set_flashdata('teacher_updated', 'Teacher info has been saved!!!');

			//redirect
			redirect('admin/welcome/alltcrs');
		}
	}

	public function delete($id){
			$sch_id= $this->session->userdata('sch_id');
			$this->User_model->delete_staff($sch_id,$id);

			//create a message
			$this->session->set_flashdata('teacher_deleted', 'One staff has been deleted');

			//redirect

			redirect('admin/welcome/alltcrs');
	}
}