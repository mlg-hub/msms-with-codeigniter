<div class="container">
 <?php if($this->session->flashdata('registered')) :?>
 <div class="alert alert-success">
  <?php echo $this->session->flashdata('registered');?>
 </div>
<?php endif;?>
<?php if($this->session->flashdata('fail_login')) : ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('fail_login');?>
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
                   <h1>Welcome to the MSMS for an <em>easy<b> management</b></em></h1>
                </div>
                <div class="col-md-6 login" id="login">
                    <form role="form" method="post" action="<?php echo base_url();?>login">
                        <div class="form-group">
                          <label>Enter school username<span class="required">*</span></label>
                          <input type="text" name="schusername" class="form-control" placeholder="school username">
                        </div>
                        <div class="form-group">
                          <label>Enter school Password<span class="required">*</span></label>
                          <input type="password" name="schpassword" class="form-control" placeholder="Password">
                        </div>
                         <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div><!-- /.container -->