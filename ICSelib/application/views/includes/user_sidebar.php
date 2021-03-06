 <div class="sidebar">
  <div class= "panel-group profile_bar">
    <img class="img-circle2" src="<?php echo base_url();?>assets/profile.jpg"/>
  <h2 class="panel-heading profile_greet">Hi </br><?php echo $this->session->userdata('name');?>!</h2>
    <p class="text-muted"> <?php echo $this->session->userdata('email');?></p>
  </div>
  <ul class="nav nav-sidebar ">          
    <li><a class="list-group-item <?php if($this->input->get('page_number') == 1) echo "active";?>" href="<?php echo base_url();?>index.php/elib/user_search_book?page_number=1"><i class="fa fa-search fa-lg space"></i>Search<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
    <li><a class="list-group-item <?php if($this->input->get('page_number') == 2) echo "active";?>" href="<?php echo base_url();?>index.php/site/get_my_library_data?page_number=2"><i class="fa fa-book fa-lg space"></i>My Library<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
    <li><a class="list-group-item <?php if($this->input->get('page_number') == 3) echo "active";?>" href="<?php echo base_url();?>index.php/site/user_update_view?page_number=3"><i class="fa fa-edit fa-lg space"></i>Edit Profile<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
    <li><a class="list-group-item <?php if($this->input->get('page_number') == 4) echo "active";?>" data-toggle="modal" href="#notification_modal"><i class="fa fa-edit fa-lg space"></i><span class="notification"><?php if(isset($notification)) echo $notification; else echo "Notification (0)";?></span><i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
    <li><a class="list-group-item <?php if($this->input->get('page_number') == 5) echo "active";?>" href="<?php echo base_url();?>index.php/elib/logout?page_number=4"><i class="fa fa-sign-out fa-lg space"></i>Log Out<i class="fa fa-chevron-right fa-lg space pull-right"></i></a></li>
  </ul>
  <div id="footer">
    <div id="container">
      <p class="text-muted">&copy; 2014 ICS eLib &middot; All rights reserved.</p>
    </div>
  </div>          
</div>
<div class="modal fade" id="notification_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title">Notifications</h3>
        </div>
        <div class="modal-body notifs">
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->