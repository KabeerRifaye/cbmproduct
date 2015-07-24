<?php
Class Cbmmodel extends CI_Model
{     
    function getcbm()
    {
      $this -> db -> select('*')-> from('cbm');
      $query = $this -> db -> get();
      return $query->result_array();
    }
        
    function updatecbm()
    {        			
        $data = array(
                       'purchaseno' => $this->input->post('purchaseno'),            
                       'purchasedate' => date("Y-m-d", strtotime($this->input->post('purchasedate'))),
                       'arrivaldate' => date("Y-m-d", strtotime($this->input->post('arrivaldate'))),
                       'value1' => $this->input->post('value1'),
                       'conversion' => $this->input->post('conversion'),            
                       'exp2' => $this->input->post('exp2'),
                       'exp3' => $this->input->post('exp3'),
                       'exp4' => $this->input->post('exp4'),
                       'exp5' => $this->input->post('exp5'),            
                       'exp6' => $this->input->post('exp6'),
                       'exp7' => $this->input->post('exp7'),
                       'exp8' => $this->input->post('exp8'),
                       'exp9' => $this->input->post('exp9'),
                       'exp10' => $this->input->post('exp10'),            
                       'noofcontainer' => $this->input->post('noofcontainer'),
                       'percbm' => $this->input->post('percbm'),
                       'cbm' => $this->input->post('cbm'),              
                    );

        $this->db->where('id_cbm', $this->input->post('id_cbm'));
        $this->db->update('cbm', $data);
    }
    
    function createcbm()
    {
        $data = array(
                       'purchaseno' => $this->input->post('purchaseno'),            
                       'purchasedate' => date("Y-m-d", strtotime($this->input->post('purchasedate'))),
                       'arrivaldate' => date("Y-m-d", strtotime($this->input->post('arrivaldate'))),
                       'value1' => $this->input->post('value1'),
                       'conversion' => $this->input->post('conversion'),            
                       'exp2' => $this->input->post('exp2'),
                       'exp3' => $this->input->post('exp3'),
                       'exp4' => $this->input->post('exp4'),
                       'exp5' => $this->input->post('exp5'),            
                       'exp6' => $this->input->post('exp6'),
                       'exp7' => $this->input->post('exp7'),
                       'exp8' => $this->input->post('exp8'),
                       'exp9' => $this->input->post('exp9'),
                       'exp10' => $this->input->post('exp10'),            
                       'noofcontainer' => $this->input->post('noofcontainer'),
                       'percbm' => $this->input->post('percbm'),
                       'cbm' => $this->input->post('cbm'),              
                    );
        $this->db->insert('cbm', $data);
    }
    
    function getpurchase($purchaseno)
    {
      $this -> db -> select('purchasedate,(cbm/(noofcontainer*percbm)) AS cbmexp')-> from('cbm') -> where('purchaseno',$purchaseno);
      $query = $this -> db -> get();
      return $query->result_array();
    }    
}