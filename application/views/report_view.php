<? $this->load->view('header'); ?>
<script type="text/javascript">
$(document).ready(function() {    
        $("#exampleGrid").simplePagingGrid({
            columnNames: ["PUR.Date", "ARR.Date", "QTY", "REF NO" , "Model No" , "Desc" , "PUR.Price" , "Unit" , "PP+Unit" , "CBM" , "CBM.EX" , "COST" , "ARR.datePre" , "Sel.Price" , "Pur.No"],
            columnKeys: ["purchasedate", "arrivaldate", "qty" , "id_refcreation" , "modelno" , "description" , "purprice" , "conversion" ,"ppunit" , "cbm" , "cbmex" , "cost" , "arrivaldate1", "selp" , "id_refcreation"],
            columnWidths: ["10%", "10%", "5%", "10%", "10%", "10%", "5%", "5%","5%", "5%", "5%", "5%", "10%" , "10%"],
            cellTemplates:[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null],
            sortable: [false,false, false, false, false, false, false, false, false, false, false, false, false, false, false],
            //initialSortColumn: "Name",
            bootstrapVersion: 2,
            data: [
                <?php foreach($report AS $refdata) : ?>
                    { "purchasedate": "<?php echo $refdata['purchasedate']; ?>", "arrivaldate": "<?php echo $refdata['arrivaldate']; ?>", "qty": "<?php echo $refdata['qty']; ?>", "id_refcreation": "<?php echo $refdata['id_refcreation']; ?>", "modelno": "<?php echo $refdata['modelno']; ?>" , "description": "<?php echo $refdata['description']; ?>", "purprice": "<?php echo $refdata['purprice']; ?>", "cbm": "<?php echo $refdata['cbm']; ?>" , "cbmex": <?php echo $refdata['cbmex']; ?>, "cost": "<?php echo ""; ?>", "selp": "<?php echo $refdata['selp']; ?>", "id_refcreation": "<?php echo $refdata['id_refcreation']; ?>", "conversion": "<?php echo $refdata['conversion']; ?>", "cost": "<?php echo $refdata['per1']; ?>", "arrivaldate1": "<?php echo $refdata['per2']; ?>", "ppunit": "<?php echo $refdata['purprice']*$refdata['conversion']; ?>"},
                <?php endforeach; ?>
                  ]
        });   
    });
</script>


<?php 
$pDateTo = '';
$pDateFrom = '';
$aDateTo = '';
$aDateFrom = '';
$modelNo = '';

if(isset($_POST['pDateTo'])) {
	if($_POST['pDateTo'] != '') {
		$pDateTo = $_POST['pDateTo'];
	}
}

if(isset($_POST['pDateFrom'])) {
	if($_POST['pDateFrom'] != '') {
		$pDateFrom = $_POST['pDateFrom'];
	}
}

if(isset($_POST['aDateTo'])) {
	if($_POST['aDateTo'] != '') {
		$aDateTo = $_POST['aDateTo'];
	}
}

if(isset($_POST['aDateFrom'])) {
	if($_POST['aDateFrom'] != '') {
		$aDateFrom = $_POST['aDateFrom'];
	}
}

if(isset($_POST['modelNo'])) {
	if($_POST['modelNo'] != '') {
		$modelNo = $_POST['modelNo'];
	}
}
?>

<section id="main">
    <div class="container-fluid">
        <h2>Ref Creation</h2>        
        <hr>
        <div class="clear-fix"></div>
		<div>
        	<form role="form" id="filterForm" method="post">
        	<div class="span6">
            	<label for="currentreceived">Purchase Date : </label>
            	<div class="form-group">
                <span>From</span> 
                <input type="text" id="pDateTo" name="pDateTo" value="<?php echo $pDateTo; ?>">
                <span>To</span> 
                <input type="text" id="pDateFrom" name="pDateFrom" value="<?php echo $pDateFrom; ?>">
              </div>
            </div>
            <div class="span6">
            	<label for="currentreceived">Arrival Date : </label>
            	<div class="form-group">
                <span>From </span>
                <input type="text" id="aDateTo" name="aDateTo" value="<?php echo $aDateTo; ?>">
                <span>To </span> 
                <input type="text" id="aDateFrom" name="aDateFrom" value="<?php echo $aDateFrom; ?>">
              </div>
            </div>
            Search By :
            <select name="modelNo" id="modelNo" >
            	<option value="">Selecct refno-model-desc</option>
            	<?php foreach($costDetails as $val) { ?>
                	<option value="<?php echo $val['refnomodeldesc']; ?>" <?php if($val['refnomodeldesc'] == $modelNo) {?> selected="selected" <?php } ?> > <?php echo $val['refnomodeldesc']; ?></option>
                <?php } ?>
            </select>
            <div style="float:right;margin-right: 30px;">
                <input type="submit" class="btn btn-lg btn-primary" value="Search"  />
                <a href="<?php echo $base; ?>/reports" class="btn btn-denger" > Reset </a>
            </div>
            </form>
        </div>
    </div>
        <div class="row-fluid">                            
            <div id="exampleGrid"></div>
        </div>
</section>
<script>
 $('#resetBtn').click(function(){
	 	document.getElementById("filterForm").reset();
            //$('#filterForm')[0].reset();
 });
 
    $(function() {
        $( "#pDateTo" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'dd-mm-yy',
          yearRange: '1945:'+(new Date).getFullYear(),
		  onSelect: function(selected) {
          $("#pDateFrom").datepicker("option","minDate", selected)
        }
        });
        
        $( "#pDateFrom" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'dd-mm-yy',
          yearRange: '1945:'+(new Date).getFullYear(),
		  onSelect: function(selected) {
           $("#pDateTo").datepicker("option","maxDate", selected)
        	}
        });
		
		$( "#aDateTo" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'dd-mm-yy',
          yearRange: '1945:'+(new Date).getFullYear(),
		  onSelect: function(selected) {
          $("#aDateFrom").datepicker("option","minDate", selected)
        }
        });
        
        $( "#aDateFrom" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'dd-mm-yy',
          yearRange: '1945:'+(new Date).getFullYear(),
		  onSelect: function(selected) {
           $("#aDateTo").datepicker("option","maxDate", selected)
        	}
        }); 

});
</script>
<? $this->load->view('footer'); ?>
