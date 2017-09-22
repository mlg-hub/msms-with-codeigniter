<?php
class staff extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$data['depts'] = $this->User_model->get_alldept();
		$data['main_content'] = 'admin/staff/staff';
  		$this->load->view('layouts/main', $data);
	}
	public function add(){
		$data['depts'] = $this->User_model->get_alldept();

		$sch_id = $this->session->userdata('sch_id');
		$this->form_validation->set_rules('stfname','First name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('stmname','Middle name', 'trim|required');
		$this->form_validation->set_rules('stlname','Lastname', 'required');
		$this->form_validation->set_rules('sch_id','Something', 'required');

		if($this->form_validation->run() == FALSE){
			//view
			$data['main_content'] = 'admin/staff/add';
			$this->load->view('layouts/main',$data);
		}else{
			//create data array
			$data = array(
					'st_fname'         => $this->input->post('stfname'),
					'st_mname'          => $this->input->post('stmname'),
					'sch_id_staff'   => $this->input->post('sch_id'),
					'st_lname'       => $this->input->post('stlname'),
					'dpt_id'        => $this->input->post('departments')
				  );

					//Articles Table insert
			$this->User_model->insert_staff($data);
					//create Message
			$this->session->set_flashdata('staff_saved','New staff has been saved!!!');

			//redirect
			redirect('admin/staff/add');
		
	}
}
	public function edit($id){

		$sch_id= $this->session->userdata('sch_id');
		$data['depts'] = $this->User_model->get_alldept();

		$this->form_validation->set_rules('stfname','First name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('stmname','Middle name', 'trim|required');
		$this->form_validation->set_rules('stlname','Lastname', 'required');
		$this->form_validation->set_rules('sch_id','Something', 'required');

		if($this->form_validation->run() == FALSE){

			$data['staff'] = $this->User_model->get_staff($sch_id,$id);
			//view
			$data['main_content'] = 'admin/staff/edit';
			$this->load->view('layouts/main',$data);
		}else{
			// create data array

			//create data array
			$data = array(
					'st_fname'         => $this->input->post('stfname'),
					'st_mname'          => $this->input->post('stmname'),
					'sch_id_staff'   => $this->input->post('sch_id'),
					'st_lname'       => $this->input->post('stlname'),
					'dpt_id'        => $this->input->post('departments')
				  );

			//Article tables update
			$this->User_model->update_staff($sch_id,$data, $id);

			//create message

			$this->session->set_flashdata('staff_updated', 'Staff info has been saved!!!');

			//redirect
			redirect('admin/welcome/allstaff');
		}

	}
	
	public function delete($id){
			$sch_id= $this->session->userdata('sch_id');
			$this->User_model->delete_staff($sch_id,$id);

			//create a message
			$this->session->set_flashdata('staff_deleted', 'One staff has been deleted');

			//redirect

			redirect('admin/welcome/allstaff');
	}
}