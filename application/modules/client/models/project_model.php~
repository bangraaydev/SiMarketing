<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends CI_Model{
    
    private $_table = 'project';
    
    public function save($data){
        
        $data['last_update'] = date('Y-m-d H:i:s');
        $data['updated_by']  = $this->session->userdata('nama');
        return $this->db->insert($this->_table,$data);
    
    }
    public function update($data){
        
        $arr = array(
            
            'nama_project' =>$data['nama_project'],
            'deskripsi' =>$data['deskripsi'],
            'last_update' =>date('Y-m-d H:i:s'),
            'updated_by'=> $this->session->userdata('nama')
        );
        return $this->db->update($this->_table,$arr,array('id_project'=>$data['id_project']));
    
    }
    public function get_data($offset,$limit,$q=''){
    
        $sql = "SELECT * FROM {$this->_table}
                WHERE 1=1 
                ";
        
        if($q){
            
            $sql .=" AND nama_project LIKE '%{$q}%' OR deskripsi LIKE '%{$q}%' ";
        }
        $sql .=" ORDER BY id_project DESC ";
        $ret['total'] = $this->db->query($sql)->num_rows();
        
            $sql .=" LIMIT {$offset},{$limit} ";
        
        $ret['data']  = $this->db->query($sql)->result();
       
        return $ret;
        
    }
    
    public function get_edit($id){
        
         $sql = "SELECT * FROM {$this->_table}
                WHERE id_project = {$id} 
                ";
          return $this->db->query($sql)->row_array();
    }
    
    public function delete($id){
    
        $this->db->trans_begin(); //transaction initialize
        
            $this->db->delete($this->_table,array('id_project'=>$id));
            $this->db->delete('client_project',array('id_project'=>$id));
        
        if($this->db->trans_status()===false){
            
            $this->db->trans_rollback();
            return false;    
            
        }else{
            
            $this->db->trans_complete();
            return true;
        }
  
    }
    
}
