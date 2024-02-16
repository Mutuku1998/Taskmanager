<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
//Validating login

public function index(){
    if($this->session->userdata('emailid')!=''){

        $userdata = $this->session->userdata('userdata');
        $data['userdata'] = $userdata;
        $this->load->view('dashboard',$data);

    }else{

        redirect('signin');
    }
}
public function logout(){
    $this->session->unset_userdata('emailid');
    redirect('signin');
}
}