 <div class="container">
   <div class="row">
   <div class="col-md-6">
      <?php if($this->session->flashdata('pass_login')):?>
   <div class="alert alert-success succ">
    <?php echo $this->session->flashdata('pass_login');?>
   </div>
   </div>
<?php endif;?>
</div>
 <div class="container">

      <div class="starter-template">
      <div class="back-main">
        <div class="row">
          <div class="col-md-12">
            <h2>Choose your identity</h2>
            <div class="identity">
            <a href="<?php echo base_url();?>admin/welcome/adlogin">
            <div>
             <button type="button" id="admin" class="btn btn-danger btn-lg admin">
               Login as an admin
             </button>
           </div>
           </a>
           <a href="<?php echo base_url();?>tcrs/welcome/login">
           <div>
             <button type="button" class="btn btn-success btn-lg identity admin">
               Login as a teacher
             </button>
           </div>
           </a>
           <a href="<?php echo base_url();?>admin/welcome/stlogin">
           <div>
             <button type="button" class="btn btn-info btn-lg identity admin">
               Login as a student
             </button>
           </div>
           </a>
          </div>
          </div>

        </div>
        </div>
      </div>

    </div><!-- /.container -->