<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class ModelCreation extends CI_Controller {

function __construct()
{
  parent::__construct();
}
 
function index()
{
        if($this->session->userdata('logged_in'))
        {                 
            $this->load->model('model','',TRUE);
            $this->load->model('reference','',TRUE);
            $session_data = $this->session->userdata('logged_in');
            $data['login_userid'] = $session_data['username'];
            $data['current_menu'] = 'modelcreation';

            $data['base']        = $this->config->item('base_url');
            $data['ref_data'] = $this->reference->getreference(); 
            $data['model_data'] = $this->model->getmodel(); 
            $data['ref_data'] = $this->reference->getreference(); 
            $this->load->view('model_view',$data);
        }
        else
        {
            redirect('login' , 'refresh');
        }
}
 
function createmodeldata()
{
    $this->load->model('model','',TRUE);
    $this->model->createmodel();
	redirect('modelcreation' , 'refresh');
    //echo 'Created Successfully';
}  

function updatemodeldata()
{
    $this->load->model('model','',TRUE);
    $this->model->updatemodel();
    echo 'Updated Successfully';
}  
}

?>
