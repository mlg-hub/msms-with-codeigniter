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
             <?php if($this->session->flashdata('staff_updated')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('staff_updated');?>
           </div>
          <?php endif;?>
           <?php if($this->session->flashdata('staff_deleted')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('staff_deleted');?>
           </div>
          <?php endif;?>
            <h1 class="welcome">Departements Dashboard</h1>
            <div class="col-md-12 bt-add">
              <div class="col-md-4">
               
              </div>
               <div class="col-md-4">
                
              </div>
             
               <div class="col-md-4">
               <a href="<?php echo base_url();?>admin/staff">
                <button type="button" class="btn btn-success pull-right">
                  <span class="fa fa-plus"></span> new staff
                </button>
                </a>
              </div>
              
            </div>
            <div class="col-md-12">
              <h4>staff list table:</h4>
                  <table class="table table-hover">
                   <thead>
                     <tr>
                       <th>Name</th>
                       
                       <th>Departement</th>
                       
                       <th>Actions</th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php foreach($staffs as $staff):?>
                     <tr>
                       <td><?php echo $staff->st_fname;?> <?php echo $staff->st_mname;?> <?php echo $staff->st_lname;?></td>
                       <td><em><?php echo $staff->dept_name;?></em></td>
                       
                       <td>
                       <a href="<?php echo base_url();?>admin/staff/edit/<?php echo $staff->id;?>">
                       <button class="btn btn-warning"><span class="fa fa-pencil"> Edit</span></button>
                       </a>
                       
                        <a href="<?php echo base_url();?>admin/staff/delete/<?php echo $staff->id;?>">
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