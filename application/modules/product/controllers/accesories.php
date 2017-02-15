<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accesories extends CI_Controller{
	
	private $_mod_url;
	
	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata('is_login'))redirect('login');
		if(!$this->general->privilege_check(ACCESORIES,'view'))
		    $this->general->no_access();
		$this->session->set_userdata('menu','katalog');	
		$this->session->set_userdata('menu','product');
		$this->load->model('accesories_model');
		$this->_mod_url = base_url().'product/accesories';
	}
	
	private function _render($view,$data = array()){
	    
	    $this->load->view('header',$data);
	    $this->load->view('sidebar');
	    $this->load->view($view,$data);
	    $this->load->view('footer');
	}
	
	public function index(){
	  
	    $data = array('title'=>'Accesories - Tekno Power');
	    $this->_render('accesories',$data);
	}
	
	public function get_data(){
	    	    
	    $limit = $this->config->item('limit');
	    $offset= $this->uri->segment(4,0);
	    $q     = isset($_POST['q']) ? $_POST['q'] : '';	    
	    $data  = $this->accesories_model->get_data($offset,$limit,$q);
	    $rows  = $paging = '';
	    $total = $data['total'];
	    
	    if($data['data']){
	        
	        $i= $offset+1;
	        $j= 1;
	        foreach($data['data'] as $r){
	            
	            $rows .='<tr>';
	                
	                $rows .='<td>'.$i.'</td>';
	                $rows .='<td width="15%">'.$r->sku.'</td>';
	                $rows .='<td width="20%">'.$r->deskripsi.'</td>';
	                $rows .='<td width="7%">'.$r->stock.'</td>';
	                $rows .='<td width="8%">'.$r->unit.'</td>';
	                $rows .='<td width="15%">'.$r->keterangan.'</td>';
	                $rows .='<td width="12%">'.$this->_status($r->status).'</td>';
	                $rows .='<td width="30%" align="center">';
	                
	                $rows .='<a title="Edit" class="a-success" href="'.$this->_mod_url.'/detail/'.$r->id_accesories.'">
	                            <i class="fa fa-lightbulb-o"></i> Detail
	                        </a> ';
	                $rows .='<a title="Edit" class="a-warning" href="'.$this->_mod_url.'/edit/'.$r->id_accesories.'">
	                            <i class="fa fa-pencil"></i> Edit
	                        </a> ';
	                $rows .='<a title="Delete" class="a-danger" href="'.$this->_mod_url.'/delete/'.$r->id_accesories.'">
	                                <i class="fa fa-times"></i> Delete
	                            </a> ';
	                
	               $rows .='</td>';
	            
	            $rows .='</tr>';
	            
	            ++$i;
	            ++$j;
	        }
	        
	        $paging .= '<li><span class="page-info">Displaying '.($j-1).' Of '.$total.' items</span></i></li>';
            $paging .= $this->_paging($total,$limit);
	        	       	        
	    	    
	    }else{
	        
	        $rows .='<tr>';
	            $rows .='<td colspan="10">No Data</td>';
	        $rows .='</tr>';
	        
	    }
	    
	    echo json_encode(array('rows'=>$rows,'total'=>$total,'paging'=>$paging));
	}
	
	
	private function _paging($total,$limit){
	
	    $config = array(
                
            'base_url'  => $this->_mod_url.'/get_data/',
            'total_rows'=> $total, 
            'per_page'  => $limit,
			'uri_segment'=> 4
        
        );
        $this->pagination->initialize($config); 

        return $this->pagination->create_links();
	}
	
   
	private function _status($take=''){
	    
	    $status = array('A'=>'Active','C'=>'On Catalogue','D'=>'Discontinue');
	    if($take)
	        return $status[$take];
	    return $status;
	}
	private function _warranty(){
	    
	    $warranty = array('0','1','2','3','4','5');
	    return $warranty;
	}
	public function add(){
	    
	    if(!$this->general->privilege_check(ACCESORIES,'add'))
		    $this->general->no_access();
	    
	    $data = array('title'=>'Add accesories - Tekno Power',
	                    'status'=>$this->_status(),
	                    'warranty'=>$this->_warranty()
	                    );
        $this->_render('add_accesories',$data);		
	    	   
	}
	public function detail(){
	    
	    $id = $this->uri->segment(4);
	    $seg5 = $this->uri->segment(5,0); //pass from katalog
	    if($seg5==='katalog-accesories'){
	        
	        $this->session->set_userdata('menu','katalog');
	    }
	    $detail = $this->accesories_model->get_detail($id);
	    $detail['status'] = $this->_status($detail['status']);
	    $data = array(
	                'title'=>'Detail accesories - Tekno Power',
	                'detail'=>$detail
	            );
	    $this->_render('detail_accesories',$data);
	}
	public function edit(){
	    
	    if(!$this->general->privilege_check(ACCESORIES,'edit'))
		    $this->general->no_access();
	    
	    $id = $this->uri->segment(4);
	    $detail = $this->accesories_model->get_detail($id);
	    if(!$detail)
	        show_404();
	        
	    $data = array(
	                'title'=>'Edit accesories - Tekno Power',
	                'warranty'=>$this->_warranty(),
	                'status'=>$this->_status(),
	                'detail'=>$detail
	            );
        $this->_render('edit_accesories',$data);		
	    	   
	}
	
	public function save(){
	    
	    $data = $this->input->post(null,true);
        
        $cek = $this->db->select('id_accesories')->where('sku',$data['sku'])
                            ->get('prod_accesories')->num_rows();
        //if already exists
        if($cek){
        
            redirect('product/accesories'); //smntara 
            break;
        }
        
        $flag=0;
        $rename_file = array();
        for($i=0;$i<count($_FILES['pic']['name']);$i++){
           
            if($_FILES['pic']['name'][$i]){
               
               $rename_file[$i] = 'pic'.($i+1).'_'.$_FILES['pic']['name'][$i];
               $flag++;
            }else{
                
                $rename_file[$i] = '';
            }
        }
        

        //if files are selected
        if($flag > 0){
            
           
            $this->load->library('upload');
            $this->upload->initialize(array(
                'file_name'     => $rename_file,
                'upload_path'   => './assets/images/accesories/',
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size'      => '2000' //Max 2MB
            ));
            
            
		    if ($this->upload->do_multi_upload('pic')){
					
			    $info = $this->upload->get_multi_upload_data();
			    
			    foreach($info as $in){			
			       
			       $picx = substr($in['file_name'],0,4);
	               $data[$picx] = $in['file_name'];
	               
	            }
		    }
		    else{
		
			    
			    $error = array('error' => $this->upload->display_errors());
                echo "Errors Occured : "; //sini aja lah
                print_r($error);
			
		    }
	    }
	     
	  //print_r($data);exit;
	   $send = $this->accesories_model->save($data);
	   if($send)
	      redirect('product/accesories');
	}
	
	public function update(){
	    
	    $data = $this->input->post(null,true);
	    				
		$flag=0;
        $rename_file = array();
        for($i=0;$i<count($_FILES['pic']['name']);$i++){
           
            if($_FILES['pic']['name'][$i]){
               
              $rename_file[$i] = 'pic'.($i+1).'_'.trim($_FILES['pic']['name'][$i]);
               $flag++;
               
            }else{
                
                $rename_file[$i] = '';
            }
        }
        //print_r($rename_file);exit;      
        //if files are selected
        if($flag > 0){
            
            
            $this->load->library('upload');
            $this->upload->initialize(array(
                'file_name'     => $rename_file,
                'upload_path'   => './assets/images/accesories/',
                'allowed_types' => 'gif|jpg|jpeg|png',
                'max_size'      => '2000' //Max 2MB
            ));
            
            
		    if ($this->upload->do_multi_upload('pic')){
					
			    $info = $this->upload->get_multi_upload_data();
			    
			    foreach($info as $in){			
			       
			       $picx = substr($in['file_name'],0,4);
	               $data[$picx] = $in['file_name'];
	               
	            }
			   
		    }
		    else{
		
			    
			    $error = array('error' => $this->upload->display_errors());
                echo "Errors Occured : "; //sini aja lah
                print_r($error);
			
		    }
	    }
       
      
	   $send = $this->accesories_model->update($data);
	   if($send)
	      redirect('product/accesories');
	}
	
	
	//remove files
	public function unlink(){
	
	    $data = $this->input->post(null,true);
	    
	    if(unlink('./assets/images/accesories/'.$data['img'])){
	        
	        $column = substr($data['img'],0,4); //pic1,pic2 etc...
	        $this->db->update('prod_accesories',array($column=>''),array('id_accesories'=>$data['id_accesories']));
	        
	       echo json_encode(array('status'=>true)); 
	    }
	    
	}
	
	public function delete(){
	
	    if(!$this->general->privilege_check(ACCESORIES,'remove'))
		    $this->general->no_access();
		
		$id = $this->uri->segment(4);
		$del = $this->accesories_model->delete($id);
		
		if($del)
		    redirect('product/accesories');
	}
	
    
  
}
