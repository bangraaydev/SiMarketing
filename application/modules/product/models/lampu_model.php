<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lampu_model extends CI_Model{

    
    public function save($data){
        
        $arr = array
            (
                'sku' => $data['sku'],
                'tipe_lamp' => $data['tipe_lamp'],
                'derajat' => $data['derajat'],
                'daya' => $data['daya'],
                'warna' => $data['warna'],
                'stock' => $data['stock'],
                'harga' => $data['harga'],
                'keterangan' => $data['keterangan'],
                'deskripsi' => $data['deskripsi'],
                'fitting' => $data['fitting'],
                'tegangan' => $data['tegangan'],
                'umur' => $data['umur'],
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
        return $this->db->insert('prod_lamp',$arr);
    }
    public function update($data){
        
       $arr = array
            (
                //'sku' => $data['sku'],
                'tipe_lamp' => $data['tipe_lamp'],
                'derajat' => $data['derajat'],
                'daya' => $data['daya'],
                'warna' => $data['warna'],
                'stock' => $data['stock'],
                'harga' => $data['harga'],
                'keterangan' => $data['keterangan'],
                'deskripsi' => $data['deskripsi'],
                'fitting' => $data['fitting'],
                'tegangan' => $data['tegangan'],
                'umur' => $data['umur'],
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
        return $this->db->update('prod_lamp',$arr,array('id_lamp'=>$data['id_lamp']));
       
    }
    
    public function get_data($offset,$limit,$q='',$filter=''){
    
        $sql = "SELECT a.*,b.nama_tipe,c.nama_prod FROM prod_lamp a 
                LEFT JOIN tipe_lamp b ON b.id_tipe = a.tipe_lamp
                LEFT JOIn jns_prod_lampu c ON c.id_jns_lamp = b.id_jns_lamp
                WHERE 1=1 
                ";
        if($filter){
            
            $sql .=" AND a.tipe_lamp = {$filter} ";
        }
        if($q){
            
            $sql .=" AND (a.sku LIKE '%{$q}%' 
                     OR a.deskripsi LIKE '%{$q}%' 
                     OR b.nama_tipe LIKE '%{$q}%'
                     OR c.nama_prod LIKE '%{$q}%'
                     )";
        }
        
        $sql .=" ORDER BY id_lamp DESC ";
        $ret['total'] = $this->db->query($sql)->num_rows();
        
            $sql .=" LIMIT {$offset},{$limit} ";
        
        $ret['data']  = $this->db->query($sql)->result();
       
        return $ret;
        
    }
    
    public function get_detail($id){
    
         $sql = "SELECT a.*,b.nama_tipe,c.nama_prod FROM prod_lamp a 
                LEFT JOIN tipe_lamp b ON b.id_tipe = a.tipe_lamp
                LEFT JOIn jns_prod_lampu c ON c.id_jns_lamp = b.id_jns_lamp
                WHERE a.id_lamp = {$id}
                ";
        return $this->db->query($sql)->row_array();
    }
    
    public function delete($id){
        
        $get_img  = $this->db->select('pic1,pic2,pic3,pic4')
		                        ->where('id_lamp',$id)->get('prod_lamp')->row_array();
        
        //remove all images
        if($get_img){
            $img = array('pic1','pic2','pic3','pic4');
            foreach($img as $im){
                
                if($get_img[$im])
                    unlink('./assets/images/lampu/'.$get_img[$im]);
            }
        
        }
        
        return $this->db->delete('prod_lamp',array('id_lamp'=>$id));
    }
    
    
}
