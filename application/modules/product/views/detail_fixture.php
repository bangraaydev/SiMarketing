<style>table tr td{border:none!important}</style>
<div id="page-wrapper">
 <h3 class="page-header">Detail Fixture</h3>
       
        <form action="<?php echo base_url();?>product/fixture/save" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            
            <div class="row">
            
            <div class="col-lg-5">
            <div class="form-group">
                <label class="col-lg-2 control-label">SKU</label>
                <div class="col-lg-8">
                  <input name="sku" class="form-control" value="<?php echo $detail['sku']?>" readonly>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-lg-2 control-label">L</label>
                <div class="col-lg-8">
                  <input name="l" class="form-control" value="<?php echo $detail['l']?>" readonly>
                </div>(mm)
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">H</label>
                <div class="col-lg-8">
                  <input name="h" class="form-control" value="<?php echo $detail['h']?>" readonly> 
                </div>(mm)
              </div>
               <div class="form-group">
                <label class="col-lg-2 control-label">W</label>
                <div class="col-lg-8">
                  <input name="w" class="form-control" value="<?php echo $detail['w']?>" readonly> 
                </div>(mm)
              </div>
               <div class="form-group">
                <label class="col-lg-2 control-label">Cut<span style="color:#fff">_</span>Out</label>
                <div class="col-lg-8">
                  <input name="cut_out" class="form-control" value="<?php echo $detail['cut_out']?>" readonly> 
                </div>(mm)
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Source</label>
                <div class="col-lg-8">
                  <input name="source" class="form-control" value="<?php echo $detail['source']?>" readonly> 
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Stock</label>
                <div class="col-lg-8">
                  <input name="stock" class="form-control" value="<?php echo $detail['stock']?>" readonly> 
                </div>
              </div>
               <div class="form-group">
                <label class="col-lg-2 control-label">Harga</label>
                <div class="col-lg-8">
                  <input name="harga" class="form-control" value="<?php echo $detail['harga']?>" readonly> 
                </div>($US)
              </div>
               <div class="form-group">
                <label class="col-lg-2" style="padding-left:5px">Keterangan</label>
                <div class="col-lg-8">
                  <textarea class="form-control" name="keterangan" readonly><?php echo $detail['keterangan']?></textarea>
                </div>
              </div>
           
            
           </div> 
           
           <div class="col-lg-6">
             
               <div class="form-group">
                <label class="col-lg-2 control-label">Tipe</label>
                <div class="col-lg-8">
                  <input name="nama_tipe" class="form-control" value="<?php echo $detail['nama_tipe']?>" readonly> 
                </div>
              </div>
             
             <div class="form-group">
                <label class="col-lg-2 control-label">Description</label>
                <div class="col-lg-8">
                  <input name="deskripsi" class="form-control" value="<?php echo $detail['deskripsi']?>" readonly>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-lg-2 control-label">Fitting</label>
                <div class="col-lg-8">
                  <input name="fitting" class="form-control" value="<?php echo $detail['fitting']?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Lamp</label>
                <div class="col-lg-8">
                  <input name="lamp" class="form-control" value="<?php echo $detail['lamp']?>" readonly> 
                </div>
              </div>
               <div class="form-group">
                <label class="col-lg-2 control-label">IP</label>
                <div class="col-lg-8">
                  <input name="ip" class="form-control" value="<?php echo $detail['ip']?>" readonly> 
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Accesories</label>
                <div class="col-lg-8">
                  <input name="accesories" class="form-control" value="<?php echo $detail['accesories']?>" readonly> 
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Unit</label>
                <div class="col-lg-8">
                  <input name="unit" class="form-control" value="<?php echo $detail['unit']?>" readonly> 
                </div>
              </div>
               <div class="form-group">
                <label class="col-lg-2 control-label">Status</label>
                <div class="col-lg-8">
                  <input name="status" class="form-control" value="<?php echo $detail['status']?>" readonly> 
                 </div>
              </div>
               <div class="form-group">
                <label class="col-lg-2 control-label">Warranty</label>
                <div class="col-lg-8">
                 <input name="warranty" class="form-control" value="<?php echo $detail['garansi']?>" readonly> 
                </div>(Years)
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Brand</label>
                <div class="col-lg-8">
                   <input name="brand" class="form-control" value="<?php echo $detail['brand']?>" readonly> 
                 </div>
              </div>
             
            </div><!--end row-->
            <div class="row">
                <div class="col-lg-10">
                  <div class="page-header"><h4>Gambar</h4></div>
                  
                   <?php if($detail['pic1']){?>
                    <div class="col-lg-5 pin">
                       <div class="thumbnail">
                          <img src="<?php echo base_url().'assets/images/fixture/'.$detail['pic1'];?>" class="img-responsive">
                     </div>
                    </div>
                    <?php } if($detail['pic2']){?>
                    <div class="col-lg-5 pin">
                       <div class="thumbnail">
                          <img src="<?php echo base_url().'assets/images/fixture/'.$detail['pic2'];?>" class="img-responsive">
                     </div>
                    </div>
                    <?php } if($detail['pic3']){?>
                    <div class="col-lg-5 pin">
                       <div class="thumbnail">
                          <img src="<?php echo base_url().'assets/images/fixture/'.$detail['pic3'];?>" class="img-responsive">
                     </div>
                    </div>
                    <?php } if($detail['pic4']){?>
                    <div class="col-lg-5 pin">
                       <div class="thumbnail">
                          <img src="<?php echo base_url().'assets/images/fixture/'.$detail['pic4'];?>" class="img-responsive">
                     </div>
                    <?php } ?>
                    </div>
                
             </div>  
             <div class="col-lg-5">
                <br/>
                <?php if($this->uri->segment(5,0)==='katalog-fixture') {?>
                 <a href="<?php echo base_url()?>katalog/fixture" class="btn btn-primary"><< Back</a>
                 <?php } else{?>
                  <a href="<?php echo base_url()?>product/fixture" class="btn btn-primary"><< Back</a>
                 <?php } ?>
                 <br/></br>
            </div>  
           </div>
        </form>
</div>
<!-- /#page-wrapper -->
