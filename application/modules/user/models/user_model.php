<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{

    
    public function save($data){
        
        $cek = $this->db->select('id_user')->where('username',$data['username'])
                        ->or_where('nik',$data['nik'])->get('user')->num_rows();
        if($cek)
            return true; //smntara ret true ajalah
            
            
        $arr = array(
        
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => md5($data['password']),
            'jabatan_id' => $data['jabatan_id'],
        );       
        
        return $this->db->insert('user',$arr);
    }
    public function update($data){
        
        $arr = array(
        
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'jabatan_id' => $data['jabatan_id'],
        );       
        
        if($data['password']!=''){
            
            $arr['password'] = md5($data['password']);
        }
                
        return $this->db->update('user',$arr,array('id_user'=>$data['id_user']));
    }
    
    public function get_data($offset,$limit,$q=''){
    
        $sql = "SELECT a.*,b.jabatan FROM user a 
                LEFT JOIN jabatan_user b ON b.id = a.jabatan_id
                WHERE 1=1 
                ";
        
        if($q){
            
            $sql .=" AND a.nama LIKE '%{$q}%' ";
        }
        $sql .=" ORDER BY a.id_user DESC ";
        $ret['total'] = $this->db->query($sql)->num_rows();
        
            $sql .=" LIMIT {$offset},{$limit} ";
        
        $ret['data']  = $this->db->query($sql)->result();
       
        return $ret;
        
    }
    
    
    
}
