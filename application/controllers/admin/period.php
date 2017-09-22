<?php
class period extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}
	public function set(){
			$sch_id= $this->session->userdata('sch_id');

			$status = $this->input->post('status');
			//echo $status; die();
			$data = array(
						'access_status'=>'1'
					);
			$this->School_model->set_access($sch_id,$status,$data);
			redirect('admin/welcome/allper');
	
	}
	public function set_inacc($id){
		$sch_id = $this->session->userdata('sch_id');
		$data = array(
					'access_status'=>'0'
				);
		$this->School_model->inacc($sch_id,$id,$data);
		redirect('admin/welcome/allper');
	}

	public function add(){
		$sch_id= $this->session->userdata('sch_id');

		

		$this->form_validation->set_rules('term','Term', 'required');
		$this->form_validation->set_rules('year','Year', 'required');

		if($this->form_validation->run() == FALSE){
				//view 
			$data['main_content'] = 'admin/period/add';
	  		$this->load->view('layouts/main', $data);
  		}
		else{
			$data = array(
					'sch_id_per_rec'	=> $this->input->post('sch_id'),
					'term'         => $this->input->post('term'),
					'year'          => $this->input->post('year') 
					);
					//Articles Table insert
			$this->School_model->insert_period($data);
					//create Message
			$this->session->set_flashdata('period_saved','New period has been saved!!!');

			//redirect
			redirect('admin/welcome/allper');
		}
	
  }
  public function edit($id){
  	$sch_id= $this->session->userdata('sch_id');
	$data['per'] = $this->School_model->single_per($id,$sch_id);
  	$this->form_validation->set_rules('term','Term', 'required');
	$this->form_validation->set_rules('year','Year', 'required');

		if($this->form_validation->run() == FALSE){
				//view 
			$data['main_content'] = 'admin/period/edit';
	  		$this->load->view('layouts/main', $data);
  		}
  		else{
			$data = array(
					'sch_id_per_rec'=> $this->input->post('sch_id'),
					'term'          => $this->input->post('term'),
					'year'          => $this->input->post('year') 
					);

					//Articles Table insert
			$this->School_model->update_period($sch_id,$id,$data);
					//create Message
			$this->session->set_flashdata('period_updated','period has been updated!!!');

			//redirect
			redirect('admin/welcome/allper');
		}

  }
  public function delete($id){
  	$sch_id = $this->session->userdata('sch_id');
			$this->School_model->delete_period($sch_id,$id);

			//create a message
			$this->session->set_flashdata('period_deleted', 'One period has been deleted');

			//redirect

			redirect('admin/welcome/allper');
  }
}