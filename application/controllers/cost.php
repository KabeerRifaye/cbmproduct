<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Cost extends CI_Controller {

function __construct()
{
  parent::__construct();
  if(!$this->session->userdata('logged_in')){
	  redirect('login' , 'refresh');
  }
}
 
function index()
{
            $this->load->model('cbmmodel','',TRUE);
            $this->load->model('costmodel','',TRUE);
            $session_data = $this->session->userdata('logged_in');
            $data['login_userid'] = $session_data['username'];
            $data['current_menu'] = 'cost';

            $data['base']        = $this->config->item('base_url');
            $data['purchase_combo'] = $this->cbmmodel->getcbm(); 
            $data['reference_combo'] = $this->costmodel->getreferencecombo(); 
			$data['costdetails'] = $this->costmodel->getcostdetails(); 
            $this->load->view('cost_view',$data);
}
 
function createcostdata()
{
    $this->load->model('costmodel','',TRUE);
    $id = $this->costmodel->createcost();    
    echo $id;
}

function createcostdetail()
{
    $this->load->model('costmodel','',TRUE);
    $id = $this->costmodel->createcostdetails();    
    redirect('cost' , 'refresh');
}

function getpurchasedetails()
{
    $this->load->model('cbmmodel','',TRUE);
    $purchaseno = $this->input->post('purchaseno');
    $value = $this->cbmmodel->getpurchase($purchaseno);
    if(is_array($value)){
            echo json_encode($value);
    }
}
 
}

?>
