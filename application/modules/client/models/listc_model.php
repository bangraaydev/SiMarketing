<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listc_model extends CI_Model{
    
    private $_table = 'client';
    
    /*generate ID Client*/
    public function generate_kode($idx){
        
        
        $ret = '';
        
        $limit = 8;
                
        for($x=0;$x<($limit- strlen($idx));$x++){
        
            $ret .='0';
        }
        
        return $ret.$idx;
    }
    
    public function save($data){
        
        //print_r($data);exit;
        
        $get_initial = $this->db->select('initial_tipe')
                                ->where('id_tipe',$data['tipe_client'])->get('tipe_client')->row();
        $initial = '';
        if($get_initial)
            $initial = $get_initial->initial_tipe;
        
        $arr = array(
            
            'tipe_client' =>$data['tipe_client'],
            'initial'   =>$data['initial'],
            'nama_pt'   =>$data['nama_pt'],
            'kota'   =>$data['kota'],
            'alamat'    =>$data['alamat'],
            'last_update' =>date('Y-m-d H:i:s'),
            'updated_by'  => $this->session->userdata('nama')
        );
        
        
        $this->db->trans_begin(); //transaction initialize
        
        $this->db->insert($this->_table,$arr);
        $id_client =  $this->db->insert_id(); //get last insert ID
        
        //krena kode_client hrus digenerate, do it
        $this->db->update($this->_table,
                    array('kode_client'=> $this->generate_kode($id_client.$initial)),
                    array('id_client'=>$id_client));
        
        //populate project
        $prj = array();
        foreach($data['data'] as $pr){
        
            if($pr['project']!=''){
            
                $tmp = array(
                
                    'id_project' => $pr['project'],
                    'id_client'  => $id_client
                );

               $prj[] = $tmp;
            }
        }
        
        $this->db->insert_batch('client_project',$prj); //insert batch
        
        //populate PIC
        $pic = array();
        foreach($data['data2'] as $pi){
        
            $tmp2 = array(
            
                'nama_pic' => $pi['nama_pic'],
                'telp_pic' => $pi['telp_pic'],
                'email_pic' => $pi['email_pic'],
                'sales_pic' => $pi['sales_pic'],
                'id_client'  => $id_client
            );
            
            $pic[] = $tmp2;
        }
        
        $this->db->insert_batch('client_pic',$pic); //insert batch
        
        if($this->db->trans_status()===false){
            
            $this->db->trans_rollback();
            return false;    
            
        }else{
            
            $this->db->trans_complete();
            return true;
        }      
    
    }
    
    public function update($data){
    
        
        $get_initial = $this->db->select('initial_tipe')
                                ->where('id_tipe',$data['tipe_client'])->get('tipe_client')->row();
        $initial = '';
        if($get_initial)
            $initial = $get_initial->initial_tipe;
        
        $id_client =  $data['id_client'];
        
        $arr = array(
            
            'tipe_client' =>$data['tipe_client'],
            'initial'   =>$data['initial'],
            'nama_pt'   =>$data['nama_pt'],
            'kota'   =>$data['kota'],
            'alamat'    =>$data['alamat'],
            'kode_client'=>$this->generate_kode($id_client.$initial),
            'last_update' =>date('Y-m-d H:i:s'),
            'updated_by'  => $this->session->userdata('nama')
        );
        
        
        
        $this->db->trans_begin(); //transaction initialize
        
        /*This is update, need to be removed all existing*/
        $this->db->delete('client_project',array('id_client'=>$id_client));
        $this->db->delete('client_pic',array('id_client'=>$id_client));
        
        
        $this->db->update($this->_table,$arr,array('id_client'=>$id_client));
        
        //populate project
        if(isset($data['data'])) {
        
            $prj = array();
            foreach($data['data'] as $pr){
                
                if($pr['project']!=''){
                
                    $tmp = array(
                    
                        'id_project' => $pr['project'],
                        'id_client'  => $id_client
                    );

                   $prj[] = $tmp;
                }
            }
            
            
            $this->db->insert_batch('client_project',$prj); //insert batch
        }
        
        //populate PIC
        if(isset($data['data2'])) {
        
            $pic = array();
            foreach($data['data2'] as $pi){
            
                $tmp2 = array(
                
                    'nama_pic' => $pi['nama_pic'],
                    'telp_pic' => $pi['telp_pic'],
                    'email_pic' => $pi['email_pic'],
                    'sales_pic' => $pi['sales_pic'],
                    'id_client'  => $id_client
                );
                
                $pic[] = $tmp2;
            }
            
            $this->db->insert_batch('client_pic',$pic); //insert batch
        }
        
        if($this->db->trans_status()===false){
            
            $this->db->trans_rollback();
            return false;    
            
        }else{
            
            $this->db->trans_complete();
            return true;
        }
    }
    
    
    public function delete($id_client){
        
        $this->db->trans_begin(); //transaction initialize
        
            $this->db->delete($this->_table,array('id_client'=>$id_client));
            $this->db->delete('client_project',array('id_client'=>$id_client));
            $this->db->delete('client_pic',array('id_client'=>$id_client));
        
        if($this->db->trans_status()===false){
            
            $this->db->trans_rollback();
            return false;    
            
        }else{
            
            $this->db->trans_complete();
            return true;
        }
    }
    
    public function get_data($offset,$limit,$q=''){
    
        $sql = "SELECT a.*,b.* FROM {$this->_table} a 
                LEFT JOIN tipe_client b ON b.id_tipe = a.tipe_client
                WHERE 1=1 
                ";
        
        if($q){
            
            $sql .=" AND a.nama_pt LIKE '%{$q}%' 
                     OR a.initial LIKE '%{$q}%'
                     OR a.kota LIKE '%{$q}%'   
                     OR b.desc_tipe LIKE '%{$q}%' 
                     OR b.initial_tipe LIKE '%{$q}%'
                    ";
        }
        $sql .=" ORDER BY a.id_client DESC ";
        $ret['total'] = $this->db->query($sql)->num_rows();
        
            $sql .=" LIMIT {$offset},{$limit} ";
        
        $ret['data']  = $this->db->query($sql)->result();
       
        return $ret;
        
    }
    public function get_client($id_client){
    
        $sql ="SELECT a.*,b.desc_tipe FROM client a
              LEFT JOIN tipe_client b ON b.id_tipe = a.tipe_client
              WHERE id_client = ?
              ";
              
        return $this->db->query($sql,array($id_client))->row_array();    
    }

    public function get_project($id_client){
        
        $sql ="SELECT a.*,b.nama_project FROM client_project a 
              LEFT JOIN project b ON b.id_project = a.id_project
              WHERE a.id_client = ?
              ";
              
        return $this->db->query($sql,array($id_client))->result_array();      
    }
    
    public function get_pic($id_client){
    
        $sql ="SELECT a.*,b.nama FROM client_pic a 
              LEFT JOIN user b ON b.id_user = a.sales_pic
              WHERE a.id_client = ?
              ";
              
        return $this->db->query($sql,array($id_client))->result_array();    
    }

}
