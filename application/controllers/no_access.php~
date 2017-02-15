<?php

class No_access extends CI_Controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $data = array('title'=>'No Access');
        $this->output->set_header('HTTP/1.0 401 Unauthorized');
        $this->load->view('header',$data);
	    $this->load->view('sidebar');
	    $this->load->view('no_access');
	    $this->load->view('footer');
        
    }

}
