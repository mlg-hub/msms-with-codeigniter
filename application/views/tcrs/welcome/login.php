<div class="container">
        <div class="register">
           <div class="row">
             <div class="col-md-3">
                </div>
                <div class="col-md-6">
                  <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
                <?php if($this->session->flashdata('fail_login')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('fail_login');?>
                       </div>
                <?php endif;?>
                <h2><span class="required">Teacher</span> login</h2>
               <form role="form" method="post" action="<?php echo base_url();?>tcrs/welcome/login">
                
                <div class="form-group">
                  <label>Enter Staff ID.<span class="required">*</span></label>
                  <input type="text" name="tusername" class="form-control" placeholder="Name of the school">
                </div>
                <div class="form-group">
                  <label>Enter Password<span class="required">*</span></label>
                  <input type="password" name="tpass" class="form-control" placeholder="Password">
                </div>
                <button class="btn btn-sucess pull-right fmargin" type="submit">Submit</button>
              </form>
             </div>
             <div class="clearfix"></div>
             <div class="col-md-3">
                 
             </div>
           </div>
           
        </div>

    </div><!-- /.container -->