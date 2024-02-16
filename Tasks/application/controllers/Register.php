<?php

class Register extends CI_Controller{



    public function index(){


        $this->form_validation->set_rules('firstname','first name','required|alpha');
        $this->form_validation->set_rules('lastname','last name','required|alpha');
        $this->form_validation->set_rules('emailid','EmailId','required|valid_email|is_unique[users.Email]');
        $this->form_validation->set_rules('phone','phone','required|numeric|min_length[10]|is_unique[users.PhoneNumber]');
        $this->form_validation->set_rules('password','Password','required|min_length[8]');
        $this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[8]|matches[password]');
        $this->form_validation->set_message('is_unique', 'The email or phone number  already exists.');


        if($this->form_validation->run()){

            $fname = $this->input->post('firstname');
            $lname=$this->input->post('lastname');
            $emailid=$this->input->post('emailid');
            $phone = $this->input->post('phone');
            $password=$this->input->post('password');
            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $this->load->model('signup_model');
            $this->signup_model->index($fname,$lname,$emailid,$phone,$hashed_password);

        }else
        {
            $this->load->view('signup');
        }
    }
}



?>