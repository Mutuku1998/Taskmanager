

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
//Validating login
// public function __construct(){
// parent::__construct();
// if(!$this->session->userdata('uid'))
// redirect('signin');
// }
public function index(){

if($this->session->userdata('uid')!=''){

$userfname=$this->session->userdata('fname');	
$this->load->view('dashboard',['firstname'=>$userfname]);
}else{
    redirect('signin');
}

}

public function logout(){

    $this->session->unset_userdata('uid');
    $this->session->sess_destroy();
    return redirect('signin');
}
}


?>
 