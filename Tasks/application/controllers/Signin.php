<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_controller {

    public function index() {
        $this->form_validation->set_rules('emailid', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $email = $this->input->post('emailid');
            $password = $this->input->post('password');

            $this->load->model('Signin_Model');
            $user = $this->Signin_Model->get_user_by_email($email);

            if ($user && password_verify($password, $user->Password)) {

             $this->session->set_userdata('uid',$user->id);
             $this->session->set_userdata('fname',$user->FirstName);
             redirect('dashboard');
            } else {
                
                $this->session->set_flashdata('error', 'Invalid login details. Please try again.');
                redirect('signin');
            }
        } else {
            $this->load->view('signin');
        }
    }


}
?>