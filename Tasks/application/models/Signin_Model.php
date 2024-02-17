<?php
class Signin_Model extends CI_Model {
    public function get_user_by_email($email) {
        // $this->db->where('Email', $email);
        // $query = $this->db->get('users');
        // if ($query->num_rows() == 1) {
        //     return $query->row();
        // }
        // return false;

        $data = array(
            'Email'=>$email
        );
        $query = $this->db->where($data);
        $login = $this->db->get('users');
        if($login != NULL){
            return $login->row();
        }
    }
}
?>