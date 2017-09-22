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
<?php $sch_id = $this->session->userdata('sch_id');?>
   </div><!--profil admin-->
        </div>
          <div class="col-md-9">
          <?php if($this->session->flashdata('class_saved')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('class_saved');?>
           </div>
         <?php endif;?>
           <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <h2>Add new Class</h2>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6 br">
                    <form role="form" method="post" action="<?php echo base_url();?>admin/classes/add">
                
                        <div class="form-group">
                          <label>Class name<span class="required">*</span></label>
                           <select name="class_list" class="form-control">
                            <option>------select the class name------</option>
                            <?php foreach($classes as $class):?>
                            <option value="<?php echo $class->name;?>"><?php echo $class->name;?></option>
                          <?php endforeach;?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Titulaire teacher name<span class="required">*</span></label>
                           <select name="titu_id" class="form-control">
                            <option>------select the teacher name------</option>
                            <?php foreach($titus as $titu):?>
                            <option value="<?php echo $titu->id;?>"><?php echo $titu->st_fname;?> <?php echo $titu->st_mname;?>
                             <?php echo $titu->st_lname;?></option>
                          <?php endforeach;?>
                          </select>
                        </div>
                        <div>
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