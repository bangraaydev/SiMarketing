 <div id="page-wrapper">
    
    <div class="col-lg-5">
        
        <h3 class="page-header">Add Jabatan</h3>
       
        <form role="form" method="post" action="<?php echo base_url();?>jabatan/save">
            <div class="form-group">
                <label>Jabatan</label>
                <input class="form-control" name="jabatan" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="4" required></textarea>
            </div>
          
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            <a href="<?php echo base_url();?>jabatan" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </form>
       
    </div>
</div>
<!-- /#page-wrapper -->
