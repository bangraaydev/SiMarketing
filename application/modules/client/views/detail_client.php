<style>table tr td{border:none!important}</style>
<div id="page-wrapper">
 <h3 class="page-header">Detail Client</h3>
       
        <form  class="form-horizontal" role="form" enctype="multipart/form-data">
            
            <div class="row">
            
            <div class="col-lg-6">
             <div class="panel panel-default">
                <div class="panel-heading">
                    <b>PT</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
           
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tipe<font color="#fff">_</font>Client</label>
                    <div class="col-lg-8">
                    <input class="form-control" value="<?php echo $client['desc_tipe']?>" readonly>
                    </div>
                  </div>
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">Initial</label>
                    <div class="col-lg-8">
                      <input name="initial" class="form-control" value="<?php echo $client['initial']?>" readonly>
                    </div>
                  </div>
                  
                 
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Nama<font color="#fff">_</font>PT</label>
                    <div class="col-lg-8">
                      <input name="nama_pt" class="form-control" value="<?php echo $client['nama_pt']?>" readonly> 
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-lg-2 control-label">Alamat</label>
                    <div class="col-lg-8">
                     <textarea class="form-control" name="alamat" readonly><?php echo $client['alamat']?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Kota</label>
                    <div class="col-lg-8">
                      <input name="kota" class="form-control" value="<?php echo $client['kota']?>" readonly> 
                    </div>
                  </div>
               
                 </div>
               </div>
            </div> 
           <div class="col-lg-5">
               <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Project</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body"  style="min-height:290px!important">
                   <div id="project-wrap">
                      <?php foreach($project as $pr){ ?>
                       <div class="form-group">
                         <div class="col-lg-10">
                          <input name="kota" class="form-control" value="<?php echo $pr['nama_project']?>" readonly> 
                        </div>
                       </div>
                      <?php } ?>  
                      <!--Appended here-->
                  </div>
                </div>
              </div>
            </div><!--end col-->
           
          </div><!--end row-->
          
           <div class="row">
           <div class="col-lg-11">
                
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>PIC</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <table class="table" id="pic-table">
                 <thead>
                    <tr>
                        <th>Nama PIC</th>
                        <th>Telp</th>
                        <th>Email</th>
                        <th>Sales</th>
                    </tr>
                 <thead>
                 <tbody>
                   <?php foreach($pic as $pi){ ?>
                    <tr>
                        <td><input class="form-control" value="<?php echo $pi['nama_pic']?>" readonly></td>
                        <td><input class="form-control" value="<?php echo $pi['telp_pic']?>" readonly></td>
                        <td><input class="form-control" value="<?php echo $pi['email_pic']?>" readonly></td>
                        <td><input class="form-control" value="<?php echo $pi['nama']?>" readonly></td>
                    </tr>
                    <?php } ?>  
                 </tbody>
                </table>
                
             </div>
             </div>
             </div>
           </div><!--end row-->
           
           <div class="row">
            <div class="col-lg-6">
            <a href="<?php echo base_url();?>client/listc" class="btn btn-primary"><< Back</a>
        
            </div>
           </div><!--end row-->
           
        </form>
</div>
<!-- /#page-wrapper -->

