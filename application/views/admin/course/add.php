<?php $sch_id = $this->session->userdata('sch_id');?>

<div class="container margin-wrap">

        <div class="row">
          <div class="br">
         <div class="col-md-3 sbar br">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview </a></li>
             <li><a href="<?php echo base_url();?>admin/welcome/alltcrs">All Teachers</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allstds">All Students</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allclss">All Classes</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allstaff">All staff</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allcrs">All courses</a></li>
          </ul>

          
        </div><!--profil admin-->
        </div>
          <div class="col-md-9">
          <?php if($this->session->flashdata('course_saved')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('course_saved');?>
           </div>
         <?php endif;?>
           <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <h2>Add new <span class="required">Course</span></h2>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6 br">

                    <form role="form" method="post" action="<?php echo base_url();?>admin/course/add">
         <div class="form-group">
                          <label>Course name<span class="required">*</span></label>
                          <select name="course_list" class="form-control">
                          
                            <option>------select a course------</option>
                            <?php foreach($courses as $course):?>

                            <option value="<?php echo $course->id_course;?>"><?php echo $course->crs_name;?></option>
                            
                          <?php endforeach;?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Course max cat<span class="required">*</span></label>
                         <select name="course_cat_max" class="form-control">
                            <option>---- course cat max ----</option>
                            <?php foreach($maxs as $max):?>
                            <option value="<?php echo $max->max;?>"><?php echo $max->max;?></option>
                          <?php endforeach;?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Course max exam<span class="required">*</span></label>
                          <select name="course_exam_max" class="form-control">
                            <option>---- course exam max ----</option>
                            <?php foreach($maxs as $max):?>
                            <option value="<?php echo $max->max;?>"><?php echo $max->max;?></option>
                          <?php endforeach;?>
                          </select>
                          </div>
                        <div class="form-group">
                          <label>To be tought by<span class="required">*</span>:</label>
                          <select name="teacher_id" class="form-control">
                            <option>---- who will teach this course? ----</option>
                            <option disabled="">choose from your teacher staff</option>
                            <?php foreach($teachers as $teacher):?>
                            <option value="<?php echo $teacher->id;?>"><?php echo $teacher->st_fname;?> <?php echo $teacher->st_mname;?> <?php echo $teacher->st_lname;?> </option>
                          <?php endforeach;?>
                          </select>
                           </div>
                         <div class="form-group">
                          <label>To be tought in<span class="required">*</span>:</label>
                          <select name="class_id" class="form-control">
                            <option>---- choose a class ----</option>
                            <?php foreach($classes as $class):?>
                            <option value="<?php echo $class->id;?>"> <?php echo $class->class_name;?> </option>
                          <?php endforeach;?>
                          </select>
                          </div>
                          <div>
                            <input name="sch_id" type="hidden" value="<?php echo $sch_id;?>">
                          </div>
                        
                        <button class="btn btn-success pull-right fmargin" type="submit">Submit</button>
                    </form>
                        
                  </div>
                  <div class="col-md-6">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div><!-- /.container -->