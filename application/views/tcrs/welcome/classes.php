  <?php $i=1;?>
 <div class="container margin-wrap-top ft">
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
               <button class="btn btn-danger pull-right btnm myred">Change password</button>
             </div>
         </div>

        <div class="row margin-wrap">
         <div class="col-md-3 sbarx br">
          <ul class="nav nav-sidebar">
            <li class="myred"><a href="#">List of subjects you teach<span class="sr-only">(current)</span></a></li>
            
              <?php foreach($subs as $sub):?>
              <li><a><?php echo $sub->crs_name;?></a> 

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

              <div class="col-md-8">
               <?php if($this->session->flashdata('marks_saved')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('marks_saved');?>
           </div>
          <?php endif;?>
              <h2>"<b><?php echo $classname->class_name;?></b>" Student list</h2>
                  <div>
                    <a href="<?php echo base_url();?>tcrs/welcome/results/<?php echo $theclass;?>/<?php echo $subj_id;?>/<?php echo url_title(strtolower($subj_name));?>"><button class="btn btn-primary">Display <?php echo $subj_name;?> results</button></a>
                  </div>
                   <table class="table table-hover table table-bordered px10" border="black">
                   <thead>
                     <tr>
                        <th>#</th>
                       <th class="cat-back">ID no.</th>
                       <th class="ex-back">Name</th>
                       <th class="tot-back">Courses</th>
                       <th class="myrd">Actions</th>
  
                     </tr>
                     <tr>
                       <th>&nbsp;</th>
                       <th>&nbsp;</th>
                       <th>&nbsp;</th>
                       <th>&nbsp;</th>
                       <th></th>
                       
                     </tr>
                   </thead>
                   <tbody>
                  
                   <?php foreach($myclass as $mycls):?>
                    
                     <tr>
                     <td><?php echo $i;?></td>
                         <td><?php echo $mycls->idno;?></td>
                         <td>
                         <?php echo $mycls->st_first_name;?> 
                         <?php echo $mycls->st_middle_name;?> 
                         <?php echo $mycls->st_last_name;?>
                         </td>
                         <td><?php echo $subj_name;?></td>
                         
                         <td>
                        <a href="<?php echo base_url();?>tcrs/welcome/add_m/<?php echo $mycls->id;?>/<?php echo $theclass;?>/<?php echo $subj_id;?>/<?php echo url_title(strtolower($subj_name));?>"><button class="btn btn-primary">Add records</span></button></a>
                       </td>
                         
                      </tr>

                      
                   <?php $i++; endforeach;?>
                  
                </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container -->
