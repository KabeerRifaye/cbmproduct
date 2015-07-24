<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Reports extends CI_Controller {

function __construct()
{
  parent::__construct();
}
 
function index()
{
        if($this->session->userdata('logged_in'))
        {                 
            $this->load->model('costmodel','',TRUE);
			
			$data['report']=$this->costmodel->getReport();
			
			//echo $this->db->last_query();
			
			$data['costDetails']=$this->costmodel->getcostdetailsearch();
            
			$session_data = $this->session->userdata('logged_in');
            $data['login_userid'] = $session_data['username'];
            $data['current_menu'] = 'reports';

            $data['base']        = $this->config->item('base_url');
			
            $this->load->view('report_view',$data);
        }
        else
        {
            redirect('login' , 'refresh');
        }
}
}

?>
