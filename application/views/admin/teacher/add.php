<?php $sch_id = $this->session->userdata('sch_id');?>
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
          </ul>
          
        </div><!--profil admin-->
          <div class="col-md-9">
           <?php if($this->session->flashdata('teacher_saved')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('teacher_saved');?>
           </div>
         <?php endif;?>
           <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <h2>Add new <span class="required">teacher</h2>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <form role="form" method="post" action="<?php echo base_url();?>admin/teacher/add">
                        <div class="form-group">
                          <label>First name of teacher<span class="required">*</span></label>
                          <input type="text" name="tfname" class="form-control" placeholder="Name of teacher">
                        </div>
                        <div class="form-group">
                          <label>middle name of teacher<span class="required">*</span></label>
                          <input type="text" name="tmname" class="form-control" placeholder="Name of teacher">
                        </div>
                        <div class="form-group">
                          <label>Last name of teacher<span class="required">*</span></label>
                          <input type="text" name="tlname" class="form-control" placeholder="Name of teacher">
                        </div>
                        <div class="form-group">
                          <label>Assign ID.<span class="required">*</span></label>
                          <input type="text" name="tid" class="form-control" placeholder="teacher id">
                        </div>
                        <div class="form-group">
                          <label>
                          Assign Password<span class="required">*</span></label>
                          <input type="text" name="tpass" class="form-control" placeholder="Password">
                          <input type="hidden" name="dpt" value="1">
                          <input type="hidden" name="sch_id" value="<?php echo $sch_id;?>">
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