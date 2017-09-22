
<?php
class course extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}
	public function add(){
		$sch_id= $this->session->userdata('sch_id');
		$data['courses'] = $this->Course_model->get_course_list();
		$data['maxs'] = $this->Course_model->get_max();
		$data['teachers'] = $this->Course_model->get_teachers($sch_id);
		$data['classes'] = $this->Course_model->get_class($sch_id);

		$this->form_validation->set_rules('course_list','Course name', 'trim|required');
		$this->form_validation->set_rules('course_exam_max','Exam max', 'trim|required');
		$this->form_validation->set_rules('course_cat_max','Cat max', 'required');
		$this->form_validation->set_rules('teacher_id','Teacher', 'required');
		$this->form_validation->set_rules('class_id','Class', 'required');

		if($this->form_validation->run() == FALSE){
			//view
			$data['main_content'] = 'admin/course/add';
  			$this->load->view('layouts/main', $data);
		}else{
			//create data array
			$data = array(
					'subject_id'         => $this->input->post('course_list'),
					'max_exam'          => $this->input->post('course_exam_max'),
					'sch_id_sub'   => $this->input->post('sch_id'),
					'max_cat'       => $this->input->post('course_cat_max'),
					'staff_id'        => $this->input->post('teacher_id'),
					'class_id'        => $this->input->post('class_id')
				  );

					//Articles Table insert
			$this->Course_model->insert_course($data);
					//create Message
			$this->session->set_flashdata('course_saved','New course has been saved!!!');

			//redirect
			redirect('admin/course/add');
		
	}
		
	}

	public function edit($id){
		$sch_id= $this->session->userdata('sch_id');
		$data['courses'] = $this->Course_model->get_course_list();
		$data['maxs'] = $this->Course_model->get_max();
		$data['teachers'] = $this->Course_model->get_teachers($sch_id);
		$data['classes'] = $this->Course_model->get_class($sch_id);
		$data['cours'] = $this->Course_model->get_course($sch_id,$id);

		$this->form_validation->set_rules('course_list','Course name', 'trim|required');
		$this->form_validation->set_rules('course_exam_max','Exam max', 'trim|required');
		$this->form_validation->set_rules('course_cat_max','Cat max', 'required');
		$this->form_validation->set_rules('teacher_id','Teacher', 'required');
		$this->form_validation->set_rules('class_id','Class', 'required');

		if($this->form_validation->run() == FALSE){
			//view
			$data['main_content'] = 'admin/course/edit';
  			$this->load->view('layouts/main', $data);
		}else{
			//create data array
			$data = array(
					'subject_id'         => $this->input->post('course_list'),
					'max_exam'          => $this->input->post('course_exam_max'),
					'sch_id_sub'   => $this->input->post('sch_id'),
					'max_cat'       => $this->input->post('course_cat_max'),
					'staff_id'        => $this->input->post('teacher_id'),
					'class_id'        => $this->input->post('class_id')
				  );

			$this->Course_model->update_course($sch_id,$data, $id);

			//create message

			$this->session->set_flashdata('course_updated', 'Course info has been saved!!!');

			//redirect
			redirect('admin/welcome/allcrs');
		}
	}

	public function delete($id){
			$sch_id= $this->session->userdata('sch_id');
			$this->Course_model->delete_course($sch_id,$id);

			//create a message
			$this->session->set_flashdata('course_deleted', 'One course has been deleted');

			//redirect

			redirect('admin/welcome/allcrs');
	}
}