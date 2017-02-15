 <div id="page-wrapper">
    
    <div class="col-lg-5">
        
        <h3 class="page-header">Profile</h3>
        <?php if($this->uri->segment(3,0)==1){?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Successfully saved
        </div>
        <?php } ?>
        <form role="form" method="post" action="<?php echo base_url();?>user/profile_update">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="nama" value="<?php echo $this->session->userdata('nama');?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" value="<?php echo $this->session->userdata('username');?>" disabled>
            </div>
            <div class="form-group">
                <label>Password</label>
                 <input class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-info">Update</button>
        </form>
        <p>
        <br/><br/>
        *Kosongkan password jika tidak ingin dirubah
        </p>
    </div>
</div>
<!-- /#page-wrapper -->
