<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
   $data['base']        = $this->config->item('base_url');  
   
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     redirect('refcreation', 'refresh');
   }
   else
   {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
                
            if ($this->input->post('login'))
            {
                if(!$this->form_validation->run() == FALSE)
                {
                    redirect('refcreation', 'refresh');
                }
            }
            
        $this->load->view('login_view',$data);
   } 
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   
   $this->load->model('user','',TRUE);
   //query the database
   $result = $this->user->loginuser($username, $password);   

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {       
       $sess_array = array(
         'id' => $row->id_user,
         'username' => $row->username,
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 
function logout()
 {
   $session_data = $this->session->userdata('logged_in');    
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login', 'refresh');
 }
 
}

?>
