<div class="container">
     <?php if($this->session->flashdata('logged_out')):?>
    <?php echo '<p class="alert alert-dismissable alert-success">'.$this->session->flashdata('logged_out').'</p>';?>
<?php endif;?>

</div>


<div class="container">
    
      <div class="starter-template">
      <div class="back-main">
        <div class="row">
          <div class="col-md-6 ">
            <h1>Welcome to the MSMS for an <em>easy<b> management</b></em></h1>
          </div>
          <div class="col-md-6 login">
            <div id="login-sch">
            <p><h2>Already have your school account? sign in <em>here</em></h2></p>
            <a href="<?php echo base_url();?>login">
            <div>
             <button type="button" class="btn btn-info btn-lg">
               Login to your school system
             </button>
           </div>
           </a>
           </div>
           <div id="create-sch">
           <p><h2>Don't have a school account yet? sign up for <em><b>free</b> here</em></h2></p>
           <a href="<?php echo base_url();?>register" class="linkcreate">
           <div>
             <button type="button" class="btn btn-success btn-lg">
               Create your school system
             </button>
           </div>
           </a>
           </div>
          </div>

        </div>
        </div>
      </div>

    </div><!-- /.container -->
  