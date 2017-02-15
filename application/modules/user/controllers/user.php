<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata('is_login'))redirect('login');
		$this->load->model('user_model');
		$this->session->set_userdata('menu','user_management');
		if(!$this->general->privilege_check(USER,'view'))
		    $this->general->no_access();
	}
	
	public function index(){
	    
	    $data = array('title'=>'User - Tekno Power');
	    $this->_render('user',$data);
		
	}
	
	private function _render($view,$data = array()){
	    
	    $this->load->view('header',$data);
	    $this->load->view('sidebar');
	    $this->load->view($view,$data);
	    $this->load->view('footer');
	}
	
	
	public function profile(){
	    
	    $data = array('title'=>'User - Tekno Power');
	    $this->_render('profile',$data);		
	}
	
	
	public function profile_update(){
	    
	    $data = $this->input->post(null,true);
	    
	    
	    $arr['nama']= $data['nama'];
	    if($data['password']!=''){
	        
	        $arr['password'] = md5($data['password']);
	    }
	    
	    $update = $this->db->update('user',$arr,array('id_user'=>$this->session->userdata('id_user')));
        
        if($update){
            
            $this->session->set_userdata('nama',$data['nama']);
            redirect('user/profile/1');
        }
	}
	
	private function _select_jabatan(){
	
	    return $this->db->get('jabatan_user')->result();
	}
	
	public function get_data(){
	    	    
	    $limit = $this->config->item('limit');
	    $offset= $this->uri->segment(3,0);
	    $q     = isset($_POST['q']) ? $_POST['q'] : '';	    
	    $data  = $this->user_model->get_data($offset,$limit,$q);
	    $rows  = $paging = '';
	    $total = $data['total'];
	    
	    if($data['data']){
	        
	        $i= $offset+1;
	        $j= 1;
	        foreach($data['data'] as $r){
	            
	            $rows .='<tr>';
	                
	                $rows .='<td>'.$i.'</td>';
	                $rows .='<td width="15%">'.$r->nik.'</td>';
	                $rows .='<td width="20%">'.$r->nama.'</td>';
	                $rows .='<td width="15%">'.$r->username.'</td>';
	                $rows .='<td width="20%">'.$r->jabatan.'</td>';
	                $rows .='<td width="40%" align="center">';
	                
	                $rows .='<a title="Edit" class="a-warning" href="'.base_url().'user/edit/'.$r->id_user.'">
	                            <i class="fa fa-pencil"></i> Edit
	                        </a> ';
	                if($r->id_user!=1){
	                
	                    $rows .='<a title="Delete" class="a-danger" href="'.base_url().'user/delete/'.$r->id_user.'">
	                                <i class="fa fa-times"></i> Delete
	                            </a> ';
	                }
	               $rows .='</td>';
	            
	            $rows .='</tr>';
	            
	            ++$i;
	            ++$j;
	        }
	        
	        $paging .= '<li><span class="page-info">Displaying '.($j-1).' Of '.$total.' items</span></i></li>';
            $paging .= $this->_paging($total,$limit);
	        	       	        
	    	    
	    }else{
	        
	        $rows .='<tr>';
	            $rows .='<td colspan="6">No Data</td>';
	        $rows .='</tr>';
	        
	    }
	    
	    echo json_encode(array('rows'=>$rows,'total'=>$total,'paging'=>$paging));
	}
	
	
	private function _paging($total,$limit){
	
	    $config = array(
                
            'base_url'  => base_url().'user/get_data/',
            'total_rows'=> $total, 
            'per_page'  => $limit,
			'uri_segment'=> 3
        
        );
        $this->pagination->initialize($config); 

        return $this->pagination->create_links();
	}
	
	
	public function add(){
	    
	    if(!$this->general->privilege_check(USER,'add'))
		    $this->general->no_access();
	    
	    $data = array('title'=>'Add User - Tekno Power','select_jabatan'=>$this->_select_jabatan());
        $this->_render('add',$data);		
	    	   
	}
	
	public function edit(){
	    
	    if(!$this->general->privilege_check(USER,'edit'))
		    $this->general->no_access();
	    
	    $id = $this->uri->segment(3);
	    $get = $this->db->get_where('user',array('id_user'=>$id))->row_array();
	    if(!$get)
	        show_404();
	        
	    $data = array('title'=>'Edit User - Tekno Power','id_user'=>$id,'select_jabatan'=>$this->_select_jabatan());
        $this->_render('edit',array_merge($data,$get));		
	    	   
	}
	
	public function save(){
	    
	     $data = $this->input->post(null,true);
	     
	     $send = $this->user_model->save($data);
	     if($send)
	        redirect('user');
	}
	
	public function update(){
	    
	     $data = $this->input->post(null,true);
	     $send = $this->user_model->update($data);
	     if($send)
	        redirect('user');
	}
	
	


}
