
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
              <li><a href="#"><?php echo $sub->crs_name;?></a> 

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
               <?php if($this->session->flashdata('marks_saved')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('marks_saved');?>
           </div>
          <?php endif;?>
          <?php if($this->session->flashdata('marks_updated')) :?>
           <div class="alert alert-success">
            <?php echo $this->session->flashdata('marks_updated');?>
           </div>
          <?php endif;?>
              <h2>"<b><?php echo $classname->class_name;?></b>" <em><?php echo $subj_name;?></em> marks results & student list</h2>
                  
                  <div class="bt-add px10">
                  <?php if(empty($std_marks)):?>
                      <h4 class="required"><em>No records to display!!</em></h4>
                      
                    <?php else:?>
                   <table class="table table-hover table table-bordered px10" border="black">
                   <thead>
                     <tr>
                       <th>ID no.</th>
                       <th>Name</th>
                       <th>Courses</th>
                       <th colspan="2" class="cat-back">Cat marks</th>
                       <th colspan="2" class="ex-back">Exam marks</th>
                       <th colspan="2" class="tot-back">Total</th>
                       <th class="action myred">Action</th>
                     </tr>
                     <tr>
                       <th class="mback">&nbsp;</th>
                       <th class="mback">&nbsp;</th>
                       <th class="mback">&nbsp;</th>
                       <th class="mback">marks</th>
                       <th class="mback">out of</th>
                       <th class="mback">exam</th>
                       <th class="mback">exam</th>
                       <th class="mback">tot</th>
                       <th class="mback">tot</th>
                       <th class="myred"></th>
                     </tr>
                   </thead>
                   <tbody>

                    <?php foreach($std_marks as $marks):?>
                     <tr>
                         <td><?php echo $marks->idno;?></td>
                         <td><b><?php echo strtoupper($marks->st_first_name);?></b> 
                                <?php echo $marks->st_middle_name;?> 
                                <?php echo $marks->st_last_name;?>
                          </td>
                         <td><em><b><?php echo $subj_name;?></b></em></td>
                         <td >

                         <?php if(empty($marks->cat_max)):?>
                          <?php echo '<p class="required">XXX</p>';?>
                        <?php elseif($marks->cat_max < $marks->out_cat_max_id/2):?>
                           <?php echo '<p class="required">'.$marks->cat_max.'</p>';?>
                         <?php else:?>
                          <?php echo $marks->cat_max;?>
                        <?php endif;?>

                         </td>

                         <td><?php echo $marks->out_cat_max_id;?></td>

                         <td>

                         <?php if(empty($marks->exam_max)):?>
                          <?php echo '<p class="required">XXX</p>';?>
                        <?php elseif($marks->exam_max < $marks->out_exam_max_id/2):?>
                           <?php echo '<p class="required">'.$marks->exam_max.'</p>';?>
                         <?php else:?>
                          <?php echo $marks->exam_max;?>
                        <?php endif;?>

                          </td>
                         <td><?php echo $marks->out_exam_max_id;?></td>
                         <td class="cat-back">

                         <?php $moyenne = $marks->cat_max + $marks->exam_max;?>
                         <?php if($moyenne < ($marks->max_tot)/2):?>
                         <?php echo '<p class="required">'.$marks->tot.'</p>';?>
                            <?php else:?>
                              <?php echo $marks->tot;?>
                            <?php endif;?>

                         </td>
                         <td class="ex-back"><?php echo $marks->max_tot;?></td>
                         <td>

                         <div class="btn-group" role="group" aria-label="...">
                          <a href="<?php echo base_url();?>tcrs/welcome/add_m/<?php echo $marks->std_id;?>/<?php echo $marks->clss_id;?>/<?php echo $marks->sub_id;?>/<?php echo url_title(strtolower($subj_name));?>"><button  class="btn btn-primary">add</button></a>
                         <a href="<?php echo base_url();?>tcrs/welcome/edit_m/<?php echo $marks->std_id;?>/<?php echo $marks->clss_id;?>/<?php echo $marks->sub_id;?>/<?php echo url_title(strtolower($subj_name));?>"> <button class="btn btn-warning">edit</button></a>
                         <?php if($marks->status == 0):?>
                         <a href="<?php echo base_url();?>tcrs/welcome/active_m/<?php echo $marks->std_id;?>/<?php echo $marks->clss_id;?>/<?php echo $marks->sub_id;?>/<?php echo url_title(strtolower($subj_name));?>"> <button class="btn btn-default">inactive</button></a>
                        <?php else:?>
                           <a href="<?php echo base_url();?>tcrs/welcome/inactive_m/<?php echo $marks->std_id;?>/<?php echo $marks->clss_id;?>/<?php echo $marks->sub_id;?>/<?php echo url_title(strtolower($subj_name));?>"> <button class="btn btn-success">active</button></a>
                        <?php endif;?>
                        </div>
                       
                       
                       </td>
                         
                      </tr>
                   <?php endforeach;?>
                </tbody>
                </table>
              <?php endif;?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container -->
