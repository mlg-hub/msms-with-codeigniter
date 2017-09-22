<div class="container margin-wrap footermarg">
        <div class="row">
         <div class="col-md-3 sbar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/alltcrs">All Teachers</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allstds">All Students</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allclss">All Classes</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allstaff">All staff</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allcrs">All courses</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allper">Period of teaching</a></li>
          </ul>
          
        </div><!--profil admin-->
          <div class="col-md-9">
            <h1 class="welcome">Courses Dashboard</h1>
            <div class="col-md-12 bt-add">
              <div class="col-md-4">
               
              </div>
               <div class="col-md-4">
                
              </div>
             
               <div class="col-md-4">
               <a href="<?php echo base_url();?>admin/course/add">
                <button type="button" class="btn btn-success pull-right">
                  Add new Course
                </button>
                </a>
              </div>
              
            </div>
            <div class="col-md-12">
             <?php if($this->session->flashdata('course_updated')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('course_updated');?>
           </div>
          <?php endif;?>
           <?php if($this->session->flashdata('course_deleted')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('course_deleted');?>
           </div>
          <?php endif;?>
              <h4>Courses list table:</h4>
                  <table class="table table-hover">
                   <thead>
                     <tr>
                       <th>Name</th>
                       <th>Teacher's name</th>
                       <th>Teacher's ID</th>
                       <th>Tough in</th>
                       

                       <th>Cat max</th>
                       <th>Exam max</th>
                       <th>Actions</th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php foreach($courses as $course):?> 
                     <tr>
                        <td><b><em><?php echo $course->crs_name;?></em></b></td>
                       <td><em><b><?php echo $course->st_fname;?></b> <?php echo $course->st_mname;?> <?php echo $course->st_lname;?></em></td>
                       <td><?php echo $course->st_id;?></td>
                       <td><?php echo $course->class_name;?></td>
                       <td><?php echo $course->max_cat;?></td>
                       <td><?php echo $course->max_exam;?></td>
                       <td>

                        <a href="<?php echo base_url();?>admin/course/edit/<?php echo $course->id;?>">
                       <button class="btn btn-warning"><span class="fa fa-pencil"> Edit</span></button>
                       </a>
                       
                        <a href="<?php echo base_url();?>admin/course/delete/<?php echo $course->id;?>">
                       <button class="btn btn-danger pull-right">Delete</button>
                       </a>
                       </td>
                     </tr>
                      <?php endforeach;?>
                   </tbody>
                  </table>

            </div>
          </div>
        </div>

    </div><!-- /.container -->