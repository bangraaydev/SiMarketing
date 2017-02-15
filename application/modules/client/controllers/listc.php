<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listc extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata('is_login'))redirect('login');
		if(!$this->general->privilege_check(CLIST,'view'))
		    $this->general->no_access();
		$this->session->set_userdata('menu','client');	
		$this->load->model('listc_model');
	}
	
	public function index(){
	    
	    $data = array('title'=>'List Client - Tekno Power');
	    $this->_render('client',$data);
		
	}
	
	private function _render($view,$data = array()){
	    
	    $this->load->view('header',$data);
	    $this->load->view('sidebar');
	    $this->load->view($view,$data);
	    $this->load->view('footer');
	}
	private function _select_tipe(){
	    
	    return $this->db->get('tipe_client')->result();
	}
	private function _select_project(){
	    
	    return $this->db->get('project')->result();
	}
	private function _select_sales(){
	    
	    return $this->db->get_where('user',array('jabatan_id'=>3))->result();
	}
	public function add(){
	
	    if(!$this->general->privilege_check(CLIST,'add'))
		    $this->general->no_access();
		    
	    $data = array(
	            'title'=>'Add Client - Tekno Power',
	            'select_tipe' => $this->_select_tipe(),
	            'select_project'=> $this->_select_project(),
	            'select_sales'=>$this->_select_sales(),
	         );
	         
	    $this->_render('add_client',$data);
	}
	public function save(){
	
	    $data = $this->input->post(null,true);
	    if($this->listc_model->save($data)){
	        
	        redirect('client/listc');
	        
	    }else{
	        
	        show_error("Error occured, please try again");
	    }
	}
	
	public function detail(){
	    
	    if(!$this->general->privilege_check(CLIST,'view'))
		    $this->general->no_access();
	    
	    $id_client = $this->uri->segment(4);
	    $client = $this->listc_model->get_client($id_client);
	    $pic    = array();
	    $project= array();
	    if(!$client){
	        show_404();
	    }else{
	        
	        $project = $this->listc_model->get_project($id_client);
	        $pic = $this->listc_model->get_pic($id_client);
	    }    
	    $data = array(
	        'title'=>'Detail Client - Tekno Power',
	        'project' => $project,'pic'=>$pic,'client'=>$client);
	    
	    $this->_render('detail_client',$data);
	}
	public function edit(){
	    
	    if(!$this->general->privilege_check(CLIST,'edit'))
		    $this->general->no_access();
	    
	    $id_client = $this->uri->segment(4);
	    $client = $this->listc_model->get_client($id_client);
	    $pic    = array();
	    $project= array();
	    if(!$client){
	        show_404();
	    }else{
	        
	        $project = $this->listc_model->get_project($id_client);
	        $pic = $this->listc_model->get_pic($id_client);
	    }    
	    $data = array(
	        'title'=>'Detail Client - Tekno Power','id_client'=>$id_client,
	        'project' => $project,'pic'=>$pic,'client'=>$client,
	        'select_tipe' => $this->_select_tipe(),
            'select_project'=> $this->_select_project(),
            'select_sales'=>$this->_select_sales(),
	        );
	    
	    $this->_render('edit_client',$data);
	}
	
	public function update(){
	
	    $data = $this->input->post(null,true);
	    if($this->listc_model->update($data)){
	        
	        redirect('client/listc');
	        
	    }else{
	        
	        show_error("Error occured, please try again");
	    }
	}
	
	public function delete(){
	
	    if(!$this->general->privilege_check(CLIST,'remove'))
		    $this->general->no_access();
		    
		$id_client = $this->uri->segment(4);
		$this->listc_model->delete($id_client);
		
		redirect('client/listc');
	}
	
	
	//fill the table
	public function get_data(){
	    	    
	    $limit = $this->config->item('limit');
	    $offset= $this->uri->segment(4,0);
	    $q     = isset($_POST['q']) ? $_POST['q'] : '';	    
	    $data  = $this->listc_model->get_data($offset,$limit,$q);
	    $rows  = $paging = '';
	    $total = $data['total'];
	    
	    if($data['data']){
	        
	        $i= $offset+1;
	        $j= 1;
	        foreach($data['data'] as $r){
	            
	            $rows .='<tr>';
	                
	                $rows .='<td>'.$i.'</td>';
	                $rows .='<td width="12%">'.$r->kode_client.'</td>';
	                $rows .='<td width="10%">'.$r->initial.'</td>';
	                $rows .='<td width="20%">'.$r->nama_pt.'</td>';
	                $rows .='<td width="12%">'.$r->kota.'</td>';
	                $rows .='<td width="10%">'.$r->desc_tipe.'</td>';
	                $rows .='<td width="30%" align="center">';
	                
	                $rows .='<a title="Edit" class="a-success" href="'.base_url().'client/listc/detail/'.$r->id_client.'">
	                            <i class="fa fa-lightbulb-o"></i> Detail
	                        </a> ';
	                $rows .='<a title="Edit" class="a-warning" href="'.base_url().'client/listc/edit/'.$r->id_client.'">
	                            <i class="fa fa-pencil"></i> Edit
	                        </a> ';
	                $rows .='<a title="Delete" class="a-danger" href="'.base_url().'client/listc/delete/'.$r->id_client.'">
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
	            $rows .='<td colspan="6">No Data</td>';
	        $rows .='</tr>';
	        
	    }
	    
	    echo json_encode(array('rows'=>$rows,'total'=>$total,'paging'=>$paging));
	}
	
	private function _paging($total,$limit){
	
	    $config = array(
                
            'base_url'  => base_url().'client/listc/get_data/',
            'total_rows'=> $total, 
            'per_page'  => $limit,
			'uri_segment'=> 4
        
        );
        $this->pagination->initialize($config); 

        return $this->pagination->create_links();
	}


}
