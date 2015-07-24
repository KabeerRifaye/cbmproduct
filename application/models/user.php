<?php
Class User extends CI_Model
{

     function loginuser($username, $password)
     {
       $this -> db -> select('id_user, username, password')-> from('user')-> where('username', $username)-> where('password', MD5($password))-> limit(1);

       $query = $this -> db -> get();

       if($query -> num_rows() == 1)
       {
         return $query->result();
       }
       else
       {
         return false;
       }
     }
     
     function getuserdetails()
     {
       $this -> db -> select('id_user, username, email')-> from('user');
       $query = $this -> db -> get();
       return $query->result_array();
     }
        
    function updateuseraccount()
    {
        if($this->input->post('password') != '')
        {
        $data = array(
                       'username' => $this->input->post('username'),            
                       'email' => $this->input->post('email'),
                       'password' => md5($this->input->post('password')),
                    );
        }
        else
        {
        $data = array(
                       'username' => $this->input->post('username'),            
                       'email' => $this->input->post('email'),
                    );            
        }

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }     
}