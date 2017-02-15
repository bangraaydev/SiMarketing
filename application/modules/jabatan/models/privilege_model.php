<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Privilege_model extends CI_Model{
    
    
    public function check_privilege($id){
	
	    return $this->db->limit(1)->get_where('akses_user',array('jabatan_id'=>$id))->num_rows();
	
	}
	public function get_role($modul,$id){
	
	    $sql = "SELECT * FROM akses_user WHERE modul = '%s' AND jabatan_id = %d ";
		$q = $this->db->query(sprintf($sql,$modul,$id));
		if($q->num_rows() > 0)
			return $q->row_array();
		else 
			return $q = array('view'=>'','add'=>'','edit'=>'','remove'=>'');
	}
    private function _olah_modul($data){
	
		$module = $this->modul(); 
		$m = array();
		$n = array();
		foreach($data['data'] as $page_id=>$x){
			
			$m[] = $page_id;
				
		}
		
		foreach($module as $mdl){
		  
			if(!in_array($mdl['const'],$m)){
				
				$n[]= $mdl['const'];
			}
			
			if(isset($mdl['anak'])){
		    
		        foreach($mdl['anak'] as $k){
		            
		            if(!in_array($k['const'],$m)){
		               $n[]= $k['const'];
		            }
		        }   
		    }
		
		}
		
		return $n;
	}
	
	
    public function save($data){
        
               
        $arr = array();
		
		foreach($data['data'] as $page_id=>$page_akses){
			
			if(!isset($page_akses['view']))	$page_akses['view']  = 0; 
			if(!isset($page_akses['add']))	$page_akses['add'] = 0;
			if(!isset($page_akses['edit']))	$page_akses['edit']   = 0;
			if(!isset($page_akses['remove']))$page_akses['remove']  = 0; 
			if(!isset($page_akses['cetak']))$page_akses['cetak']  = 0; 
			
			$tmp = array(
					
					'jabatan_id' => $data['jabatan_id'],
					'modul'=>$page_id,
					'view'=>$page_akses['view'],
					'add'=>$page_akses['add'],
					'edit'=>$page_akses['edit'],
					'remove'=>$page_akses['remove'],
					'cetak'=>$page_akses['cetak'],
			);
			
			$arr[] = $tmp;		
		}
		
		/*meski tidak di centang...maka ttep sertakan array nya...*/
		//take CONST where the modul is not checked (add,view etc) nya
        $n  = $this->_olah_modul($data);
		$vv = array();
		foreach($n as $o){
			$vv[]= array(
							
						'jabatan_id' => $data['jabatan_id'],
						'modul'=>$o,
						'view'=>0,
						'add'=>0,
						'edit'=>0,
						'remove'=>0,
						'cetak'=>0,
					);
		}
		
		//remove first if exist
		$this->db->trans_begin();
		    $this->db->delete('akses_user',array('jabatan_id'=>$data['jabatan_id']));
		    $this->db->insert_batch('akses_user',array_merge($arr,$vv));
		if($this->db->trans_status()===false){
		    
		    $this->db->trans_rollback();
		    return false;
		}else{
		    
		    $this->db->trans_commit();
		    return true;
		}
    }
    
    
    /*COnfigure modul*/
	public function modul(){
	
		$module= array(
		
			        array(
			        
						'const'=>'PRODUK',
						'induk'=>true,
						'name'=>'Product',
						'anak'=> array(
						    
						    array(
						    
						        'const'=>'LAMPU',
						        'name'=>'Lampu'
						    ),
						    array(
						        
						        'const'=>'FIXTURE',
						        'name'=>'Fixture'
						    ),
						    array(
						        
						        'const'=>'ACCESORIES',
						        'name'=>'Accesories'
						    ),
						)
					),
					array(
					
					    'const'=>'KATALOG',
					    'induk'=>true,
						'name'=>'Katalog',
					),
					array(
					
					    'const'=>'CLIENT',
					    'induk'=>true,
						'name'=>'Client',
						'anak'=> array(
						    
						    array(
						    
						        'const'=>'CLIST',
						        'name'=>'List Client'
						    ),
						    array(
						    
						        'const'=>'CPROJECT',
						        'name'=>'Project'
						    ),
						 )
					),
					
					array(
					
					    'const'=>'REPORT',
					    'induk'=>true,
						'name'=>'Report',
						'anak'=> array(
						    
						    array(
						    
						        'const'=>'REPORT_QUOTATION',
						        'name'=>'Report Quotation'
						    ),
						 )
					),
					array(
					
					    'const'=>'JOBDESK',
						'name'=>'Jobdesk',
						'anak'=> array(

					        array(
				
				            'const'=>'QUOTATION',
					        'name'=>'Quotation',
					
				           ),
				           array(
				
				            'const'=>'PROJECT_LIST',
					        'name'=>'Project Llist',
					
				           ),
					    )
						
					),
					array(
					
					    'const'=>'USER_MANAGEMENT',
					    'induk'=>true,
						'name'=>'User Management',
						'anak'=> array(
						    
						    array(
						    
						        'const'=>'USER',
						        'name'=>'User'
						    ),
						    array(
						    
						        'const'=>'JABATAN',
						        'name'=>'Jabatan'
						    ),
						 )
					),
					
		); 
		
		return $module;
	}
}
