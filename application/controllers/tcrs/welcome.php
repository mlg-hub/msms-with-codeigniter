 <?php 
class welcome extends MY_Controller{

	 public function __construct(){
        parent::__construct();
    }

	public function index(){
		$sch_id= $this->session->userdata('sch_id');
		$tc_id= $this->session->userdata('tc_id');
		$data['ident'] = $this->User_model->get_ident($tc_id);
		$data['subs'] = $this->Course_model->get_tc_course($sch_id,$tc_id);// tout les cours kil enseigne
		$data['clsubs'] = $this->Class_model->get_course_class($sch_id,$tc_id);//ranger les cours par class kil donne cour
    $data['class_titus'] = $this->Class_model->get_class_titu($sch_id,$tc_id);
		
		//
		$data['main_content'] = 'tcrs/welcome/welcome';
  		$this->load->view('layouts/main', $data);
	}
	public function login(){

			$this->form_validation->set_rules('tpass', 'Password', 'trim|required|min_length[4]|max_length[50]');
    		$this->form_validation->set_rules('tusername', 'Username', 'trim|required|min_length[4]|max_length[20]');

    		 if($this->form_validation->run() == FALSE){
        	//laod view
	        	$data['main_content'] = 'tcrs/welcome/login';
	  			$this->load->view('layouts/main', $data);

            }else{
            $sch_id= $this->session->userdata('sch_id');

    		$username = $this->input->post('tusername');
    		$password = md5($this->input->post('tpass'));

    		$tc_id = $this->User_model->tlogin($sch_id,$username, $password);

    			// validata user
    		if($tc_id){
    			// create array of user data

    			$data = array(
    					'tc_id'=> $tc_id,
    					'tc_username'=> $username,
    					'tc_logged_in' => true
    				);

    			//set session userdata
    			$this->session->set_userdata($data);
    			//set message 
    			$this->session->set_flashdata('pass_login', 'you are now logged in your teacher pannel');
    			redirect('tcrs/welcome');

    		}else{
    			$this->session->set_flashdata('fail_login', 'your login info has failed');
    			//laod view
	        	$data['main_content'] = 'tcrs/welcome/login';
	  			$this->load->view('layouts/main', $data);
    		}
    	}
     }

       public function change($tc_id){
        $sch_id = $this->session->userdata('sch_id');
          $tc_id= $this->session->userdata('tc_id');

         $data['tc_info'] = $this->User_model->get_tc_info($sch_id,$tc_id);
         //laod view
            $data['main_content'] = 'tcrs/welcome/change';
            $this->load->view('layouts/main', $data);
     }


     public function change_login($tc_id){
      $tcc_id = $tc_id;
       $sch_id= $this->session->userdata('sch_id');


      $this->form_validation->set_rules('schpassword1', 'Password', 'trim|required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('schpassword2', 'Confirm password', 'trim|required|matches[schpassword1]');

         if($this->form_validation->run() == FALSE){
          //laod view
           redirect('tcrs/welcome/change/'.$tc_id.'');

            }
          else{
           
        $stnohash = $this->input->post('schpassword1');
        $sthash = md5($this->input->post('schpassword2'));
          
           $data = array(
              
              'st_passhash'=> $sthash,
              'st_passnohash' => $stnohash
            );

           $this->User_model->update_pass($sch_id,$tc_id,$data);

          $this->session->set_flashdata('change_login', 'password has been changed successfully');
          redirect('tcrs/welcome');

        }

     }



     public function classes($class_id,$sub_id,$sub_name){
                $sch_id = $this->session->userdata('sch_id');
                $tc_id= $this->session->userdata('tc_id');
                 $data['class_titus'] = $this->Class_model->get_class_titu($sch_id,$tc_id);
                $data['ident'] = $this->User_model->get_ident($tc_id);
                $data['subs'] = $this->Course_model->get_tc_course($sch_id,$tc_id);
                $data['clsubs'] = $this->Class_model->get_course_class($sch_id,$tc_id);
                $data['subj_id'] = $sub_id;
                $data['subj_name'] = $sub_name;
                $data['theclass'] = $class_id;
                $data['classname'] = $this->Class_model->get_classname($sch_id,$class_id);
                $data['myclass'] = $this->Class_model->get_class_std($sch_id,$class_id);
                    
                  //  $std = $data['myclass'];
                   // print_r($std);
              //  $data['mymarks'] = $this->Class_model->get_marks_std($sch_id,$class_id,$sub_id,$std_id);
              

                $data['main_content'] = 'tcrs/welcome/classes';
                $this->load->view('layouts/main', $data);
     }
     public function add_m($std_id,$class_id,$sub_id,$sub_name){

                 $sch_id = $this->session->userdata('sch_id');
                  $tc_id= $this->session->userdata('tc_id');
                 //period record
                 $data['acc_period'] = $this->Course_model->get_theacc_per($sch_id);
                 $data['check_marks'] = $this->School_model->checkmarks($sch_id,$std_id,$class_id,$sub_id);
                $data['class_titus'] = $this->Class_model->get_class_titu($sch_id,$tc_id);
 
                $tc_id= $this->session->userdata('tc_id');
                $data['ident'] = $this->User_model->get_ident($tc_id);
                $data['subs'] = $this->Course_model->get_tc_course($sch_id,$tc_id);
                $data['clsubs'] = $this->Class_model->get_course_class($sch_id,$tc_id);
                $data['thestd'] = $this->Class_model->get_std_info($sch_id,$std_id);
                $data['maxs'] = $this->Class_model->get_max($sch_id,$sub_id,$class_id);
                $data['classname'] = $this->Class_model->get_classname($sch_id,$class_id);
                $data['std_id'] = $std_id;
                $data['theclass'] = $class_id;
                $data['subj_id'] = $sub_id;
                $data['subj_name'] = $sub_name;
                 $data['periods'] = $this->School_model->allper($sch_id);


            $this->form_validation->set_rules('cat_max', 'Cat marks', 'trim|min_length[1]|max_length[5]');
            $this->form_validation->set_rules('exam_max', 'Exam marks', 'trim|min_length[1]|max_length[5]');
             $this->form_validation->set_rules('per_id', 'Period', 'trim|required|min_length[1]|max_length[5]');

             if($this->form_validation->run() == FALSE){
             //view
                $data['main_content'] = 'tcrs/welcome/add_m';
                $this->load->view('layouts/main', $data);

            }else{

                $totcat =  $this->input->post('cat_max');
                $totexam = $this->input->post('exam_max');

                $tot = $totcat + $totexam;

                $outcattot = $this->input->post('outcat');
                $outexamtot = $this->input->post('outexam');

                $max_tot = $outexamtot + $outcattot;

                $data = array(
                    'period_id'  => $this->input->post('per_id'),
                    'sch_id_rec'           => $this->input->post('sch_id'),
                    'clss_id'             => $this->input->post('class_id'),
                    'sub_id'               => $this->input->post('sub_id'),
                    'staff_id'             => $this->input->post('staff_id'),
                    'std_id'               => $this->input->post('std_id'),
                    
                    'cat_max'               => $this->input->post('cat_max'),
                    'exam_max'             =>$this->input->post('exam_max'),
                    'out_cat_max_id'        => $this->input->post('outcat'),
                    'out_exam_max_id'        => $this->input->post('outexam'),
                    'tot'                    =>$tot,
                    'max_tot'               =>$max_tot
                  );

                    //Articles Table insert
            $this->School_model->insert_marks($data);
                    //create Message
            $this->session->set_flashdata('marks_saved','marks have been saved!!!');

            //redirect
          $classr = $this->input->post('class_id');
          $subr = $this->input->post('sub_id');
          $subn = $this->input->post('sub_name');
            
            redirect('tcrs/welcome/results/'.$classr.'/'.$subr.'/'.$subn);
                
     }
 }

    public function edit_m($std_id,$class_id,$sub_id,$sub_name){

        $sch_id = $this->session->userdata('sch_id');
                 //period record
    $data['acc_period'] = $this->Course_model->get_theacc_per($sch_id);
    $data['check_marks'] = $this->School_model->checkmarks($sch_id,$std_id,$class_id,$sub_id);

                $tc_id= $this->session->userdata('tc_id');
                $data['ident'] = $this->User_model->get_ident($tc_id);
                $data['subs'] = $this->Course_model->get_tc_course($sch_id,$tc_id);
                $data['clsubs'] = $this->Class_model->get_course_class($sch_id,$tc_id);
                $data['thestd'] = $this->Class_model->get_std_info($sch_id,$std_id);
                $data['maxs'] = $this->Class_model->get_max($sch_id,$sub_id,$class_id);
                $data['classname'] = $this->Class_model->get_classname($sch_id,$class_id);
                $data['std_id'] = $std_id;
                $data['theclass'] = $class_id;
                $data['subj_id'] = $sub_id;
                $data['subj_name'] = $sub_name;
                 $data['periods'] = $this->School_model->allper($sch_id);
                  $data['class_titus'] = $this->Class_model->get_class_titu($sch_id,$tc_id);


            $this->form_validation->set_rules('cat_max', 'Cat marks', 'trim|min_length[1]|max_length[5]');
            $this->form_validation->set_rules('exam_max', 'Exam marks', 'trim|min_length[1]|max_length[5]');
             $this->form_validation->set_rules('per_id', 'Period', 'trim|min_length[1]|max_length[5]');

             if($this->form_validation->run() == FALSE){
             //view
                $data['main_content'] = 'tcrs/welcome/edit_m';
                $this->load->view('layouts/main', $data);

            }else{

                $totcat =  $this->input->post('cat_max');
                $totexam = $this->input->post('exam_max');

                $tot = $totcat + $totexam;

                $outcattot = $this->input->post('outcat');
                $outexamtot = $this->input->post('outexam');

                $max_tot = $outexamtot + $outcattot;

                $data = array(
                    
                    'sch_id_rec'           => $this->input->post('sch_id'),
                    'clss_id'             => $this->input->post('class_id'),
                    'sub_id'               => $this->input->post('sub_id'),
                    'staff_id'             => $this->input->post('staff_id'),
                    'std_id'               => $this->input->post('std_id'),
                    
                    'cat_max'               => $this->input->post('cat_max'),
                    'exam_max'             =>$this->input->post('exam_max'),
                    'out_cat_max_id'        => $this->input->post('outcat'),
                    'out_exam_max_id'        => $this->input->post('outexam'),
                    'tot'                    =>$tot,
                    'max_tot'               =>$max_tot
                  );

                    //Articles Table insert
            $this->School_model->update_edit_process_marks($sch_id,$std_id,$class_id,$sub_id,$data);
                    //create Message
            $this->session->set_flashdata('marks_updated','marks have been updated!!!');

            //redirect
           $classr = $this->input->post('class_id');
          $subr = $this->input->post('sub_id');
          $subn = $this->input->post('sub_name');
            
            redirect('tcrs/welcome/results/'.$classr.'/'.$subr.'/'.$subn);
                
     }
    }

    public function results($class_id,$sub_id,$sub_name){

                $sch_id = $this->session->userdata('sch_id');
                 //period record
                 $data['acc_period'] = $this->Course_model->get_theacc_per($sch_id);

                $tc_id= $this->session->userdata('tc_id');
                $data['ident'] = $this->User_model->get_ident($tc_id);
                $data['subs'] = $this->Course_model->get_tc_course($sch_id,$tc_id);
                $data['clsubs'] = $this->Class_model->get_course_class($sch_id,$tc_id);
                  $data['classname'] = $this->Class_model->get_classname($sch_id,$class_id);
                  $data['std_marks'] = $this->Class_model->get_std_marks($sch_id,$class_id,$sub_id);
                 $data['theclass'] = $class_id;
                $data['subj_id'] = $sub_id;
                $data['subj_name'] = $sub_name;
                 $data['class_titus'] = $this->Class_model->get_class_titu($sch_id,$tc_id);

                //view
                $data['main_content'] = 'tcrs/welcome/results';
                $this->load->view('layouts/main', $data);

    }

public function edit_process_m($std_id,$class_id,$sub_id,$sub_name){

     $sch_id = $this->session->userdata('sch_id');
    $this->form_validation->set_rules('exam_max', 'Exam marks', 'trim|min_length[1]|max_length[5]');
    $this->form_validation->set_rules('cat_max', 'Cat marks', 'trim|min_length[1]|max_length[5]');

      if($this->form_validation->run() == FALSE){
             //view
                $data['main_content'] = 'tcrs/welcome/add_m';
                $this->load->view('layouts/main', $data);

            }
        else{

                $totcat =  $this->input->post('cat_max');
                $totexam = $this->input->post('exam_max');

                $tot = $totcat + $totexam;

                $outcattot = $this->input->post('outcat');
                $outexamtot = $this->input->post('outexam');

                $max_tot = $outexamtot + $outcattot;

                $data = array(
                    
                    
                    'cat_max'               => $this->input->post('cat_max'),
                    'exam_max'             =>$this->input->post('exam_max'),
                     'tot'                    =>$tot
                  );

                    //Articles Table insert
            $this->School_model->update_edit_process_marks($sch_id,$std_id,$class_id,$sub_id,$data);
                    //create Message
            $this->session->set_flashdata('marks_updated','marks have been saved!!!');

            //redirect
           $classr = $this->input->post('class_id');
          $subr = $this->input->post('sub_id');
          $subn = $this->input->post('sub_name');
            
            redirect('tcrs/welcome/results/'.$classr.'/'.$subr.'/'.$subn);
                
     }
    }
    public function active_m($std_id,$class_id,$sub_id,$sub_name){

        $sch_id = $this->session->userdata('sch_id');

        $data = array(
                    'status' =>'1'
                );

        $this->School_model->set_active($sch_id,$std_id,$class_id,$sub_id,$data);

         //redirect
        $classr =$class_id;
        $subr =$sub_id;
        $subn =$sub_name;


        redirect('tcrs/welcome/results/'.$classr.'/'.$subr.'/'.$subn);
    }
    public function inactive_m($std_id,$class_id,$sub_id,$sub_name){

        $sch_id = $this->session->userdata('sch_id');

        $data = array(
                    'status' =>'0'
                );

        $this->School_model->set_active($sch_id,$std_id,$class_id,$sub_id,$data);

         //redirect
        $classr =$class_id;
        $subr =$sub_id;
        $subn =$sub_name;


        redirect('tcrs/welcome/results/'.$classr.'/'.$subr.'/'.$subn);
    }
}