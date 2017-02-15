<div id="page-wrapper">
   <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Accesories</b>
                </div>
                <!-- /.panel-heading -->
                 <div class="panel-body">
                    
                       <form role="form">
                           
                             <div class="form-group input-group col-lg-4">
                                 <span class="input-group-btn">
                                     <a href="<?php echo base_url();?>product/accesories/add" class="btn btn-success">
                                        <i class="fa fa-plus"></i> Add
                                       </a>
                                </span>
                                
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
                                    <th>SKU</th>
                                    <th>Desc</th>
                                    <th>Stock</th>
                                    <th>Unit</th>
                                    <th>Keterangan</th>
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
</div><!-- /#page-wrapper -->
<script>
    
    function get_data(url,q){
        
        if(!url)
            url = base_url+'product/accesories/get_data';
        
        $.ajax({
            
            url:url,type:'post',dataType:'json',
            data:{q:q},
            success:function(result){
                
                $("#data-table tbody").html(result.rows);
                $("ul.pagination").html(result.paging);
                $(".page-info").html(result.page_info);
            }
        
        });
    } 
    function do_search(){
    
                
        get_data('',$("#search").val());
      
    }
    $(function(){
    
        get_data();//initialize
        
        $(document).on('click',"ul.pagination>li>a",function(){
        
            var href = $(this).attr('href');
            get_data(href);
            
            return false;
        });
        
        $("#search").keypress(function(e){
            
            var key= e.keyCode ? e.keyCode : e.which ;
            if(key==13){ //enter
                
                do_search();
            }
            
        });
        
        $("#btn-search").click(function(){
            
            do_search();
            
            return false;
        });
        
    });

</script>
