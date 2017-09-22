
<?php
class report extends MY_Controller{

	 public function __construct(){
        parent::__construct();
    }

	public function all($class_id,$class_name){
		$sch_id= $this->session->userdata('sch_id');
		$tc_id= $this->session->userdata('tc_id');
		$data['ident'] = $this->User_model->get_ident($tc_id);
		$data['subs'] = $this->Course_model->get_tc_course($sch_id,$tc_id);
		$data['clsubs'] = $this->Class_model->get_course_class($sch_id,$tc_id);
    	$data['class_titus'] = $this->Class_model->get_class_titu($sch_id,$tc_id);
    	 $data['mystds'] = $this->Class_model->get_class_std_report($sch_id,$class_id);
    	 $data['theclass'] = $class_name;

    	$data['main_content'] = 'tcrs/report/all';
  		$this->load->view('layouts/main', $data);
	}
	public function show($std_id){
		$sch_id= $this->session->userdata('sch_id');
		$tc_id= $this->session->userdata('tc_id');
		$data['ident'] = $this->User_model->get_ident($tc_id);
		$data['subs'] = $this->Course_model->get_tc_course($sch_id,$tc_id);
		$data['clsubs'] = $this->Class_model->get_course_class($sch_id,$tc_id);
    	$data['class_titus'] = $this->Class_model->get_class_titu($sch_id,$tc_id);
    	$data['thestds'] = $this->Class_model->get_thestd($sch_id,$std_id);
    	$data['unique'] = $this->Class_model->thestdident($sch_id,$std_id);
    	// $data['mystds'] = $this->Class_model->get_class_std_report($sch_id,$class_id);
    	 //$data['theclass'] = $class_name;

    	$data['main_content'] = 'tcrs/report/show';
  		$this->load->view('layouts/main', $data);
	}
	public function set_std_vis($std_id,$sub_id){
		$sch_id= $this->session->userdata('sch_id');

		$data = array(
					'status_std'=>'1'
				);
		$this->Class_model->set_std_vis($sch_id,$std_id,$sub_id,$data);
		//redirect
		$std = $std_id;
		redirect('tcrs/report/show/'.$std);

	}
	public function set_std_unvis($std_id,$sub_id){
		$sch_id= $this->session->userdata('sch_id');

		$data = array(
					'status_std'=>'0'
				);
		$this->Class_model->set_std_unvis($sch_id,$std_id,$sub_id,$data);
		//redirect
		$std = $std_id;
		redirect('tcrs/report/show/'.$std);

	}
	public function set_pa_vis($std_id,$sub_id){
		$sch_id= $this->session->userdata('sch_id');

		$data = array(
					'status_pa'=>'1'
				);
		$this->Class_model->set_pa_vis($sch_id,$std_id,$sub_id,$data);
		//redirect
		$std = $std_id;
		redirect('tcrs/report/show/'.$std);

	}
	public function set_pa_unvis($std_id,$sub_id){
		$sch_id= $this->session->userdata('sch_id');

		$data = array(
					'status_pa'=>'0'
				);
		$this->Class_model->set_pa_unvis($sch_id,$std_id,$sub_id,$data);
		//redirect
		$std = $std_id;
		redirect('tcrs/report/show/'.$std);

	}
}