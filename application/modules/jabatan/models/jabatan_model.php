<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jabatan_model extends CI_Model{

    
    public function save($data){
        
        $arr = array(
        
            'jabatan' => $data['jabatan'],
            'keterangan' => $data['keterangan']
        );       
        
        return $this->db->insert('jabatan_user',$arr);
    }
    public function update($data){
        
        $arr = array(
        
            'jabatan' => $data['jabatan'],
            'keterangan' => $data['keterangan']
        );       
        
        return $this->db->update('jabatan_user',$arr,array('id'=>$data['id']));
    }
    public function get_data($offset,$limit,$q=''){
    
        $sql = "SELECT * FROM jabatan_user WHERE 1=1 ";
        
        if($q){
            
            $sql .=" AND jabatan LIKE '%{$q}%' ";
        }
        
        $ret['total'] = $this->db->query($sql)->num_rows();
        
            $sql .=" LIMIT {$offset},{$limit} ";
        
        $ret['data']  = $this->db->query($sql)->result();
        
        return $ret;
        
    }
    
    
}
