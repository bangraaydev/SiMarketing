<style>table tr td{border:none!important}</style>
<script>
$(function(){

    $(".delete-gambar").click(function(){
    
        var img = $(this).attr("img");
        var id_accesories  = $(this).attr("id-accesories");
        $.ajax({
            
            url : base_url+'product/accesories/unlink',type:'post',dataType:'json',
            data:{img:img,id_accesories:id_accesories},
            success:function(res){
                
                if(res.status)
                    window.location.reload();
            },
            error:function(x,h,r){
                
                alert(r)
            }
        
        });
        
    });
});
</script>
<div id="page-wrapper">
 <h3 class="page-header">Edit Accesories</h3>
       
        <form action="<?php echo base_url();?>product/accesories/update" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            
            <div class="row">
            
            <div class="col-lg-5">
            <div class="form-group">
                <label class="col-lg-2 control-label">SKU</label>
                <div class="col-lg-8">
                 <input type="hidden" name="id_accesories" value="<?php echo $detail['id_accesories']?>">
                  <input name="sku" class="form-control" disabled value="<?php echo $detail['sku']?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Stock</label>
                <div class="col-lg-8">
                   <input name="stock" class="form-control" value="<?php echo $detail['stock']?>" type="number" step="any" required> 
                </div>
              </div>
               <div class="form-group">
                <label class="col-lg-2 control-label">Harga</label>
                <div class="col-lg-8">
                  <input name="harga" class="form-control" value="<?php echo $detail['harga']?>" type="text" pattern="[0-9]*" required> 
                </div>($US)
              </div>
               <div class="form-group">
                <label class="col-lg-2" style="padding-left:5px">Keterangan</label>
                <div class="col-lg-8">
                  <textarea class="form-control" name="keterangan" ><?php echo $detail['keterangan']?></textarea>
                </div>
              </div>
           
            
           </div> 
           
           <div class="col-lg-6">
             
             <div class="form-group">
                <label class="col-lg-2 control-label">Description</label>
                <div class="col-lg-8">
                 <input name="deskripsi" class="form-control" value="<?php echo $detail['deskripsi']?>" required>
                 </div>
              </div>
              
              <div class="form-group">
                <label class="col-lg-2 control-label">Unit</label>
                <div class="col-lg-8">
                  <select name="unit" class="form-control">
                    <option value="PCS" <?php echo ($detail['unit']=='PCS') ? 'selected' :''?> >PCS</option>
                    <option value="METER" <?php echo ($detail['unit']=='METER') ? 'selected' :''?> >METER</option>
                    <option value="MODUL" <?php echo ($detail['unit']=='MODUL') ? 'selected' :''?> >MODUL</option>
                  </select>
                 </div>
              </div>
               <div class="form-group">
                <label class="col-lg-2 control-label">Status</label>
                <div class="col-lg-8">
                   <select name="status" class="form-control">
                    <?php foreach($status as $st=>$val){ 
                    
                    $set = ($detail['status']==$st) ? 'selected' : '';
                    ?>
                        <option value="<?php echo $st;?>" <?php echo $set;?>><?php echo $val;?></option>
                    <?php } ?>
                  </select>
                 </div>
              </div>
              
              <div class="form-group">
                <label class="col-lg-2 control-label">Warranty</label>
                <div class="col-lg-8">
                 <select name="garansi" class="form-control">
                    <?php foreach($warranty as $wr){ 
                    $sep = ($detail['garansi']==$wr) ? 'selected' : '';
                    ?>
                        <option value="<?php echo $wr;?>" <?php echo $sep;?>><?php echo $wr;?></option>
                    <?php } ?>
                  </select>
                 </div>(Years)
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Brand</label>
                <div class="col-lg-8">
                  <select name="brand" class="form-control">
                    <option value="GE" <?php echo ($detail['brand']=='GE') ? 'selected' :''?>>GE</option>
                    <option value="LOKAL" <?php echo ($detail['brand']=='LOKAL') ? 'selected' :''?>>LOKAL</option>
                  </select></div>
              </div>
             
            </div><!--end row-->
            <div class="row">
                  <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td width="40"><b>Gambar</b></td>
                                <td width="40">
                                    1.<input name="pic[]" type="file">
                                    <?php if($detail['pic1']){?>
                                    <a href="<?php echo base_url().'assets/images/accesories/'.$detail['pic1']?>" target="_blank">
                                        <i class="fa fa-lightbulb-o"></i> View
                                    </a>
                                    <a  href="javascript:;" 
                                        img="<?php echo $detail['pic1'];?>"
                                        id-accesories="<?php echo $detail['id_accesories'];?>"
                                        title="Delete" class="a-danger delete-gambar">
	                                    <i class="fa fa-times"></i> Delete
	                                </a>
	                                <?php } ?>
                                 </td>
                                <td>
                                    2. <input name="pic[]" type="file">
                                    <?php if($detail['pic2']){?>
                                    <a href="<?php echo base_url().'assets/images/accesories/'.$detail['pic2']?>" target="_blank">
                                        <i class="fa fa-lightbulb-o"></i> View
                                    </a>
                                    <a  href="javascript:;" 
                                        img="<?php echo $detail['pic2'];?>"
                                        id-accesories="<?php echo $detail['id_accesories'];?>"
                                        title="Delete" class="a-danger delete-gambar">
	                                    <i class="fa fa-times"></i> Delete
	                                </a>
	                                <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    3.<input name="pic[]" type="file">
                                    <?php if($detail['pic3']){?>
                                    <a href="<?php echo base_url().'assets/images/accesories/'.$detail['pic3']?>" target="_blank">
                                        <i class="fa fa-lightbulb-o"></i> View
                                    </a>
                                    <a  href="javascript:;" 
                                        img="<?php echo $detail['pic3'];?>"
                                        id-accesories="<?php echo $detail['id_accesories'];?>"
                                        title="Delete" class="a-danger delete-gambar">
	                                    <i class="fa fa-times"></i> Delete
	                                </a>
	                                <?php } ?>
                                </td>
                                <td>
                                    4. <input name="pic[]" type="file">
                                    <?php if($detail['pic4']){?>
                                    <a href="<?php echo base_url().'assets/images/accesories/'.$detail['pic4']?>" target="_blank">
                                        <i class="fa fa-lightbulb-o"></i> View
                                    </a>
                                    <a  href="javascript:;" 
                                        img="<?php echo $detail['pic4'];?>"
                                        id-accesories="<?php echo $detail['id_accesories'];?>"
                                        title="Delete" class="a-danger delete-gambar">
	                                    <i class="fa fa-times"></i> Delete
	                                </a>
	                                <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div>
              </div>
              <div class="col-lg-6 col-lg-offset-2">
                 <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                 <a href="<?php echo base_url();?>product/accesories" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
                 <br/><br/>
              </div>
            </div>
        </form>
</div>
<!-- /#page-wrapper -->
