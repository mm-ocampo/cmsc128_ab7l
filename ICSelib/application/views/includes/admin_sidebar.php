<div class="sidebar">
  <div class= "panel-group profile_bar">
    <img class="img-circle2" src="<?php echo base_url();?>assets/profile.jpg"/>
    <h2 class="panel-heading profile_greet">Welcome </br><?php echo $this->session->userdata('name'); ?>!</h2>
    <p class="text-muted"><?php echo $this->session->userdata('email');?></p>
  </div>
  <ul class="nav nav-sidebar ">          
    <li><a class="list-group-item <?php if($this->input->get('page_number') == 1) echo "active";?>" href="<?php echo base_url();?>index.php/elib/admin_default?page_number=1"><i class="fa fa-book fa-lg space"></i>Materials<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
    <li><a class="list-group-item <?php if($this->input->get('page_number') == 2) echo "active";?>" href="<?php echo base_url();?>index.php/elib/admin_manage?page_number=2"><i class="fa fa-cogs fa-lg space"></i>Library Management<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
    <li><a class="list-group-item <?php if($this->input->get('page_number') == 3) echo "active";?>" href="<?php echo base_url();?>index.php/elib/admin_account?page_number=3"><i class="fa fa-users fa-lg space"></i>Accounts<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
    <li><a class="list-group-item <?php if($this->input->get('page_number') == 4) echo "active";?>" href="<?php echo base_url();?>index.php/elib/admin_profile?page_number=4"><i class="fa fa-edit fa-lg space"></i>Edit Profile<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
    <li><a class="list-group-item <?php if($this->input->get('page_number') == 5) echo "active";?>" href="<?php echo base_url();?>index.php/elib/logout?page_number=5"><i class="fa fa-sign-out fa-lg space"></i>Log Out<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
  </ul>

  <div id="footer">
    <div id="container">
      <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
    </div>
  </div>
</div>