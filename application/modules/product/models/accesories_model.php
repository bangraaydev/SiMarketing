<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Accesories_model extends CI_Model{
    
    private $_table = 'prod_accesories';
    
    public function save($data){
        
        
        $arr = array
            (
                'sku' => $data['sku'],
                'stock' => $data['stock'],
                'harga' => $data['harga'],
                'keterangan' => $data['keterangan'],
                'deskripsi' => $data['deskripsi'],
                'unit' => $data['unit'],
                'status' => $data['status'],
                'garansi' => $data['garansi'],
                'brand' => $data['brand'],
                'pic1' => isset($data['pic1']) ? $data['pic1']: '',
                'pic2' => isset($data['pic2']) ? $data['pic2']: '',
                'pic3' => isset($data['pic3']) ? $data['pic3']: '',
                'pic4' => isset($data['pic4']) ? $data['pic4']: '',
                'last_update'=>date('Y-m-d H:i:s'),
                'updated_by'=>$this->session->userdata('nama')
                
           
        );       
        //print_r($arr);exit;
        return $this->db->insert($this->_table,$arr);
    }
    public function update($data){
        
       $arr = array
            (   
                
                'stock' => $data['stock'],
                'harga' => $data['harga'],
                'keterangan' => $data['keterangan'],
                'deskripsi' => $data['deskripsi'],
                'unit' => $data['unit'],
                'status' => $data['status'],
                'garansi' => $data['garansi'],
                'brand' => $data['brand'],
                'last_update'=>date('Y-m-d H:i:s'),
                'updated_by'=>$this->session->userdata('nama')
                
           
        );   
        
        if(isset($data['pic1'])){
            
            $arr['pic1'] = $data['pic1'];
        }
        if(isset($data['pic2'])){
            
            $arr['pic2'] = $data['pic2'];
        }
        if(isset($data['pic3'])){
            
            $arr['pic3'] = $data['pic3'];
        }
        if(isset($data['pic4'])){
            
            $arr['pic4'] = $data['pic4'];
        }
                    
        //print_r($arr);exit;
        return $this->db->update($this->_table,$arr,array('id_accesories'=>$data['id_accesories']));
       
    }
    
    public function get_data($offset,$limit,$q=''){
    
        $sql = "SELECT * FROM {$this->_table}
               WHERE 1=1 
                ";
        
        if($q){
            
            $sql .=" AND sku LIKE '%{$q}%' 
                     OR deskripsi LIKE '%{$q}%' 
                     
                     ";
        }
        $sql .=" ORDER BY id_accesories DESC ";
        $ret['total'] = $this->db->query($sql)->num_rows();
        
            $sql .=" LIMIT {$offset},{$limit} ";
        
        $ret['data']  = $this->db->query($sql)->result();
       
        return $ret;
        
    }
    
    public function get_detail($id){
    
         $sql = "SELECT * FROM {$this->_table}
                 WHERE id_accesories = {$id}
                ";
        return $this->db->query($sql)->row_array();
    }
    
    public function delete($id){
        
        $get_img  = $this->db->select('pic1,pic2,pic3,pic4')
		                        ->where('id_accesories',$id)->get($this->_table)->row_array();
        
        //remove all images
        if($get_img){
            $img = array('pic1','pic2','pic3','pic4');
            foreach($img as $im){
                
                if($get_img[$im])
                    unlink('./assets/images/accesories/'.$get_img[$im]);
            }
        
        }
        
        return $this->db->delete($this->_table,array('id_accesories'=>$id));
    }
    
    
}
