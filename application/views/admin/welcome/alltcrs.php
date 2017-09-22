
<div class="container margin-wrap">
        <div class="row">
         <div class="col-md-3 sbar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview </a></li>
         <li><a href="<?php echo base_url();?>admin/welcome/alltcrs">All Teachers</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allstds">All Students</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allclss">All Classes</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allstaff">All staff</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allcrs">All courses</a></li>
            <li><a href="<?php echo base_url();?>admin/welcome/allper">Period of teaching</a></li>
          </ul>
          
        </div><!--profil admin-->
          <div class="col-md-9">
            <h1 class="welcome">Teacher Dashboard</h1>
            <div class="col-md-12 bt-add">
              <div class="col-md-4">
               <p> Total No.of Teacher: <?php echo $tcrs_tot;?></p>
              </div>
               <div class="col-md-4">
                
              </div>
             
               <div class="col-md-4">
               <a href="<?php echo base_url();?>admin/teacher/add">
                <button type="button" class="btn btn-success pull-right">
                  Add new teacher
                </button>
                </a>
              </div>
              
            </div>
            <div class="col-md-12">
              <h4>Teachers table:</h4>
                  <table class="table table-hover">
                   <thead>
                     <tr>
                       <th>#</th>
                       <th>Name</th>
                       <th>No.Class</th>
                       <th>No.Course</th>
                       <th>Actions</th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php foreach($teachers as $teacher) :?>
                     <tr>
                       <td><?php echo $teacher->st_id;?></td>
                       <td><?php echo $teacher->st_fname;?> <?php echo $teacher->st_mname;?> <?php echo $teacher->st_lname;?></td>
                       <td>5</td>
                       <td>4</td>
                       <td>
                     <a href="<?php echo base_url();?>admin/teacher/edit/<?php echo $teacher->id;?>">
                       <button class="btn btn-warning"><span class="fa fa-pencil"> Edit</span></button>
                       </a>
                       
                        <a href="<?php echo base_url();?>admin/teacher/delete/<?php echo $teacher->id;?>">
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