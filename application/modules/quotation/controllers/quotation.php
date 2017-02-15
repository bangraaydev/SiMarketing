<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotation extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata('is_login'))redirect('login');
		if(!$this->general->privilege_check(QUOTATION,'view'))
		    $this->general->no_access();
		$this->session->set_userdata('menu','quotation');	
		$this->load->model('quotation_model');
	}
	
	public function index(){
	    
	    $data = array('title'=>'List Client - Tekno Power');
	    $this->_render('quotation',$data);
		
	}
	
	private function _render($view,$data = array()){
	    
	    $this->load->view('header',$data);
	    $this->load->view('sidebar');
	    $this->load->view($view,$data);
	    $this->load->view('footer');
	}
	
	public function add(){
        
        $data = array(
            
            'title'=>'Add Quotation - Tekno Power',
        );
        $this->_render('add',$data);
        
    }
    
    public function do_proses(){
    
        $POST = $this->input->post(null,true);
        $save = $this->quotation_model->save_quotation($POST);
        if($save){
            
            $data = array(
                
                'title'=>'Proses Quotation - Tekno Power',
                'no_ref'=>$save['no_ref']
            );
            $this->_render('proses',array_merge($data,$POST));
            
        }else{
            
            show_error("Terjadi kesalahan,mohon Back dan ulangi");
        }
        
    }
    
    public function pop_user(){
         
         //jabatan_id 3 = sales
         $get_sales = $this->db->get_where('user',array('jabatan_id'=>3))->result();
         if($get_sales){
            
           $this->load->view('pop_user',array('data'=>$get_sales));
         }else{
            
            $this->load->view('pop_user',array('data'=>false));
         }         
         
    }
    
   
    public function pop_client(){
         
         
         $get_client = $this->quotation_model->get_pic_n_client();
         if($get_client){
            
           $this->load->view('pop_client',array('data'=>$get_client));
         }else{
            
            $this->load->view('pop_client',array('data'=>false));
         }         
         
    }
    
    public function pop_area(){
         
         
         $get_area = $this->db->get('area')->result(); 
         if($get_area){
            
           $this->load->view('pop_area',array('data'=>$get_area));
         }else{
            
            $this->load->view('pop_area',array('data'=>false));
         }         
         
    }
    
	
}//end class
