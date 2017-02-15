<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Katalog extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata('is_login'))redirect('login');
		if(!$this->general->privilege_check(KATALOG,'view'))
		    $this->general->no_access();
		$this->session->set_userdata('menu','katalog');	    
	    $this->load->helper('text');//helper ini udh diupdate ke php > 5.3
	}
	
	//default = lampu
	public function index(){
	    
	    $tipe_lamp = $this->_select_tipe_lampu();
	    
	    $data = array('title'=>'Katalog Lampu - Tekno Power','tipe_lamp'=>$tipe_lamp);	   
	    $this->_render('lampu',$data);
		
	}
	
	public function fixture(){
	    
	    $tipe_fixture = $this->_select_tipe_fixture();
	    $data = array('title'=>'Katalog Fixture - Tekno Power','tipe_fixture'=>$tipe_fixture);	   
	    $this->_render('fixture',$data);
	}
	public function accesories(){
	    
	    $data = array('title'=>'Katalog Accesories - Tekno Power');	   
	    $this->_render('accesories',$data);
	}
	private function _img_swicth($pic1='',$pic2='',$pic3='',$pic4=''){
	
	   $img = '';
       if($pic1){
          $img = $pic1;
       }elseif($pic2){
         $img = $pic2;
       }
       elseif($pic3){
         $img = $pic3;
       }
       elseif($pic4){
         $img = $pic4;
       }
	    
	   return $img;
	}
	private function _select_tipe_lampu(){
	    return $this->db->get('tipe_lamp')->result();
	}
	private function _select_tipe_fixture(){
	    return $this->db->get('tipe_fixture')->result();
	}
	public function get_lampu(){
	    
	    $this->load->model('product/lampu_model');
	    
	    
	    $limit = 8;
	    $offset= $this->uri->segment(3,0);
	    $q     = isset($_POST['q']) ? $_POST['q'] : '';	  
	    $filter= isset($_POST['filter']) ? $_POST['filter'] : '';	    
	    $data  = $this->lampu_model->get_data($offset,$limit,$q,$filter);
	    $rows  = $paging = '';
	    $total = $data['total'];
	    
	    if($data['data']){
	    
	         $j= 1;
	        foreach($data['data'] as $r){
	            
	           $img_src = base_url().'assets/images/lampu/';
	           $img = base_url().'assets/images/not_found.png';
	           $swimg = $this->_img_swicth($r->pic1,$r->pic2,$r->pic3,$r->pic4);
	           if($swimg){
	            $img  =$img_src.$swimg;
	           }
	           $rows .='<div class="col-lg-3">
                        <div class="thumbnail">
                         <img src="'.$img.'" style="height:150px" class="img-responsive">
                         <div class="caption">
                            <h5>SKU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$r->sku.'</h5>
                            <h5>Desc&nbsp;&nbsp;&nbsp;&nbsp;: '.character_limiter($r->deskripsi,10).'</h5>
                            <h5>Warna&nbsp;: '.$r->warna.'</h5>
                            <p><a href="'.base_url().'product/lampu/detail/'.$r->id_lamp.'/katalog-lampu" class="btn btn-primary">Detail</a></p>
                          </div>
                        </div>
                    </div>';
	                	                
	        ++$j;
	        }
	        
	        $paging .= '<span class="page-info">Displaying '.($j-1).' Of '.$total.' items</span></i>';
            $paging .= $this->_paging($total,$limit,base_url().'katalog/get_lampu'); 
	    
	    }
	    
	    echo json_encode(array('rows'=>$rows,'total'=>$total,'paging'=>$paging));
	}
	
	public function get_fixture(){
	    
	    $this->load->model('product/fixture_model');
	    	    
	    $limit = 8;
	    $offset= $this->uri->segment(3,0);
	    $q     = isset($_POST['q']) ? $_POST['q'] : '';
	    $filter= isset($_POST['filter']) ? $_POST['filter'] : '';	    
	    $data  = $this->fixture_model->get_data($offset,$limit,$q,$filter);
	    $rows  = $paging = '';
	    $total = $data['total'];
	    if($data['data']){
	    
	         $j= 1;
	        foreach($data['data'] as $r){
	            
	           $img_src = base_url().'assets/images/fixture/';
	           $img = base_url().'assets/images/not_found.png';
	           $swimg = $this->_img_swicth($r->pic1,$r->pic2,$r->pic3,$r->pic4);
	           if($swimg){
	            $img  =$img_src.$swimg;
	           }
	           $rows .='<div class="col-lg-3">
                        <div class="thumbnail">
                         <img src="'.$img.'" style="height:150px" class="img-responsive">
                         <div class="caption">
                            <h5>SKU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$r->sku.'</h5>
                            <h5>Desc&nbsp;&nbsp;&nbsp;&nbsp;: '.character_limiter($r->deskripsi,20).'</h5>
                            <h5>Warna&nbsp;: '.$r->lamp.'</h5>
                            <h5>IP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$r->ip.'</h5>
                            <p><a href="'.base_url().'product/fixture/detail/'.$r->id_fixture.'/katalog-fixture" class="btn btn-primary">Detail</a></p>
                          </div>
                        </div>
                    </div>';
	                	                
	        ++$j;
	        }
	        
	        $paging .= '<span class="page-info">Displaying '.($j-1).' Of '.$total.' items</span></i>';
            $paging .= $this->_paging($total,$limit,base_url().'katalog/get_fixture'); 
	    
	    }
	    
	    echo json_encode(array('rows'=>$rows,'total'=>$total,'paging'=>$paging));
	}
	private function _status($take=''){
	    
	    $status = array('A'=>'Active','C'=>'On Catalogue','D'=>'Discontinue');
	    if($take)
	        return $status[$take];
	    return $status;
	}
	public function get_accesories(){
	    
	    $this->load->model('product/accesories_model');
	    	    
	    $limit = 8;
	    $offset= $this->uri->segment(3,0);
	    $q     = isset($_POST['q']) ? $_POST['q'] : '';	    
	    $data  = $this->accesories_model->get_data($offset,$limit,$q);
	    $rows  = $paging = '';
	    $total = $data['total'];
	    
	    if($data['data']){
	    
	         $j= 1;
	        foreach($data['data'] as $r){
	            
	           $img_src = base_url().'assets/images/accesories/';
	           $img = base_url().'assets/images/not_found.png';
	           $swimg = $this->_img_swicth($r->pic1,$r->pic2,$r->pic3,$r->pic4);
	           if($swimg){
	            $img  =$img_src.$swimg;
	           }
	           
	           $rows .='<div class="col-lg-3">
                        <div class="thumbnail">
                         <img src="'.$img.'" style="height:150px" class="img-responsive">
                         <div class="caption">
                            <h5>SKU&nbsp;&nbsp;&nbsp;&nbsp;: '.$r->sku.'</h5>
                            <h5>Desc&nbsp;&nbsp;&nbsp;: '.character_limiter($r->deskripsi, 20).'</h5>
                            <h5>Status&nbsp;: '.$this->_status($r->status).'</h5>
                            <h5>Ket&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.character_limiter($r->keterangan, 20).'</h5>
                            <p><a href="'.base_url().'product/accesories/detail/'.$r->id_accesories.'/katalog-accesories" class="btn btn-primary">Detail</a></p>
                          </div>
                        </div>
                    </div>';
	                	                
	        ++$j;
	        }
	        
	        $paging .= '<span class="page-info">Displaying '.($j-1).' Of '.$total.' items</span></i>';
            $paging .= $this->_paging($total,$limit,base_url().'katalog/get_accesories'); 
	    
	    }
	    
	    echo json_encode(array('rows'=>$rows,'total'=>$total,'paging'=>$paging));
	}
	
	private function _render($view,$data = array()){
	    
	    $this->load->view('header',$data);
	    $this->load->view('sidebar');
	    $this->load->view('katalog');
	    $this->load->view($view);
	    $this->load->view('footer');
	}
	
	
	private function _paging($total,$limit,$url){
	
	    $config = array(
                
            'base_url'  => $url,
            'total_rows'=> $total, 
            'per_page'  => $limit,
			'uri_segment'=> 3
        
        );
        $this->pagination->initialize($config); 

        return $this->pagination->create_links();
	}
	
}
