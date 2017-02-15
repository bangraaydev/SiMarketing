 <div id="page-wrapper">
    
    <div class="col-lg-5">
        
        <h3 class="page-header">Add User</h3>
       
        <form role="form" method="post" action="<?php echo base_url();?>user/save">
            <div class="form-group">
                <label>NIK</label>
                <input class="form-control" name="nik" required autofocus>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan_id">
                    <?php foreach($select_jabatan as $jb){?>
                        <option value="<?php echo $jb->id;?>"><?php echo $jb->jabatan;?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            <a href="<?php echo base_url();?>user" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </form>
       
    </div>
</div>
<!-- /#page-wrapper -->
