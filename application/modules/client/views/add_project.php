 <div id="page-wrapper">
    
    <div class="col-lg-5">
        
        <h3 class="page-header">Add Project</h3>
       
        <form role="form" method="post" action="<?php echo base_url();?>client/project/save">
            <div class="form-group">
                <label>Nama Project</label>
                <input class="form-control" name="nama_project" required autofocus>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>
           
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            <a href="<?php echo base_url();?>client/project" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </form>
       
    </div>
</div>
<!-- /#page-wrapper -->
