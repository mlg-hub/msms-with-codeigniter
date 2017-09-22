
 <div class="container margin-wrap">
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
          
        </div>
  
          <div class="col-md-9">
         
           <?php if($this->session->flashdata('period_saved')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('period_saved');?>
           </div>
         <?php endif;?>
         <?php if($this->session->flashdata('period_updated')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('period_updated');?>
           </div>
         <?php endif;?>
         <?php if($this->session->flashdata('period_deleted')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('period_deleted');?>
           </div>
         <?php endif;?>

            <h1 class="welcome">Teaching period Dashbord</h1>
            <div class="col-md-12 bt-add">
                <a href="<?php echo base_url();?>admin/period/add"> <button class="btn btn-success pull-right"><i class="fa fa-plus"></i> new period</button></a>
                 <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="marginfoot">
                    <h4>All teaching period recorded</h4>
                   <table class="table table-hover table table-bordered">
                       <thead class="myrd">
                        <th>#</th>
                        <th>teaching periods</th>
                        <th class="myred" >Actions</th>
                       </thead>
                       <tbody>
                       <?php foreach($periods as $period):?>
                        <tr>
                          <td>1</td>
                          <td>
                          <?php echo $period->term;?> <?php echo $period->year;?>
                          </td>
                          <td>
                            <a href="<?php echo base_url();?>admin/period/edit/<?php echo $period->id;?>">
                             <button class="btn btn-warning"> Edit</button>
                             </a>
                             
                              <a href="<?php echo base_url();?>admin/period/delete/<?php echo $period->id;?>">
                             <button class="btn myred btn-danger pull-right">Delete</button>
                             </a>
                         </td>
                        </tr>
                      <?php endforeach;?>
                       </tbody>
                    </table>
                    </div>
               </div><!-- end-->
                  <div class="col-md-6">
                    <h4><em>Accessible period</em></h4>
                    <?php if(empty($accesses)):?>
                      <h3>No accessible period available!!!</h3>
                    <?php else:?>
                      <table class="table table-hover table table-bordered">
                       <thead class="myrd">
                        <th>#</th>
                        <th>teaching periods</th>
                        <th class="myred" >Actions</th>
                       </thead>
                       <tbody>

                       <?php foreach($accesses as $access):?>

                        <tr>
                          <td>1</td>
                          <td>
                          <?php echo $access->term;?> <?php echo $access->year;?>
                          </td>
                          <td>
                            <a href="<?php echo base_url();?>admin/period/set_inacc/<?php echo $access->id;?>">
                             <button class="btn btn-primary">Set inaccessible</button>
                             </a>
                         </td>
                        </tr>
                      <?php endforeach;?>
                       </tbody>
                    </table>
                  <?php endif;?>
                  </div>
        
            </div>
            <div class="bt-add">
              <div class="row">
                    
                    <div class="col-md-4">
                    <form role="form" method="post" action="<?php echo base_url();?>admin/period/set">
                    <em>Set an accessible teaching period:</em>
                      <select name="status" class="form-control px10">
                        <option>--set accessible period--</option>
                        <?php foreach($periods as $period):?>
                        <option value="<?php echo $period->id;?>"><?php echo $period->term;?> <?php echo $period->year;?></option>
                      <?php endforeach;?>
                      </select>
                       <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-success pull-left marginfoot px10" type="submit">Save</button>
                      </div>
                    </div>
                      </form>
                    </div>

                </div>
                   
                  
            </div>
              
                
                    </div><!-- row avant 9-->
          </div>
        </div>

    </div><!-- /.container -->
