<?php
Class Costmodel extends CI_Model
{         
    function createcost()
    {
        $data = array(  
                       'purchaseno' => $this->input->post('purchaseno'),
                       'purchasedate' => date("Y-m-d", strtotime($this->input->post('purchasedate'))),
                       'arrivaldate' => date("Y-m-d", strtotime($this->input->post('arrivaldate'))),
                       'cbmexp' => $this->input->post('cbmexp'),
                       'com' => $this->input->post('com'),            
                       'per1' => $this->input->post('per1'),
                       'per2' => $this->input->post('per2'),
                       'conversion' => $this->input->post('conversion'),                          
                    );
        $this->db->insert('cost', $data);
        return $this->db->insert_id();
    }
	
	function strafter($string, $substring) {
	  $pos = strpos($string, $substring);
	  if ($pos === false)
	   return $string;
	  else 
	   return(substr($string, $pos+strlen($substring)));
	}
	
	function createcostdetails()
    {
		$result = $this->db->get_where('cost', array('id_cost' => $this->input->post('id_cost')))->result();
		
		$model_id = explode('-',$this->input->post('refno-modelno-desc'));
		$result1 = $this->db->select('id_modelcreation,cbm')->get_where('modelcreation', array('id_modelcreation' => $model_id[0]))->result();
		$modeldesc = $this->strafter($this->input->post('refno-modelno-desc'),'-'); 
		$pprice = $this->input->post('purchaseprice');
	    $pcom = $pprice + $pprice * $result[0]->com / 100;
		$inr = $pcom * $result[0]->conversion;
		$cbm = $result1[0]->cbm;
		$cbmex = $cbm * $result[0]->cbmexp;
		$pcbm = $inr + $cbmex;
		$per1 = $pcbm + $pcbm * $result[0]->per1 / 100;
		$per2 = $per1 + $per1 * $result[0]->per2 / 100;
		
		$userDetails = $this->session->userdata('logged_in');
		$lastData = $this->getLastCostDetails( $modeldesc );
		
		if($lastData == 0) {
			$lastpurprice = 0;
			$lastselcbm = 0;
			$lastselprice = 0;
			$lastpurno = 0;
		} else {
			$lastpurprice = $lastData[0]['purprice'];
			$lastselcbm = $lastData[0]['cbmex'];
			$lastselprice = $lastData[0]['selp'];
			$lastpurno = $this->db->select('purchaseno')->get_where('cost', array('id_cost' => $lastData[0]['id_cost']))->result();
			$lastpurno = $lastpurno[0]->purchaseno;
		}
		
        $data = array(  
                       'id_cost' => $this->input->post('id_cost'),
					   'id_user' => $userDetails['id'],
					   'id_model' => $model_id[0],
                       'refnomodeldesc' =>$modeldesc,
                       'lastpurprice' => $lastpurprice,
                       'purprice' => $pprice,
                       'qty' => $this->input->post('qty'),
					   'pcom' => $pcom,
                       'inr' => $inr,
					   'cbm' => $cbm,
					   'cbmex' => $cbmex,
					   'pcbm' => $pcbm,					   
                       'per1' => $per1,
                       'per2' => $per2,
                       'selp' => $this->input->post('selprice'),                          
					   'lastselcbm' => $lastselcbm,					   
                       'lastselprice' => $lastselprice,
                       'lastpurno' => $lastpurno,
                    );
        $this->db->insert('costdetails', $data);
        return $this->db->insert_id();
    }
    
    function getreferencecombo()
    {
      $this -> db -> select('a.refno,b.id_modelcreation,b.modelno,b.description')-> from('refcreation a')
                  -> join('modelcreation b', 'a.id_refcreation = b.id_refcreation' , 'inner');
      $query = $this -> db -> get();
      return $query->result_array();
    }
	
	function getcostdetails()
    {
      return $this -> db -> from('costdetails')->get()->result_array();
    }
	
	function getcostdetailsearch()
    {
		$query ="select refnomodeldesc from costdetails GROUP BY refnomodeldesc";
	
		return $this->db->query($query)->result_array();
    }   
	
	function getLastCostDetails($modeldesc){

		 $query ="select * from costdetails where refnomodeldesc = '".$modeldesc."' order by id_costdetails DESC limit 1";
	
		 $res = $this->db->query($query);
	
		 if($res->num_rows() > 0) {
				return $res->result("array");
		}
		return 0;
	}
	
	function getReport(){
		$this->db->select('cost.purchasedate,cost.arrivaldate,costdetails.*,refcreation.refno,modelcreation.modelno,modelcreation.description,modelcreation.description,cost.conversion,cost.per2,modelcreation.id_refcreation');
		$this->db->from('costdetails');
		$this->db->join('cost', 'cost.id_cost = costdetails.id_cost');
		$this->db->join('modelcreation', 'modelcreation.id_modelcreation = costdetails.id_model');
		$this->db->join('refcreation', 'modelcreation.id_refcreation = refcreation.id_refcreation');
		if(isset($_POST['pDateTo']) && $_POST['pDateTo']!=''){
			$this->db->where('cost.purchasedate >=',date('Y-m-d',strtotime($_POST['pDateTo'])));
		}
		if(isset($_POST['pDateFrom']) && $_POST['pDateFrom']!=''){
			$this->db->where('cost.purchasedate <=',date('Y-m-d',strtotime($_POST['pDateFrom'])));
		}
		if(isset($_POST['aDateTo']) && $_POST['aDateTo']!=''){
			$this->db->where('cost.arrivaldate >=',date('Y-m-d',strtotime($_POST['aDateTo'])));
		}
		if(isset($_POST['aDateFrom']) && $_POST['aDateFrom']!=''){
			$this->db->where('cost.arrivaldate <=',date('Y-m-d',strtotime($_POST['aDateFrom'])));
		}
		if(isset($_POST['modelNo']) && $_POST['modelNo']!=''){
			$this->db->where('costdetails.refnomodeldesc',$_POST['modelNo']);
		}
		
		return $this->db->get()->result_array();
		 
	}
}