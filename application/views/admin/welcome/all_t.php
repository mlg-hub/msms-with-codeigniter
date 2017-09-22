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
            <h1 class="welcome">Class Dashboard</h1>
            <div class="col-md-12 bt-add">
              <div class="col-md-4">
               Total No.of class is: <em><b class="required">10</b></em>
              </div>
               <div class="col-md-4">
                
              </div>
             
               <div class="col-md-4">
               <a href="<?php echo base_url();?>admin/titulaire/add">
                <button type="button" class="btn btn-success pull-right">
                  Add new class titulaire
                </button>
                </a>
              </div>
              
            </div>
            <div class="col-md-12">
             <?php if($this->session->flashdata('titu_updated')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('titu_updated');?>
           </div>
          <?php endif;?>
           <?php if($this->session->flashdata('titu_deleted')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('titu_deleted');?>
           </div>
          <?php endif;?>
              <h4>classes list table:</h4>
                  <table class="table table-hover">
                   <thead>
                     <tr>
                       <th>Name</th>
                       
                       <th>No.Courses</th>
                       <th>No.teachers</th>
                       <th>Actions</th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php foreach($classes as $class):?>
                     <tr>
                      <td><b><em><?php echo $class->class_name;?></em></b></td>
                       <td>5</td>
                       <td>4</td>
                       <td>
                        <a href="<?php echo base_url();?>admin/classes/edit/<?php echo $class->id;?>">
                       <button class="btn btn-warning"><span class="fa fa-pencil"> Edit</span></button>
                       </a>
                       
                        <a href="<?php echo base_url();?>admin/classes/delete/<?php echo $class->id;?>">
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