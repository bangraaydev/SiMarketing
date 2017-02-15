<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata('is_login'))redirect('login');
		$this->session->set_userdata('menu','');	
	}
	
	public function index(){
	    
	    $data = array('title'=>'Home - Tekno Power');
	    
	    $this->load->view('header',$data);
	    $this->load->view('sidebar');
	    $this->load->view('home');//
	    $this->load->view('footer');
		
	}


}
