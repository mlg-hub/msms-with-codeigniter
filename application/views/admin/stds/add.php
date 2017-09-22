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
           <?php if($this->session->flashdata('student_saved')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('student_saved');?>
           </div>
         <?php endif;?>
           <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <h2>Add new Student</h2>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6 br">
                    <form role="form" method="post" action="<?php echo base_url();?>admin/stds/add">
                
                        <div class="form-group">
                          <label>Student firstname<span class="required">*</span></label>
                          <input type="text" name="stfname" class="form-control" placeholder="Firstname">
                        </div>
                        <div class="form-group">
                          <label> Student middlename<span class="required">*</span></label>
                          <input type="text" name="stmname" class="form-control" placeholder="Lastname">
                        </div>
                        <div class="form-group">
                          <label>Student last name<span class="required">*</span></label>
                          <input type="text" name="stlname" class="form-control" placeholder="Lastname">
                        </div>
                        <div class="form-group">
                          <label>Date of birth<span class="required">*</span></label>
                          <input type="date" name="stdob" class="form-control" placeholder="date of birth">
                        </div>
                        <div class="form-group">
                          <label>parent/guardian/next of kin<span class="required">*</span></label>
                          <input type="text" name="stparent" class="form-control" placeholder="Name of teacher">
                        </div>
                      
                        <div class="form-group">
                          <label>Tel/Address description<span class="required">*</span></label>
                    <textarea type="text" name="staddr" class="form-control" placeholder="Name of teacher"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Assign ID.<span class="required">*</span></label>
                          <input type="text" name="stid" class="form-control" placeholder="teacher id">
                        </div>
                        <div class="form-group">
                          <label>
                          Assign Password<span class="required">*</span></label>
                          <input type="text" name="stpass" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                         
                          <input type="hidden" name="sch_id" class="form-control" value="<?php echo $sch_id;?>">
                        </div>
                       <div class="form-group">
                          <label >Select class<span class="required">*</span>: </label>
                            <select name="class_id" class="form-control">
                            <option>---- choose a class ----</option>
                            <?php foreach($classes as $class):?>
                            <option value="<?php echo $class->id;?>"> <?php echo $class->class_name;?> </option>
                          <?php endforeach;?>
                          </select>
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
    <footer id="footer">