<? $this->load->view('header'); ?>
<script type="text/javascript">
$(document).ready(function() {    
        $("#exampleGrid").simplePagingGrid({
            columnNames: ["P.no", "P.date", "A.date", "Percbm EX"],
            columnKeys: ["purchaseno", "purchasedate", "arrivaldate", "cbm"],
            columnWidths: ["25%", "25%", "25%", "25%"],
            cellTemplates:["<a href='#invoice-form-{{id_cbm}}' id='editdata-{{id_cbm}}'>{{purchaseno}}</a>",null,null,null],
            sortable: [false, false, false, false],
            //initialSortColumn: "Name",
            bootstrapVersion: 2,
            data: [
                <?php foreach($cbm_data AS $refdata) : ?>
                    { "id_cbm": <?php echo $refdata['id_cbm']; ?>, "purchaseno": "<?php echo $refdata['purchaseno']; ?>", "purchasedate": "<?php echo date("d-m-Y", strtotime($refdata['purchasedate'])); ?>", "arrivaldate": "<?php echo date("d-m-Y", strtotime($refdata['arrivaldate'])); ?>", "cbm": "<?php echo $refdata['cbm']; ?>"},
                <?php endforeach; ?>
                  ]
        });   
    });
</script>

<section id="main">
    <div class="container-fluid">
        <h2>Ref Creation</h2>        
        <hr>
        <div class="clear-fix"></div>
        <div id="addnew"><a href="#invoice-form" class="btn btn-lg btn-primary" id="addnew-data">Add New</a></div>
        <div class="row-fluid">                            
            <div id="exampleGrid"></div>
        </div>
        <?php foreach($cbm_data AS $refdata) : ?>
        <div id="invoice-form-<?php echo $refdata['id_cbm']; ?>" style="display:none;width:250px;">
            <form role="form" method="post" action="#">
              <div class="form-group">
                <label for="currentreceived">Purchase no</label>
                <input type="hidden" id="id_cbm-<?php echo $refdata['id_cbm']; ?>" name="id_cbm" value="<?php echo $refdata['id_cbm']; ?>">
                <input type="number" step="any" class="form-control" id="purchaseno-<?php echo $refdata['id_cbm']; ?>" name="purchaseno-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['purchaseno']; ?>" placeholder="Purchaseno" required>
              </div> 
              <div class="form-group">
                <label for="currentreceived">Purchase date</label>
                <input type="text" class="form-control purchasedate" id="purchasedate-<?php echo $refdata['id_cbm']; ?>" name="purchasedate-<?php echo $refdata['id_cbm']; ?>" value="<?php echo date("d-m-Y", strtotime($refdata['purchasedate'])); ?>" placeholder="purchasedate" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Arrival date</label>
                <input type="text" class="form-control arrivaldate" id="arrivaldate-<?php echo $refdata['id_cbm']; ?>" name="arrivaldate-<?php echo $refdata['id_cbm']; ?>" value="<?php echo date("d-m-Y", strtotime($refdata['arrivaldate'])); ?>" placeholder="arrivaldate" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Value1</label>
                <input type="number" step="any" class="form-control" id="value1-<?php echo $refdata['id_cbm']; ?>" name="value1-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['value1']; ?>" placeholder="value1" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Conversion</label>
                <input type="number" step="any" class="form-control" id="conversion-<?php echo $refdata['id_cbm']; ?>" name="conversion-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['conversion']; ?>" placeholder="conversion" required>
              </div>
              <div class="form-group" style="margin: 0px 10px 10px 10px;">
                <label for="currentreceived" style="font-weight: bold;">Exp1a</label>
                <span id="exp1a-<?php echo $refdata['id_cbm']; ?>"><?php echo $refdata['value1']*$refdata['conversion']; ?></span>
              </div>                
              <div class="form-group">
                <label for="currentreceived">Exp2</label>
                <input type="number" step="any" class="form-control" id="exp2-<?php echo $refdata['id_cbm']; ?>" name="exp2-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['exp2']; ?>" placeholder="exp2" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp3</label>
                <input type="number" step="any" class="form-control" id="exp3-<?php echo $refdata['id_cbm']; ?>" name="exp3-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['exp3']; ?>" placeholder="exp3" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp4</label>
                <input type="number" step="any" class="form-control" id="exp4-<?php echo $refdata['id_cbm']; ?>" name="exp4-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['exp4']; ?>" placeholder="exp4" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp5</label>
                <input type="number" step="any" class="form-control" id="exp5-<?php echo $refdata['id_cbm']; ?>" name="exp5-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['exp5']; ?>" placeholder="exp5" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp6</label>
                <input type="number" step="any" class="form-control" id="exp6-<?php echo $refdata['id_cbm']; ?>" name="exp6-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['exp6']; ?>" placeholder="exp6" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp7</label>
                <input type="number" step="any" class="form-control" id="exp7-<?php echo $refdata['id_cbm']; ?>" name="exp7-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['exp7']; ?>" placeholder="exp7" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp8</label>
                <input type="number" step="any" class="form-control" id="exp8-<?php echo $refdata['id_cbm']; ?>" name="exp8-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['exp8']; ?>" placeholder="exp8" required>
              </div>                
              <div class="form-group">
                <label for="currentreceived">Exp9</label>
                <input type="number" step="any" class="form-control" id="exp9-<?php echo $refdata['id_cbm']; ?>" name="exp9-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['exp9']; ?>" placeholder="exp9" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp10</label>
                <input type="number" step="any" class="form-control" id="exp10-<?php echo $refdata['id_cbm']; ?>" name="exp10-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['exp10']; ?>" placeholder="exp10" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">No of container</label>
                <input type="number" step="any" class="form-control" id="noofcontainer-<?php echo $refdata['id_cbm']; ?>" name="noofcontainer-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['noofcontainer']; ?>" placeholder="noofcontainer" required>
              </div> 
              <div class="form-group">
                <label for="currentreceived">Per cbm</label>
                <input type="number" step="any" class="form-control" id="percbm-<?php echo $refdata['id_cbm']; ?>" name="percbm-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['percbm']; ?>" placeholder="percbm" required>
              </div>
              <div class="form-group" style="margin: 0px 10px 10px 10px;">
                <label for="currentreceived" style="font-weight: bold;">CBM</label>
                <span id="cbmcalc-<?php echo $refdata['id_cbm']; ?>"><?php echo ($refdata['noofcontainer']*$refdata['percbm']); ?></span>
              </div>
              <div class="form-group" style="margin: 0px 10px 10px 10px;">
                <label for="currentreceived" style="font-weight: bold;">ARR.CBM</label>
                <span id="arrcbm-<?php echo $refdata['id_cbm']; ?>"><?php echo (($refdata['value1']*$refdata['conversion'])+$refdata['exp2']+$refdata['exp3']+$refdata['exp4']
                        +$refdata['exp5']+$refdata['exp6']+$refdata['exp7']+$refdata['exp8']+$refdata['exp9']+$refdata['exp10']); ?></span>
              </div>                
              <div class="form-group">
                <label for="currentreceived">Cbm</label>
                <input type="number" step="any" class="form-control" id="cbm-<?php echo $refdata['id_cbm']; ?>" name="cbm-<?php echo $refdata['id_cbm']; ?>" value="<?php echo $refdata['cbm']; ?>" placeholder="cbm" required>
              </div>
              <div class="form-group" style="margin: 0px 10px 10px 10px;">
                <label for="currentreceived" style="font-weight: bold;">PER CBM EX</label>
                <span id="percbmex-<?php echo $refdata['id_cbm']; ?>"><?php echo ($refdata['cbm']/($refdata['noofcontainer']*$refdata['percbm'])); ?></span>
              </div>                
              <input type="submit" class="btn btn-lg btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <?php endforeach; ?>
        <div id="invoice-form" style="display:none;width:250px;">
            <form role="form" method="post" action="#">
              <div class="form-group">
                <label for="currentreceived">Purchase no</label>
                <input type="number" step="any" class="form-control" id="purchaseno" name="purchaseno" value="" placeholder="Purchaseno" required>
              </div> 
              <div class="form-group">
                <label for="currentreceived">Purchase date</label>
                <input type="text" class="form-control purchasedate" id="purchasedate" name="purchasedate" value="" placeholder="Purchase date" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Arrival date</label>
                <input type="text" class="form-control arrivaldate" id="arrivaldate" name="arrivaldate" value="" placeholder="Arrival date" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Value1</label>
                <input type="number" step="any" class="form-control" id="value1" name="value1" value="" placeholder="Value1" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Conversion</label>
                <input type="number" step="any" class="form-control" id="conversion" name="conversion" value="" placeholder="Conversion" required>
              </div>
              <div class="form-group" style="margin: 0px 10px 10px 10px;">
                <label for="currentreceived" style="font-weight: bold;">Exp1a</label>
                <span id="exp1a"></span>
              </div>                
              <div class="form-group">
                <label for="currentreceived">Exp2</label>
                <input type="number" step="any" class="form-control" id="exp2" name="exp2" value="" placeholder="Exp2" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp3</label>
                <input type="number" step="any" class="form-control" id="exp3" name="exp3" value="" placeholder="Exp3" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp4</label>
                <input type="number" step="any" class="form-control" id="exp4" name="exp4" value="" placeholder="Exp4" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp5</label>
                <input type="number" step="any" class="form-control" id="exp5" name="exp5" value="" placeholder="Exp5" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp6</label>
                <input type="number" step="any" class="form-control" id="exp6" name="exp6" value="" placeholder="Exp6" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp7</label>
                <input type="number" step="any" class="form-control" id="exp7" name="exp7" value="" placeholder="Exp7" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp8</label>
                <input type="number" step="any" class="form-control" id="exp8" name="exp8" value="" placeholder="Exp8" required>
              </div>                
              <div class="form-group">
                <label for="currentreceived">Exp9</label>
                <input type="number" step="any" class="form-control" id="exp9" name="exp9" value="" placeholder="Exp9" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">Exp10</label>
                <input type="number" step="any" class="form-control" id="exp10" name="exp10" value="" placeholder="Exp10" required>
              </div>
              <div class="form-group">
                <label for="currentreceived">No of container</label>
                <input type="number" step="any" class="form-control" id="noofcontainer" name="noofcontainer" value="" placeholder="No of container" required>
              </div> 
              <div class="form-group">
                <label for="currentreceived">Per cbm</label>
                <input type="number" step="any" class="form-control" id="percbm" name="percbm" value="" placeholder="Per cbm" required>
              </div>
              <div class="form-group" style="margin: 0px 10px 10px 10px;">
                <label for="currentreceived" style="font-weight: bold;">CBM</label>
                <span id="cbmcalc"></span>
              </div>
              <div class="form-group" style="margin: 0px 10px 10px 10px;">
                <label for="currentreceived" style="font-weight: bold;">ARR.CBM</label>
                <span id="arrcbm"></span>
              </div>                
              <div class="form-group">
                <label for="currentreceived">Cbm</label>
                <input type="number" step="any" class="form-control" id="cbm" name="cbm" value="" placeholder="cbm" required>
              </div>  
              <div class="form-group" style="margin: 0px 10px 10px 10px;">
                <label for="currentreceived" style="font-weight: bold;">PER CBM EX</label>
                <span id="percbmex"></span>
              </div>                 
              <input type="submit" class="btn btn-lg btn-primary" value="Submit" name="submit">
            </form>            
        </div>        
    </div>
</section>
<? $this->load->view('footer'); ?>
<script type="text/javascript" src="<?php echo $base; ?>/themes/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
    <?php foreach($cbm_data AS $refdata) : ?>                  
        $("#editdata-<?php echo $refdata['id_cbm']; ?>").fancybox({'scrolling' : 'auto',
             'titleShow' : false,'onClosed' : function() { $("#exampleGrid").simplePagingGrid("refresh"); }});
         
        $("#value1-<?php echo $refdata['id_cbm']; ?>,#conversion-<?php echo $refdata['id_cbm']; ?>").focusout(function() {            
            var value1 = $("#value1-<?php echo $refdata['id_cbm']; ?>").val();
            var conversion = $("#conversion-<?php echo $refdata['id_cbm']; ?>").val();
            $("#exp1a-<?php echo $refdata['id_cbm']; ?>" ).html(value1*conversion);
          });  
          
        $("#noofcontainer-<?php echo $refdata['id_cbm']; ?>,#percbm-<?php echo $refdata['id_cbm']; ?>").focusout(function() {
            var noofcontainer = $("#noofcontainer-<?php echo $refdata['id_cbm']; ?>").val();            
            var percbm = $("#percbm-<?php echo $refdata['id_cbm']; ?>").val();
            $("#cbmcalc-<?php echo $refdata['id_cbm']; ?>" ).html(noofcontainer*percbm);
          });          
         
        $("#value1-<?php echo $refdata['id_cbm']; ?>,#conversion-<?php echo $refdata['id_cbm']; ?>,#exp2-<?php echo $refdata['id_cbm']; ?>,#exp3-<?php echo $refdata['id_cbm']; ?>,#exp4-<?php echo $refdata['id_cbm']; ?>,#exp5-<?php echo $refdata['id_cbm']; ?>,#exp6-<?php echo $refdata['id_cbm']; ?>,#exp7-<?php echo $refdata['id_cbm']; ?>,#exp8-<?php echo $refdata['id_cbm']; ?>,#exp9-<?php echo $refdata['id_cbm']; ?>,#exp10-<?php echo $refdata['id_cbm']; ?>").focusout(function() {
            var value1 = $("#value1-<?php echo $refdata['id_cbm']; ?>").val();
            var conversion = $("#conversion-<?php echo $refdata['id_cbm']; ?>").val();
            var exp2 = $("#exp2-<?php echo $refdata['id_cbm']; ?>").val();
            var exp3 = $("#exp3-<?php echo $refdata['id_cbm']; ?>").val();
            var exp4 = $("#exp4-<?php echo $refdata['id_cbm']; ?>").val();
            var exp5 = $("#exp5-<?php echo $refdata['id_cbm']; ?>").val();
            var exp6 = $("#exp6-<?php echo $refdata['id_cbm']; ?>").val();
            var exp7 = $("#exp7-<?php echo $refdata['id_cbm']; ?>").val();
            var exp8 = $("#exp8-<?php echo $refdata['id_cbm']; ?>").val();
            var exp9 = $("#exp9-<?php echo $refdata['id_cbm']; ?>").val();
            var exp10 = $("#exp10-<?php echo $refdata['id_cbm']; ?>").val();           
            $("#arrcbm-<?php echo $refdata['id_cbm']; ?>" ).html(parseFloat((value1*conversion))+parseFloat(exp2)+parseFloat(exp3)+parseFloat(exp4)+
                parseFloat(exp5)+parseFloat(exp6)+parseFloat(exp7)+parseFloat(exp8)+parseFloat(exp9)+parseFloat(exp10));
          });
          
        $("#cbm-<?php echo $refdata['id_cbm']; ?>").focusout(function() {
            var cbm = $("#cbm-<?php echo $refdata['id_cbm']; ?>").val();            
            var noofcontainer = $("#noofcontainer-<?php echo $refdata['id_cbm']; ?>").val();            
            var percbm = $("#percbm-<?php echo $refdata['id_cbm']; ?>").val();
            $("#percbmex-<?php echo $refdata['id_cbm']; ?>" ).html(cbm/(noofcontainer*percbm));
          });
          
         $("#invoice-form-<?php echo $refdata['id_cbm']; ?>").bind("submit", function() {
            var id_cbm = $("#id_cbm-<?php echo $refdata['id_cbm']; ?>").val();
            var purchaseno = $("#purchaseno-<?php echo $refdata['id_cbm']; ?>").val();
            var purchasedate = $("#purchasedate-<?php echo $refdata['id_cbm']; ?>").val();
            var arrivaldate = $("#arrivaldate-<?php echo $refdata['id_cbm']; ?>").val();
            var value1 = $("#value1-<?php echo $refdata['id_cbm']; ?>").val();
            var conversion = $("#conversion-<?php echo $refdata['id_cbm']; ?>").val();
            var exp2 = $("#exp2-<?php echo $refdata['id_cbm']; ?>").val();
            var exp3 = $("#exp3-<?php echo $refdata['id_cbm']; ?>").val();
            var exp4 = $("#exp4-<?php echo $refdata['id_cbm']; ?>").val();
            var exp5 = $("#exp5-<?php echo $refdata['id_cbm']; ?>").val();
            var exp6 = $("#exp6-<?php echo $refdata['id_cbm']; ?>").val();
            var exp7 = $("#exp7-<?php echo $refdata['id_cbm']; ?>").val();
            var exp8 = $("#exp8-<?php echo $refdata['id_cbm']; ?>").val();
            var exp9 = $("#exp9-<?php echo $refdata['id_cbm']; ?>").val();
            var exp10 = $("#exp10-<?php echo $refdata['id_cbm']; ?>").val();
            var noofcontainer = $("#noofcontainer-<?php echo $refdata['id_cbm']; ?>").val();            
            var percbm = $("#percbm-<?php echo $refdata['id_cbm']; ?>").val();
            var cbm = $("#cbm-<?php echo $refdata['id_cbm']; ?>").val();
            
            $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?php echo $base; ?>/cbm/updatecbmdata",
                    data: {
                           'id_cbm' : id_cbm,
                           'purchaseno' : purchaseno,
                           'purchasedate' : purchasedate,
                           'arrivaldate' : arrivaldate,
                           'value1' : value1,
                           'conversion' : conversion,
                           'exp2' : exp2,
                           'exp3' : exp3,
                           'exp4' : exp4,
                           'exp5' : exp5,
                           'exp6' : exp6,
                           'exp7' : exp7,
                           'exp8' : exp8,
                           'exp9' : exp9,
                           'exp10' : exp10,
                           'noofcontainer' : noofcontainer,
                           'percbm' : percbm,
                           'cbm' : cbm                           
                       },
                    success: function(data) {
                        location.reload();
                    }
                });            
            return false;
         });  
     <?php endforeach; ?>     
        $("#addnew-data").fancybox({'scrolling' : 'auto',
             'titleShow' : false,'onClosed' : function() { $("#exampleGrid").simplePagingGrid("refresh"); }});
         
        $("#value1,#conversion").focusout(function() {            
            var value1 = $("#value1").val();
            var conversion = $("#conversion").val();
            $("#exp1a" ).html(value1*conversion);
          });  
          
        $("#noofcontainer,#percbm").focusout(function() {
            var noofcontainer = $("#noofcontainer").val();            
            var percbm = $("#percbm").val();
            $("#cbmcalc" ).html(noofcontainer*percbm);
          });          
         
        $("#value1,#conversion,#exp2,#exp3,#exp4,#exp5,#exp6,#exp7,#exp8,#exp9,#exp10").focusout(function() {
            var value1 = $("#value1").val();
            var conversion = $("#conversion").val();
            var exp2 = $("#exp2").val();
            var exp3 = $("#exp3").val();
            var exp4 = $("#exp4").val();
            var exp5 = $("#exp5").val();
            var exp6 = $("#exp6").val();
            var exp7 = $("#exp7").val();
            var exp8 = $("#exp8").val();
            var exp9 = $("#exp9").val();
            var exp10 = $("#exp10").val();           
            $("#arrcbm" ).html(parseFloat((value1*conversion))+parseFloat(exp2)+parseFloat(exp3)+parseFloat(exp4)+
                parseFloat(exp5)+parseFloat(exp6)+parseFloat(exp7)+parseFloat(exp8)+parseFloat(exp9)+parseFloat(exp10));
          });
          
        $("#cbm").focusout(function() {
            var cbm = $("#cbm").val();            
            var noofcontainer = $("#noofcontainer").val();            
            var percbm = $("#percbm").val();
            $("#percbmex" ).html(cbm/(noofcontainer*percbm));
          }); 
          
        $("#invoice-form").bind("submit", function() {
            var purchaseno = $("#purchaseno").val();
            var purchasedate = $("#purchasedate").val();
            var arrivaldate = $("#arrivaldate").val();
            var value1 = $("#value1").val();
            var conversion = $("#conversion").val();
            var exp2 = $("#exp2").val();
            var exp3 = $("#exp3").val();
            var exp4 = $("#exp4").val();
            var exp5 = $("#exp5").val();
            var exp6 = $("#exp6").val();
            var exp7 = $("#exp7").val();
            var exp8 = $("#exp8").val();
            var exp9 = $("#exp9").val();
            var exp10 = $("#exp10").val();
            var noofcontainer = $("#noofcontainer").val();            
            var percbm = $("#percbm").val();
            var cbm = $("#cbm").val();
            $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?php echo $base; ?>/cbm/createcbmdata",
                    data: {
                           'purchaseno' : purchaseno,
                           'purchasedate' : purchasedate,
                           'arrivaldate' : arrivaldate,
                           'value1' : value1,
                           'conversion' : conversion,
                           'exp2' : exp2,
                           'exp3' : exp3,
                           'exp4' : exp4,
                           'exp5' : exp5,
                           'exp6' : exp6,
                           'exp7' : exp7,
                           'exp8' : exp8,
                           'exp9' : exp9,
                           'exp10' : exp10,
                           'noofcontainer' : noofcontainer,
                           'percbm' : percbm,
                           'cbm' : cbm 
                       },
                    success: function(data) {
                        location.reload();
                    }
                });            
            return false;
        });
});     
</script>
<script>
    $(function() {
        $( ".purchasedate" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'dd-mm-yy',
          yearRange: '1945:'+(new Date).getFullYear() 
        });
        
        $( ".arrivaldate" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'dd-mm-yy',
          yearRange: '1945:'+(new Date).getFullYear() 
        }); 

});
</script>

