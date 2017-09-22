<div class="container">

 <?php if($this->session->flashdata('fail_ch_login')) : ?>
                      <div class="alert alert-danger">
                          <?php echo $this->session->flashdata('fail_ch_login');?>
                         </div>
                  <?php endif;?>
</div>

<div class="container">
     <div class="row alertt">
               <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
 </div>
            </div>
        <div class="login-choice register">
            <div class="row">
                <div class="col-md-6">
                   <h2>HI<b>!</b></h2><h3><em><b><?php echo strtoupper($tc_info->st_fname);?> <?php echo $tc_info->st_mname;?> <?php echo $tc_info->st_lname;?> </b></em></h3>
                </div>
                <div class="col-md-6 login" id="login">
               
                    <form role="form" method="post" action="<?php echo base_url();?>tcrs/welcome/change_login/<?php echo $tc_info->id;?>">
                        <div class="form-group">
                          <label>Enter your new password:<span class="required">*</span></label>
                          <input type="password" name="schpassword1" class="form-control" placeholder="new password">
                        </div>
                        <div class="form-group">
                          <label>Confirm new Password<span class="required">*</span></label>
                          <input type="password" name="schpassword2" class="form-control" placeholder="Confirm">
                        </div>
                         <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div><!-- /.container -->