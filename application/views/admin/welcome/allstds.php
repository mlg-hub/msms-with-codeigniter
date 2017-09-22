 <?php $i=1;?>
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
            <h1 class="welcome">Student Dashboard</h1>
            <div class="col-md-12 bt-add">
              <div class="col-md-4">
               <p> Total No.of Student: <?php echo $stds_tot;?></p>
              </div>
               <div class="col-md-4">
                
              </div>
             
               <div class="col-md-4">
               <a href="<?php echo base_url();?>admin/stds/add">
                <button type="button" class="btn btn-success pull-right">
                  Add new Student
                </button>
                </a>
              </div>

              
            </div>
            <div class="col-md-12">
               <?php if($this->session->flashdata('std_updated')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('std_updated');?>
           </div>
          <?php endif;?>
           <?php if($this->session->flashdata('std_deleted')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('std_deleted');?>
           </div>
          <?php endif;?>
              <h4>Students table:</h4>
                  <table class="table table-hover">
                   <thead>
                     <tr>
                        <th>#</th>
                       <th>ID No.</th>
                       <th>Name</th>
                       <th>Class</th>
                       <th>Actions</th>

                     </tr>
                   </thead>
                   <tbody>
                   <?php foreach($students as $student):?>
                     <tr>
                      <td><?php echo $i;?></td>
                       <td><?php echo $student->idno;?></td>
                       <td><em><b><?php echo $student->st_first_name;?> <?php echo $student->st_middle_name;?> <?php echo $student->st_last_name;?></b></em></td>
                       <td><?php echo $student->class_name;?></td>
                       <td>
                        <a href="<?php echo base_url();?>admin/stds/edit/<?php echo $student->id;?>">
                       <button class="btn btn-warning"><span class="fa fa-pencil"> Edit</span></button>
                       </a>
                       
                        <a href="<?php echo base_url();?>admin/stds/delete/<?php echo $student->id;?>">
                       <button class="btn btn-danger pull-right">Delete</button>
                       </a>
                       </td>
                     </tr>
                   <?php $i++;endforeach;?>
                   </tbody>
                  </table>

            </div>
          </div>
        </div>

    </div><!-- /.container -->