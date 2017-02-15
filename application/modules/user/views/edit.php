 <div id="page-wrapper">
    
    <div class="col-lg-5">
        
        <h3 class="page-header">Add User</h3>
       
        <form role="form" method="post" action="<?php echo base_url();?>user/update">
            <div class="form-group">
                <label>NIK</label>
                <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                <input class="form-control" name="nik" value="<?php echo $nik;?>" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input class="form-control" name="nama" value="<?php echo $nama;?>" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" value="<?php echo $username;?>" readonly>
            </div>
            <div class="form-group">
                <label>Password*</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                 <select class="form-control" name="jabatan_id">
                    <?php foreach($select_jabatan as $jb){ 
                    
                        $selected = ($jabatan_id == $jb->id)  ? 'selected' :'';
                    ?>
                        
                        <option value="<?php echo $jb->id;?>" <?php echo $selected;?>><?php echo $jb->jabatan;?></option>
                    <?php } ?>
                </select>
            </div>
            <p>
            *<small>leave empy if you dont want to change password</small>
            </p>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            <a href="<?php echo base_url();?>user" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </form>
       
    </div>
</div>
<!-- /#page-wrapper -->
