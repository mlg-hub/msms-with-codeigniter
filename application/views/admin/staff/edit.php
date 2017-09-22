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
           <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <h2>Edit <span class="required">staff</span> informations</h2>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6 br">
       <form role="form" method="post" action="<?php echo base_url();?>admin/staff/edit/<?php echo $staff->id;?>">
                
                        <div class="form-group">
                          <label>Staff firstname<span class="required">*</span></label>
        <input type="text" name="stfname" class="form-control" value="<?php echo $staff->st_fname;?>">
                        </div>
                        <div class="form-group">
                          <label>Staff middle name<span class="required">*</span></label>
                          <input type="text" name="stmname" class="form-control" value="<?php echo $staff->st_mname;?>">
                        </div>
                        <div class="form-group">
                          <label>Staff last name<span class="required">*</span></label>
                          <input type="text" name="stlname" class="form-control" value="<?php echo $staff->st_lname;?>">
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="sch_id" class="form-control" value="<?php echo $sch_id;?>">
                        </div>
                        <div class="form-group">
                          <label>Change department<span class="required">*</span></label>

                          <select name="departments" class="form-control">
                          <option>---Choose a departement---</option>
                          <?php foreach($depts as $dept):?>
                            <option value="<?php echo $dept->id;?>"><?php echo $dept->dept_name;?></option>
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
    ;?>