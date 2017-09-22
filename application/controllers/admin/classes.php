<?php
class classes extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}
	public function add(){
		$sch_id= $this->session->userdata('sch_id');
		$data['classes'] = $this->Course_model->get_allclass();
		$data['titus'] = $this->Class_model->get_staff_titu($sch_id);
		$this->form_validation->set_rules('class_list','Class name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('titu_id','Titulaire ', 'trim|min_length[1]');
		

		if($this->form_validation->run() == FALSE){
			//view
			$data['main_content'] = 'admin/classes/add';
  			$this->load->view('layouts/main', $data);
		}else{
			//create data array
			$data = array(
					'class_name'         => $this->input->post('class_list'),
					'sch_id_class'   => $this->input->post('sch_id'),
					'titu_id'	=>$this->input->post('titu_id')
			 );

					//Articles Table insert
			$this->Class_model->insert_class($data);
					//create Message
			$this->session->set_flashdata('class_saved','New class has been saved!!!');

			//redirect
			redirect('admin/classes/add');
		
		}
	}

	public function edit($id){
		$sch_id= $this->session->userdata('sch_id');
		$data['classes'] = $this->Course_model->get_allclass();
		$data['clas'] = $this->Class_model->get_class($sch_id,$id);
		$data['titus'] = $this->Class_model->get_staff_titu($sch_id);
		$this->form_validation->set_rules('class_list','Class name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('titu_id','Titulaire ', 'trim|min_length[1]');

		

		if($this->form_validation->run() == FALSE){
			//view
			$data['main_content'] = 'admin/classes/edit';
  			$this->load->view('layouts/main', $data);
		}else{
			//create data array
			$data = array(
					'class_name'  => $this->input->post('class_list'),
					'sch_id_class'   => $this->input->post('sch_id'),
					'titu_id'	=>$this->input->post('titu_id')
			 );

			$this->Class_model->update_class($sch_id,$data,$id);
			$this->session->set_flashdata('class_updated', 'Class info has been Saved!!!');

			redirect('admin/welcome/allclss');
		}
	}
	public function delete($id){
			$sch_id= $this->session->userdata('sch_id');
			$this->Class_model->delete_class($sch_id,$id);

			//create a message
			$this->session->set_flashdata('class_deleted', 'One class has been deleted');

			//redirect

			redirect('admin/welcome/allclss');
	}

}