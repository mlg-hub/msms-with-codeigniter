 
 <?php $tc_id= $this->session->userdata('tc_id');?>
 <div class="container margin-wrap-top ft">
  <?php if($this->session->flashdata('change_login')) : ?>
                      <div class="alert alert-success">
                          <?php echo $this->session->flashdata('change_login');?>
                         </div>
   <?php endif;?>
        <div class="row headr">
             <div class="col-md-3">
               <a href="#" class="thumbnail thmb">
                  <img src="<?php echo base_url();?>assets/img/copy.jpg" alt="profil">
                </a>
             </div>
             <div class="col-md-5">
               <h3>Welcome,</h3> <h4 class="profil"><em><b><?php echo $ident->st_fname;?></b> <?php echo $ident->st_mname;?> <?php echo $ident->st_lname;?></em></h4>
             </div>
             <div class="col-md-4">
               <a href="<?php echo base_url();?>tcrs/welcome/change/<?php echo $tc_id;?>"><button class="btn btn-danger pull-right btnm myred">Change password</button></a>

             </div>
         </div>

        <div class="row margin-wrap">
          <div class="col-md-3 sbarx br">
          <ul class="nav nav-sidebar">
            <li class="myred">
            <a href="#">List of subjects you teach<span class="sr-only">(current)</span></a>
            </li>
            
              <?php foreach($subs as $sub):?>
              <li>
              <a href="#"><?php echo $sub->crs_name;?></a> 

              <div>
                 <ul>
                  <?php foreach($clsubs as $clsub):?>
                    <?php if($clsub->crs_name == $sub->crs_name):?>
           <a href="<?php echo base_url();?>tcrs/welcome/classes/<?php echo $clsub->class_id;?>/<?php echo $sub->subject_id;?>/<?php echo url_title(strtolower($sub->crs_name));?>">
                   <li class="myreda"><?php echo $clsub->class_name;?>
                   <input type="hidden" value="<?php echo $clsub->class_id;?>"></li>
                   </a>
                  <?php endif;?>
                
                    <?php endforeach;?>
                  </ul>
              </div>
              <input type="hidden" name="sudid" value="<?php echo $sub->id;?>">
              <input type="hidden" name="sudname" value="<?php echo $sub->crs_name;?>">
              </li>

            
            <?php endforeach;?>
            <li class="myred px10"><a href="#">You are the main teacher in:<span class="sr-only">(current)</span></a></li>
             <div>
              <ul>
               <?php foreach($class_titus as $class_titu):?>
               

               <a href="<?php echo base_url();?>tcrs/report/all/<?php echo $class_titu->id;?>/<?php echo url_title(strtolower($class_titu->class_name));?>"> <li class="myyreda px10"><?php echo $class_titu->class_name;?></li></a>
              <?php endforeach;?>
              </ul>
              </div>  
          </ul>

          
        </div>
          <div class="col-md-9">
            
            <div class="row">

              <div class="col-md-12">
              <h1>WELCOME!!!!!</h1>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container -->