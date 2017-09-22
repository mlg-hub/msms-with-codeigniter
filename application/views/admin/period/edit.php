<?php $sch_id = $this->session->userdata('sch_id');?>

<div class="margin-wrap">
 <div class="container">
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
          
             <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <h1 class="welcome">Add teaching <span class="required">period</span></h1>
            <div class="col-md-12 bt-add">
                <h4><b>Set the period</b></h4>
            </div>
            
            <div class="row">
            <div class="col-md-4">
            <form role="form" method="post" action="<?php echo base_url();?>admin/period/edit/<?php echo $per->id;?>">
                <em>Select the term period</em>
              <select name="term" class="form-control">
               
                <option value="<?php echo $per->term;?>"><?php echo $per->term;?></option>
                 <option><span class="diseable">---select a term---</span></option>
                <option value="1st-term">1st term</option>
                <option value="2nd-term">2nd term</option>
                <option value="3rd-term">3rd term</option>
              </select>
              <div class="px10"><em >Select the year</em></div>
              <select name="year" class="form-control">
                <option value="<?php echo $per->year;?>"><?php echo $per->year;?></option>
                <option><span class="diseable">---select the year---</span></option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
              </select>
              <input type="hidden" name="sch_id" value="<?php echo $sch_id;?>">
              <button class="btn btn-primary px10 pull-right" value="Submit" type="submit">Save</button>
            </form>
              </div>
            </div>
          </div>
        </div>

    </div><!-- /.container -->
  </div>