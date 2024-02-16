<?php


defined('BASEPATH') OR exit('No direct script access allowed');


class signup_model extends CI_Model {

    public function index($fname,$lname,$emailid,$phone,$hashed_password){

$data=array(
    'FirstName' => $fname,
    'PhoneNumber'=>$phone,
'LastName'=>$lname,
'Email'=>$emailid,
'Password'=>$hashed_password
);

$query = $this->db->insert('users',$data);
if($query){
    $this->session->set_flashdata('success','Registration successfull, Now you can login.');	
    redirect('register');
}else
{
    $this->session->set_flashdata('error','Something went wrong. Please try again.');	
redirect('register');
}    

    }
}


?>