<?php
Class Reference extends CI_Model
{     
    function getreference()
    {
      $this -> db -> select('*')-> from('refcreation');
      $query = $this -> db -> get();
      return $query->result_array();
    }
        
    function updatereference()
    {
        $data = array(
                       'refno' => $this->input->post('refno'),            
                       'note1' => $this->input->post('note1'),
                       'note2' => $this->input->post('note2'),
                       'note3' => $this->input->post('note3')
                    );

        $this->db->where('id_refcreation', $this->input->post('id_refcreation'));
        $this->db->update('refcreation', $data);
    }
    
    function createreference()
    {
        $data = array(
                       'refno' => $this->input->post('refno'),            
                       'note1' => $this->input->post('note1'),
                       'note2' => $this->input->post('note2'),
                       'note3' => $this->input->post('note3')
                    );
        $this->db->insert('refcreation', $data);
    }     
}