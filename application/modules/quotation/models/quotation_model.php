<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotation_model extends CI_Model{

    public function get_pic_n_client($offset=null,$limit=null,$q=null){
        
        
        $sql = "SELECT a.id_pic,a.nama_pic,a.email_pic,a.telp_pic,a.id_client,
                b.initial,b.nama_pt,b.kode_client
                FROM client_pic a
                LEFT OUTER JOIN client b ON b.id_client = a.id_client
                ORDER BY b.id_client,a.id_client DESC
                ";
        
        return $this->db->query($sql)->result();
    }
    
    
    
    public function save_quotation($data){
        
        $arr = array(
            
            'id_sales' => $data['id_sales'],
            'dari'=>$data['sales'],
            'kepada'=>$data['id_pic'],
            'id_client'=>$data['id_client'],
            'tgl'=>date('Y-m-d'),
            'subject'=>$data['subject']
        
        );
        
        $this->db->trans_begin();
        
        $save = $this->db->insert('quotation',$arr);
        $last_id=  $this->db->insert_id();
        
        $no_ref = "QU.".$last_id."/HP/".$data['initial_client']."/".date("m")."/".date("Y")."";
        $this->db->update('quotation',array('no_ref'=>$no_ref),array('id_quotation'=>$last_id));
        if($this->db->trans_status()===FALSE){
            
           $this->db->trans_rollback();
            return false;
            
        }else{
            
            $this->db->trans_commit();
            return array('id_quotation'=>$last_id,'no_ref'=>$no_ref);
        }
        
    }
}
