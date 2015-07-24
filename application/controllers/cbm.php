<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Cbm extends CI_Controller {

function __construct()
{
  parent::__construct();
}
 
function index()
{
        if($this->session->userdata('logged_in'))
        {                 
            $this->load->model('cbmmodel','',TRUE);
            $session_data = $this->session->userdata('logged_in');
            $data['login_userid'] = $session_data['username'];
            $data['current_menu'] = 'cbm';

            $data['base']        = $this->config->item('base_url');
            $data['cbm_data'] = $this->cbmmodel->getcbm();          
            $this->load->view('cbm_view',$data);
        }
        else
        {
            redirect('login' , 'refresh');
        }
}
 
function createcbmdata()
{
    $this->load->model('cbmmodel','',TRUE);
    $this->cbmmodel->createcbm();
    echo 'Created Successfully';
}  

function updatecbmdata()
{
    $this->load->model('cbmmodel','',TRUE);
    $this->cbmmodel->updatecbm();
    echo 'Updated Successfully';
}  
}

?>
