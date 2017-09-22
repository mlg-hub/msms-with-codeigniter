<?php $sch_id = $this->session->userdata('sch_id');
      $staff_id = $this->session->userdata('tc_id');
?>
 <div class="container margin-wrap-top ft">
        <div class="row headr">
             <div class="col-md-3">
               <a href="#" class="thumbnail thmb">
                  <img src="<?php echo base_url();?>assets/img/copy.jpg" alt="profil">
                </a>
             </div>
             <div class="col-md-5">
               <h3>Welcome,</h3> <h4 class="profil"><em><b><?php echo $ident->st_fname;?></b> <?php echo $ident->st_mname;?> <?php echo $ident->st_lname;?></em></h4>
             </div>
             <div class="col-md-4">
               <button class="btn btn-danger pull-right btnm myred">Change password</button>
             </div>
         </div>

        <div class="row margin-wrap">
         <div class="col-md-3 sbarx br">
          <ul class="nav nav-sidebar">
            <li class="myred"><a href="#">List of subjects you teach<span class="sr-only">(current)</span></a></li>
            
              <?php foreach($subs as $sub):?>
              <li><a><?php echo $sub->crs_name;?></a> 

              <div>
                 <ul>
                  <?php foreach($clsubs as $clsub):?>
                    <?php if($clsub->crs_name == $sub->crs_name):?>
           <a href="<?php echo base_url();?>tcrs/welcome/classes/<?php echo $clsub->class_id;?>/<?php echo $sub->subject_id;?>/<?php echo url_title(strtolower($sub->crs_name));?>">
                   <li class="myreda"><?php echo $clsub->class_name;?>
                   <input type="hidden" value="<?php echo $clsub->class_id;?>"></li>
                   </a>
                  <?php endif;?>
                
                    <?php endforeach;?>

                  </ul>
              </div>
              <input type="hidden" name="sudid" value="<?php echo $sub->id;?>">
              <input type="hidden" name="sudname" value="<?php echo $sub->crs_name;?>">
              </li>

            
            <?php endforeach;?>
            <li class="myred px10"><a href="#">You are the main teacher in:<span class="sr-only">(current)</span></a></li>
             <div>
              <ul>
               <?php foreach($class_titus as $class_titu):?>
               

               <a href="<?php echo base_url();?>tcrs/report/all/<?php echo $class_titu->id;?>/<?php echo url_title(strtolower($class_titu->class_name));?>"> <li class="myyreda px10"><?php echo $class_titu->class_name;?></li></a>
              <?php endforeach;?>
              </ul>
              </div>
          </ul>

          
        </div>
          <div class="col-md-9">
             <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <div class="row">

              <div class="col-md-6">
              <h2>Add or Edit "<b><?php echo $subj_name;?></b>" marks</h2>
              <h3>Class:"<b><span class="required"><?php echo $classname->class_name;?></span></b>"</h3>
              <div class="bt-add">
               <div class="name px10">Name:<em><b><?php echo strtoupper($thestd->st_first_name);?></b> <?php echo $thestd->st_middle_name;?> <?php echo $thestd->st_last_name;?></em></div>
                <div class=" px10 disp name"><em>ID:<?php echo strtoupper($thestd->idno);?></em></div>
                </div>
                </div><!-- end col 4-->

              </div>
              <div class="row">
          <form role="form" method="post" action="<?php echo base_url();?>tcrs/welcome/edit_m/<?php echo $thestd->id;?>/<?php echo $theclass;?>/<?php echo $subj_id;?>/<?php echo url_title(strtolower($subj_name));?>">
          
                  <div class="col-md-6">

                 <div class="px10 name bt-add">Enter <span class="required">CAT </span>marks:</div>
                  <div class="row px10">
                  <div class="col-md-8 pull-left">
                 <input name="cat_max" type="number" class="form-control" value="<?php echo $check_marks->cat_max;?>">
                 <span class="pull-right"> out of: /<?php echo $maxs->max_cat;?></span>
                     
                </div><!-- end col md 6-->
                </div>
                <div class="px10 name bt-add">Enter <span class="required">EXAM</span> marks:</div>
                  <div class="row px10">
                  <div class="col-md-8 pull-left">
                <input name="exam_max" type="number" class="form-control" value="<?php echo $check_marks->exam_max;?>"><span class="pull-right">out of: /<?php echo $maxs->max_exam;?></span>
                    
                </div><!-- end col md 6-->
                </div>
                <input type="hidden" name="std_id" value="<?php echo $thestd->id;?>">
                <input type="hidden" name="class_id" value="<?php echo $theclass;?>">
                <input type="hidden" name="sub_id" value="<?php echo $subj_id;?>">
                <input type="hidden" name="sub_name" value="<?php echo $subj_name;?>">
                <input type="hidden" name="sch_id" value="<?php echo $sch_id;?>">
                <input type="hidden" name="outcat" value="<?php echo $maxs->max_cat;?>">
                <input type="hidden" name="outexam" value="<?php echo $maxs->max_exam;?>">
                <input type="hidden" name="staff_id" value="<?php echo $staff_id;?>">

                <button class="btn btn-primary px10" type="submit">Save</button>
              
                </div>
              
                </div>


              </form>
                </div>
            </div>
          </div>
        </div><!-- /.container -->
