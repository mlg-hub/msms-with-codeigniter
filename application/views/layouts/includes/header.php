
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Welcome|msms</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/custom1.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right">
     <?php if($this->session->userdata('adlogged_in') && $this->session->userdata('logged_in')) :?>
              <li>
                   
                  <form class="navbar-form navbar-right" method="post" action="<?php echo base_url();?>welcome/logout">
                    <button class="btn btn-warning pull-left" name="log_out" type="submit">Logout</button>
                </form>
              </li>
                <h5 class="required pull-left mrg">Welcome admin</h5>
     <?php elseif($this->session->userdata('logged_in') && $this->session->userdata('tc_logged_in')):?>
              
               <li>
              
              <form class="navbar-form navbar-right" method="post" action="<?php echo base_url();?>welcome/logout">
               <button class="btn btn-warning" name="log_out" type="submit">Logout</button>
                </form>
              </li>
               <h5 class="pull-right mrg">Welcome <span class="spa"><?php echo $this->session->userdata('tc_username');?></span></h5>

      <?php elseif($this->session->userdata('logged_in')) :?>
                  
                 <li>
                   
                  <form class="navbar-form navbar-right" method="post" action="<?php echo base_url();?>welcome/logout">
                    <button class="btn btn-danger pull-left" name="log_out" type="submit">Logout</button>
                </form>
              </li>
            <?php else:?>

              <li>
                
              </li>
    <?php endif;?>
  
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>