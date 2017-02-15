<div id="page-wrapper">
   <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Quotation</b>
                </div>
                <!-- /.panel-heading -->
                 <div class="panel-body">
                      <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Add New
                                </div>
                                <div class="panel-body">
                                    <form role="form" class="" method="post" action="<?php echo base_url();?>quotation/do_proses">
                                     <div class="col-lg-4">   
                                         <div class="form-group">
                                             
                                            <label>From
                                              <a href="<?php echo base_url();?>quotation/pop_user" title="Click to Select Sales" 
                                                data-toggle="modal" data-target="#popUser">
                                                <i class="fa fa-search"></i>
                                              </a>
                                            </label>
                                            
                                            <input type="hidden" name="id_sales" id="id_sales" class="form-control" required>
                                            <input type="text" name="sales" id="sales" class="form-control" required="true" readonly="readonly">
                                             
                                         </div>
                                         <div class="form-group">
                                             <label>Subject </label>
                                             <input type="text" name="subject" class="form-control" required>
                                         </div>
                                         
                                      </div>
                                       <div class="col-lg-4">  
                                        <div class="form-group">
                                           <label>To
                                             <a href="<?php echo base_url();?>quotation/pop_client" title="Click to Select Client" 
                                                data-toggle="modal" data-target="#popClient">
                                                <i class="fa fa-search"></i>
                                              </a>
                                            </label>
                                            <input type="hidden" name="id_client" id="id_client" class="form-control" required>
                                            <input type="hidden" name="id_pic" id="id_pic" class="form-control" required>
                                            <input type="hidden" name="initial_client" id="initial_client" class="form-control" required>
                                            <input type="text" name="to" id="to" class="form-control" required readonly>
                                         
                                         </div>
                                         <div class="form-group">
                                            <label>Company</label>
                                            <input type="text" name="company" id="company" class="form-control" readonly required>
                                        </div>
                                       </div>
                                        <div class="col-lg-4">  
                                        <div class="form-group">
                                           <label>No Telp</label>
                                            <input type="text" name="no_telp" id="no_telp" class="form-control" readonly required>
                                         
                                         </div>
                                         <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" class="form-control" readonly required>
                                        </div>
                                       </div>
                                       <div style="margin-left:17px">
                                         <button type="submit" class="btn btn-primary">Proses</button>
                                         <button type="reset" class="btn btn-warning">Reset</button>
                                        </div>
                                        
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                        
                        
                        
                      </div><!--End row-->
                      <hr/>
                       <form role="form">
                           
                             <div class="form-group input-group col-lg-4">
                                 <input type="text" class="form-control" id="search" placeholder="Search..." x-webkit-speech>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="btn-search"><i class="fa fa-search"></i></button>
                                </span>
                              
                            </div>
                        </form>           
                          
                          <div class="table-responsive">
                              <table id="data-table" class="table table-striped table-bordered table-hover" >
                               <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Ref</th>
                                    <th>From</th>
                                    <th>Subject</th>
                                    <th>To</th>
                                    <th>Company</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <!--Appended by Ajax-->
                            </tbody>
                     </table>
                   </div>
                   <!-- /.table-responsive -->
                     <div class="pull-right">
                        <ul class="pagination"></ul>    
                     </div> 
                     
                       
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    
    <!--Popup user-->
    <div class="modal fade" id="popUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<!--Modal will be injected here-->
	</div> 
    <!--Popup Client-->
    <div class="modal fade" id="popClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<!--Modal will be injected here-->
	</div> 

    
</div><!-- /#page-wrapper -->

