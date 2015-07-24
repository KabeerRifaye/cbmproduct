<? $this->load->view('header'); ?>
<script type="text/javascript">
$(document).ready(function() {    
        $("#exampleGrid").simplePagingGrid({
            columnNames: ["Image","Refno", "Modelno", "Pur.Price", "CBM", "S.Price"],
            columnKeys: ["image", "refno", "modelno", "purchaseprice", "cbm", "sellingprice"],
            columnWidths: ["20%", "15%", "15%", "20%", "15%", "15%"],
            cellTemplates:["<a href='#invoice-form-{{id_modelcreation}}' id='editdata-{{id_modelcreation}}'>{{imagename}}</a>",null,null,null,null,null],
            sortable: [false, false, false, false, false, false],
            //initialSortColumn: "Name",
            bootstrapVersion: 2,
            data: [
                <?php foreach($model_data AS $refdata) : ?>
                    { "id_modelcreation": <?php echo $refdata['id_modelcreation']; ?>,"imagename": "<?php echo $refdata['imagename']; ?>", "refno": "<?php echo $refdata['refno']; ?>", "modelno": "<?php echo $refdata['modelno']; ?>", "purchaseprice": "<?php echo $refdata['purchaseprice']; ?>", "cbm": "<?php echo $refdata['cbm']; ?>", "sellingprice": "<?php echo $refdata['sellingprice']; ?>"},
                <?php endforeach; ?>
                  ]
        });   
    });
</script>

<section id="main">
    <div class="container-fluid">
        <h2>Model Creation</h2>        
        <hr>
        <div class="clear-fix"></div>
        <div id="addnew"><a href="#invoice-form" class="btn btn-lg btn-primary" id="addnew-data">Add New</a></div>
        <div class="row-fluid">                            
            <div id="exampleGrid"></div>
        </div>
        <?php foreach($model_data AS $refdata) : ?>
        <div id="invoice-form-<?php echo $refdata['id_modelcreation']; ?>" style="display:none;">
            <form role="form" method="post" action="#">
              <div class="form-group">
                <label for="currentreceived">Refno</label>
                <input type="hidden" id="id_modelcreation-<?php echo $refdata['id_modelcreation']; ?>" name="id_modelcreation" value="<?php echo $refdata['id_modelcreation']; ?>">
                <select id="refno-<?php echo $refdata['id_modelcreation']; ?>" name="refno-<?php echo $refdata['id_modelcreation']; ?>">
                    <?php foreach($ref_data AS $refselectdata) :?>
                    <option value="<?php echo $refselectdata['id_refcreation']; ?>" <?php if($refselectdata['id_refcreation'] == $refdata['id_refcreation']) : echo 'selected=selected'; endif; ?>><?php echo $refselectdata['refno']; ?></option>
                    <?php endforeach; ?>
                </select>                
              </div>                                
              <div class="form-group">
                <label for="description">Modelno</label>
                <input type="text" class="form-control" id="modelno-<?php echo $refdata['id_modelcreation']; ?>" name="modelno-<?php echo $refdata['id_modelcreation']; ?>" value="<?php echo $refdata['modelno']; ?>" placeholder="Modelno" required>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description-<?php echo $refdata['id_modelcreation']; ?>" name="description-<?php echo $refdata['id_modelcreation']; ?>" value="<?php echo $refdata['description']; ?>" placeholder="Description" required>
              </div>
              <div class="form-group">
                <label for="description">Purchase Price</label>
                <input type="number" step="any" class="form-control" id="purchaseprice-<?php echo $refdata['id_modelcreation']; ?>" name="purchaseprice-<?php echo $refdata['id_modelcreation']; ?>" value="<?php echo $refdata['purchaseprice']; ?>" placeholder="Purchase Price" required>
              </div> 
              <div class="form-group">
                <label for="description">Cbm</label>
                <input type="number" step="any" class="form-control" id="cbm-<?php echo $refdata['id_modelcreation']; ?>" name="cbm-<?php echo $refdata['id_modelcreation']; ?>" value="<?php echo $refdata['cbm']; ?>" placeholder="Cbm" required>
              </div> 
              <div class="form-group">
                <label for="description">Weight</label>
                <input type="number" step="any" class="form-control" id="weight-<?php echo $refdata['id_modelcreation']; ?>" name="weight-<?php echo $refdata['id_modelcreation']; ?>" value="<?php echo $refdata['weight']; ?>" placeholder="Weight" required>
              </div> 
              <div class="form-group">
                <label for="description">Selling Price</label>
                <input type="number" step="any" class="form-control" id="sellingprice-<?php echo $refdata['id_modelcreation']; ?>" name="sellingprice-<?php echo $refdata['id_modelcreation']; ?>" value="<?php echo $refdata['sellingprice']; ?>" placeholder="Selling Price" required>
              </div>
              <?php /*?><div class="form-group">
                <label for="description">Select Image</label>
                <input type="text" class="form-control" id="note3-<?php echo $refdata['id_modelcreation']; ?>" name="note3-<?php echo $refdata['id_modelcreation']; ?>" value="<?php echo $refdata['imagename']; ?>" placeholder="imagename" required>
              </div><?php */?>               
              <input type="submit" class="btn btn-lg btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <?php endforeach; ?>
        <div id="invoice-form" style="display:none;">
            <?php echo form_open_multipart($base.'/modelcreation/createmodeldata',array('method'=>'post'));?>
              <div class="form-group">
                <label for="currentreceived">Refno</label>
                <select id="refno" name="refno">
                    <?php foreach($ref_data AS $refselectdata) :?>
                    <option value="<?php echo $refselectdata['id_refcreation']; ?>"><?php echo $refselectdata['refno']; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>                                
              <div class="form-group">
                <label for="description">Modelno</label>
                <input type="text" class="form-control" id="modelno" name="modelno" value="" placeholder="Modelno" required>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="" placeholder="Description" required>
              </div>
              <div class="form-group">
                <label for="description">Purchase Price</label>
                <input type="number" step="any" class="form-control" id="purchaseprice" name="purchaseprice" value="" placeholder="Purchase Price" required>
              </div> 
              <div class="form-group">
                <label for="description">Cbm</label>
                <input type="number" step="any" class="form-control" id="cbm" name="cbm" value="" placeholder="Cbm" required>
              </div> 
              <div class="form-group">
                <label for="description">Weight</label>
                <input type="number" step="any" class="form-control" id="weight" name="weight" value="" placeholder="Weight" required>
              </div> 
              <div class="form-group">
                <label for="description">Selling Price</label>
                <input type="number" step="any" class="form-control" id="sellingprice" name="sellingprice" value="" placeholder="Selling Price" required>
              </div>
              <div class="form-group">
                <label for="description">Select Image</label>
                <input type="file" class="form-control" id="note3" name="note3" required />
              </div>      
              <input type="submit" class="btn btn-lg btn-primary" value="Submit" name="submit" style="margin-top:10px;">
            </form>            
        </div>        
    </div>
</section>
<? $this->load->view('footer'); ?>
<script type="text/javascript" src="<?php echo $base; ?>/themes/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
    <?php foreach($model_data AS $refdata) : ?>
         $("#editdata-<?php echo $refdata['id_modelcreation']; ?>").fancybox({'scrolling' : 'no',
             'titleShow' : false,'onClosed' : function() { $("#exampleGrid").simplePagingGrid("refresh"); }});
			 $("#invoice-form-<?php echo $refdata['id_modelcreation']; ?>").bind("submit", function() {
            var id_modelcreation = $("#id_modelcreation-<?php echo $refdata['id_modelcreation']; ?>").val();
            var refno = $("#refno-<?php echo $refdata['id_modelcreation']; ?>").val();
            var modelno = $("#modelno-<?php echo $refdata['id_modelcreation']; ?>").val();
            var description = $("#description-<?php echo $refdata['id_modelcreation']; ?>").val();
            var purchaseprice = $("#purchaseprice-<?php echo $refdata['id_modelcreation']; ?>").val();
            var cbm = $("#cbm-<?php echo $refdata['id_modelcreation']; ?>").val();
            var weight = $("#weight-<?php echo $refdata['id_modelcreation']; ?>").val();
            var sellingprice = $("#sellingprice-<?php echo $refdata['id_modelcreation']; ?>").val();
            //var imagename = $("#imagename-<?php echo $refdata['id_modelcreation']; ?>").val();
            $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?php echo $base; ?>/modelcreation/updatemodeldata",
                    data: {
                           'id_modelcreation' : id_modelcreation,
                           'refno' : refno,
                           'modelno' : modelno,
                           'description' : description,
                           'purchaseprice' : purchaseprice,
                           'cbm' : cbm,
                           'weight' : weight,
                           'sellingprice' : sellingprice
                           //'imagename' : imagename                         
                       },
                    success: function(data) {
                        location.reload();
                    }
                });            
            return false;
         });
     <?php endforeach; ?>     
        $("#addnew-data").fancybox({'scrolling' : 'no',
             'titleShow' : false,'onClosed' : function() { $("#exampleGrid").simplePagingGrid("refresh"); }});
         
        /*$("#invoice-form").bind("submit", function() {
            var id_modelcreation = $("#id_modelcreation").val();
            var refno = $("#refno").val();
            var modelno = $("#modelno").val();
            var description = $("#description").val();
            var purchaseprice = $("#purchaseprice").val();
            var cbm = $("#cbm").val();
            var weight = $("#weight").val();
            var sellingprice = $("#sellingprice").val();
            var imagename = $("#imagename").val();
            $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?php //echo $base; ?>/modelcreation/createmodeldata",
                    data: {
                           'id_modelcreation' : id_modelcreation,
                           'refno' : refno,
                           'modelno' : modelno,
                           'description' : description,
                           'purchaseprice' : purchaseprice,
                           'cbm' : cbm,
                           'weight' : weight,
                           'sellingprice' : sellingprice,
                           'imagename' : imagename 
                       },
                    success: function(data) {
						console.log(data);
                        //location.reload();
                    }
                });            
            return false;
        }); */
});     
</script>

