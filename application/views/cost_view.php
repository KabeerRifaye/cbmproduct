<? $this->load->view('header');?>
<script type="text/javascript">
$(document).ready(function() {    
        $("#exampleGrid").simplePagingGrid({
            columnNames: ["Description","Last Pur Price", "Pure Price", "Qty", "P.COM", "INR","CBM","CBMEX","PCBM","PER1","PER2","SELP", "Last sel cbm" , "Last sel price" , "Last pur no"],
            columnKeys: ["refnomodeldesc", "lastpurprice", "purprice", "qty", "pcom", "inr","cbm","cbmex","pcbm","per1","per2","selp","lastselcbm","lastselprice","lastpurno"],
            columnWidths: ["5%", "10%", "10%", "1%", "5%", "5%", "5%", "5%","5%", "5%", "5%", "5%", "10%", "10%", "10%"],
            cellTemplates:[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null],
            sortable: [false,false, false, false, false, false, false, false, false, false, false, false, false, false, false, false],
            //initialSortColumn: "Name",
            bootstrapVersion: 2,
            data: [
                <?php foreach($costdetails AS $refdata) : ?>
                    { "id_costdetails": <?php echo $refdata['id_costdetails']; ?>,"refnomodeldesc": "<?php echo $refdata['refnomodeldesc']; ?>","lastpurprice": "<?php echo $refdata['lastpurprice']; ?>", "purprice": "<?php echo $refdata['purprice']; ?>", "qty": "<?php echo $refdata['qty']; ?>", "pcom": "<?php echo $refdata['pcom']; ?>", "inr": "<?php echo $refdata['inr']; ?>", "cbm": "<?php echo $refdata['cbm']; ?>", "cbmex": "<?php echo $refdata['cbmex']; ?>", "pcbm": "<?php echo $refdata['pcbm']; ?>", "per1": "<?php echo $refdata['per1']; ?>", "per2": "<?php echo $refdata['per2']; ?>", "selp": "<?php echo $refdata['selp']; ?>", "lastselcbm": "<?php echo $refdata['lastselcbm']; ?>", "lastselprice": "<?php echo $refdata['lastselprice']; ?>", "lastpurno": "<?php echo $refdata['lastpurno']; ?>"},
                <?php endforeach; ?>
                  ]
        });   
    });
</script>

<section id="main">
    <div class="container-fluid">
        <h2>Cost</h2>        
        <hr>
        <div id="search-form">
            <form role="form" method="post" action="">
                <span for="todate">Purchase No : </span>
                <select id="purchaseno" class="selectpicker" name="purchaseno" style="width:140px;">
                    <option value="">-- Select --</option>
                    <?php foreach ($purchase_combo as $combo) : ?>                   
                        <option value="<?php echo $combo['purchaseno']; ?>"><?php echo $combo['purchaseno']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="extra-from-content" style="display:none;">
                    <span for="fromdate">Pur.Date : </span>
                        <span id="purchasedate_show"></span>
                        <input type="hidden" id="purchasedate" name="purchasedate" value=""/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span for="todate">Cbm exp : </span>
                        <span id="cbmexp_show"></span>
                        <input type="hidden" id="cbmexp" name="cbmexp" value=""/>
<br/>
                    <span for="fromdate">Com : </span>
                    <input type="number" step="any" value="" class="form-control" id='com' name="com" value="" required/>&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span for="todate">Per1 : </span>
                        <input type="number" step="any" value="" class="form-control" id='per1' name="per1" value="" required/>
<br/>                        
                    <span for="fromdate">Per2 : </span>
                        <input type="number" step="any" value="" class="form-control" id='per2' name="per2" value="" required/>&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span for="todate">Conversion : </span>
                        <input type="number" step="any" value="" class="form-control" id='conversion' name="conversion" value="" required/>
<br/>                        
                    <span for="fromdate">Arrival Date : </span>
                        <input type='text' class="form-control arrivaldate" id='arrivaldate' name="arrivaldate" value="" required/>
<br/><p id="cost-submit">
                    <input type="submit" class="btn btn-lg btn-primary" value="Enter" name="enter"></p>
                </div>
            </form>
        </div> 
        <div class="clear-fix"></div>
        <div id="addnew" style="display: none;"><a href="#cost-details" class="btn btn-lg btn-primary" id="addnew-data">Add New</a></div>               
        <div id="cost-details" style="display:none;width:250px;">
            <form role="form" method="post" action="<?php echo site_url(); ?>cost/createcostdetail">
              <div class="form-group">
                <label for="currentreceived">REFNO-MODELNO-DESC</label>
                <input type="hidden" id="id_cost" name="id_cost" value="">
                <select id="refno-modelno-desc" class="selectpicker" name="refno-modelno-desc" required>
                    <option value="">-- Select --</option>
                    
                    <?php foreach ($reference_combo as $combo) : ?>                   
                        <option value="<?php echo $combo['id_modelcreation']; ?>-<?php echo $combo['refno']; ?>-<?php echo $combo['modelno']; ?>-<?php echo $combo['description']; ?>">
                            <?php echo $combo['refno']; ?>-<?php echo $combo['modelno']; ?>-<?php echo $combo['description']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
              </div> 
              <div class="form-group">
                <label for="currentreceived">Pur.Price</label>
                <input type="text" class="form-control" id="purchaseprice" name="purchaseprice" value="" placeholder="Purchase Price" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Qty</label>
                <input type="text" class="form-control" id="qty" name="qty" value="" placeholder="Quantity" required>
              </div>  
              <div class="form-group">
                <label for="currentreceived">Sel.Price</label>
                <input type="text" class="form-control" id="selprice" name="selprice" value="" placeholder="Sel Price" required>
              </div>                   
              <input type="submit" class="btn btn-lg btn-primary" value="Submit" name="submit">
            </form>
        </div>  
        
        
        
        
          <div class="row-fluid">                            
            <div id="exampleGrid"></div>
        </div>     
    </div>
</section>
<? $this->load->view('footer'); ?>
<script type="text/javascript" src="<?php echo $base; ?>/themes/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#purchaseno").change(function() {
        var value = $("#purchaseno").val();
        if(value != '')
        {
            $.ajax({
                type: "POST",
                cache: false,
                url: "<?php echo $base; ?>/cost/getpurchasedetails",
                data: {
                       'purchaseno' : value
                   },
                success: function(data) {  
                    var JSONString = data;
                    var JSONObject = $.parseJSON(JSONString);
                    $("#purchasedate").val(JSONObject[0]["purchasedate"]);
                    $("#cbmexp").val(JSONObject[0]["cbmexp"]);
                    
                    $("#purchasedate_show").html(JSONObject[0]["purchasedate"]);
                    $("#cbmexp_show").html(JSONObject[0]["cbmexp"]);
                }
            });             
            $("#extra-from-content").show();
        }
        else
        {
            $("#extra-from-content").hide();
        }
    });
    
    $("#addnew-data").fancybox({'scrolling' : 'auto',
         'titleShow' : false,'onClosed' : function() { $("#exampleGrid").simplePagingGrid("refresh"); }});
         
    $("#search-form").bind("submit", function() {
            var purchaseno = $("#purchaseno").val();
            var purchasedate = $("#purchasedate").val();
            var cbmexp = $("#cbmexp").val();
            var com = $("#com").val();
            var per1 = $("#per1").val();
            var per2 = $("#per2").val();
            var conversion = $("#conversion").val();
            var arrivaldate = $("#arrivaldate").val();
            $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?php echo $base; ?>/cost/createcostdata",
                    data: {
                           'purchaseno' : purchaseno,
                           'purchasedate' : purchasedate,
                           'arrivaldate' : arrivaldate,
                           'cbmexp' : cbmexp,
                           'com' : com,
                           'per1' : per1,
                           'per2' : per2,
                           'conversion' : conversion                           
                       },
                    success: function(data) {                        
                        $("#id_cost").val(data);
                        $("#search-form").hide();
                        $("#addnew").show();
						$('#cost-details').show();
                    }
                });            
            return false;
        });    
});     
</script>
<script>
    $(function() {
        $( ".arrivaldate" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'dd-mm-yy',
          yearRange: '1945:'+(new Date).getFullYear() 
        });
});
</script>


