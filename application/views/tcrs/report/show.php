
 
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
            <div class="col-md-6">
               <h2>Student Identification</h2>
                  <span class="required">Name:</span> <b><?php echo strtoupper($unique->st_first_name);?></b> <?php echo strtoupper($unique->st_middle_name);?> <?php echo strtoupper($unique->st_last_name);?>
                  <span class="required theleft">ID no.:</span> <b><?php echo strtoupper($unique->idno);?></b>
            </div>
            <div class="col-md-6">
              
            </div>
          </div>
            
            <div class="row">
              <div class="col-md-12">
              <h2>Performance Sheet</h2>
                   <table class="table table-hover table table-bordered" border="black">
                   <thead>
                     <tr>
                        <th>Period</th>
                       <th>Courses</th>
                       <th colspan="2" class="cat-back">Cat marks</th>
                       <th colspan="2" class="ex-back">Exam marks</th>
                       <th colspan="2" class="tot-back">Total</th>
                       <th class="action myred" colspan="2">Visible to:</th>
                     </tr>
                     <tr class="thline">
                       
                       <th>&nbsp;</th>
                       <th>&nbsp;</th>
                       <th>marks</th>
                       <th>out of</th>
                       <th>exam</th>
                       <th>exam</th>
                       <th>tot</th>
                       <th>TOT</th>
                       <th>Student</th>
                       <th>Parent</th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php foreach($thestds as $stds):?>
                     <tr>
                        <td><?php echo $stds->term;?> <?php echo $stds->year;?></td>
                         <td><?php echo $stds->crs_name;?></td>
                         <td><?php echo $stds->cat_max;?></td>
                         <td><?php echo $stds->out_cat_max_id;?></td>
                         <td><?php echo $stds->exam_max;?></td>
                         <td><?php echo $stds->out_exam_max_id;?></td>
                         <td><?php echo $stds->tot;?></td>
                         <td><?php echo $stds->max_tot;?></td>
                         <td>
                         <?php if($stds->status_std==0):?>
                        <a href="<?php echo base_url();?>/tcrs/report/set_std_vis/<?php echo $stds->std_id;?>/<?php echo $stds->sub_id;?>"><button class="btn btn-default action myred">NO</button></a>
                      <?php else:?>
                        <a href="<?php echo base_url();?>/tcrs/report/set_std_unvis/<?php echo $stds->std_id;?>/<?php echo $stds->sub_id;?>"> <button class="btn btn-primary">YES</button></a>
                       <?php endif;?>
                       </td>
                         <td>
                         <?php if($stds->status_pa==0):?>
                          <a href="<?php echo base_url();?>/tcrs/report/set_pa_vis/<?php echo $stds->std_id;?>/<?php echo $stds->sub_id;?>"><button class="btn btn-default action myred">NO</button></a>
                        <?php else:?>
                        <a href="<?php echo base_url();?>/tcrs/report/set_pa_unvis/<?php echo $stds->std_id;?>/<?php echo $stds->sub_id;?>"><button class="btn btn-primary">YES</button></a>
                      <?php endif;?>
                       </td>
                      </tr>
                      <?php endforeach;?>
                   </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container -->