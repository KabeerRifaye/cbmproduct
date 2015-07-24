<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class RefCreation extends CI_Controller {

function __construct()
{
  parent::__construct();
}
 
function index()
{
        if($this->session->userdata('logged_in'))
        {                 
            $this->load->model('reference','',TRUE);
            $session_data = $this->session->userdata('logged_in');
            $data['login_userid'] = $session_data['username'];
            $data['current_menu'] = 'refcreation';

            $data['base']        = $this->config->item('base_url');
            $data['ref_data'] = $this->reference->getreference();          
            $this->load->view('ref_view',$data);
        }
        else
        {
            redirect('login' , 'refresh');
        }
}
 
function createrefdata()
{
    $this->load->model('reference','',TRUE);
    $this->reference->createreference();
    echo 'Created Successfully';
}  

function updaterefdata()
{
    $this->load->model('reference','',TRUE);
    $this->reference->updatereference();
    echo 'Updated Successfully';
}  
}

?>
