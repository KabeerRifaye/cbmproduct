<? $this->load->view('header'); ?>
<script type="text/javascript">
$(document).ready(function() {    
        $("#exampleGrid").simplePagingGrid({
            columnNames: ["Refno", "Note1", "Note2", "Note3"],
            columnKeys: ["refno", "note1", "note2", "note3"],
            columnWidths: ["25%", "25%", "25%", "25%"],
            cellTemplates:["<a href='#invoice-form-{{id_refcreation}}' id='editdata-{{id_refcreation}}'>{{refno}}</a>",null,null,null],
            sortable: [false, false, false, false],
            //initialSortColumn: "Name",
            bootstrapVersion: 2,
            data: [
                <?php foreach($ref_data AS $refdata) : ?>
                    { "id_refcreation": <?php echo $refdata['id_refcreation']; ?>, "refno": "<?php echo $refdata['refno']; ?>", "note1": "<?php echo $refdata['note1']; ?>", "note2": "<?php echo $refdata['note2']; ?>", "note3": "<?php echo $refdata['note3']; ?>"},
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
        <?php foreach($ref_data AS $refdata) : ?>
        <div id="invoice-form-<?php echo $refdata['id_refcreation']; ?>" style="display:none;">
            <form role="form" method="post" action="#">
              <div class="form-group">
                <label for="currentreceived">Refno</label>
                <input type="hidden" id="id_refcreation-<?php echo $refdata['id_refcreation']; ?>" name="id_refcreation" value="<?php echo $refdata['id_refcreation']; ?>">
                <input type="text" class="form-control" id="refno-<?php echo $refdata['id_refcreation']; ?>" name="refno-<?php echo $refdata['id_refcreation']; ?>" value="<?php echo $refdata['refno']; ?>" placeholder="Refno" required>
              </div>                                
              <div class="form-group">
                <label for="description">Note1</label>
                <input type="text" class="form-control" id="note1-<?php echo $refdata['id_refcreation']; ?>" name="note1-<?php echo $refdata['id_refcreation']; ?>" value="<?php echo $refdata['note1']; ?>" placeholder="Note1" required>
              </div>
              <div class="form-group">
                <label for="description">Note2</label>
                <input type="text" class="form-control" id="note2-<?php echo $refdata['id_refcreation']; ?>" name="note2-<?php echo $refdata['id_refcreation']; ?>" value="<?php echo $refdata['note2']; ?>" placeholder="Note2" required>
              </div>
              <div class="form-group">
                <label for="description">Note3</label>
                <input type="text" class="form-control" id="note3-<?php echo $refdata['id_refcreation']; ?>" name="note3-<?php echo $refdata['id_refcreation']; ?>" value="<?php echo $refdata['note3']; ?>" placeholder="Note3" required>
              </div>                
              <input type="submit" class="btn btn-lg btn-primary" value="Submit" name="submit">
            </form>
        </div>
        <?php endforeach; ?>
        <div id="invoice-form" style="display:none;">
            <form role="form" method="post" action="#">
              <div class="form-group">
                <label for="currentreceived">Refno</label>                
                <input type="text" class="form-control" id="refno" name="refno" value="" placeholder="Refno" required>
              </div>                                
              <div class="form-group">
                <label for="description">Note1</label>
                <input type="text" class="form-control" id="note1" name="note1" value="" placeholder="Note1" required>
              </div>
              <div class="form-group">
                <label for="description">Note2</label>
                <input type="text" class="form-control" id="note2" name="note2" value="" placeholder="Note2" required>
              </div>
              <div class="form-group">
                <label for="description">Note3</label>
                <input type="text" class="form-control" id="note3" name="note3" value="" placeholder="Note3" required>
              </div>                
              <input type="submit" class="btn btn-lg btn-primary" value="Submit" name="submit">
            </form>
            </form>
        </div>        
    </div>
</section>
<? $this->load->view('footer'); ?>
<script type="text/javascript" src="<?php echo $base; ?>/themes/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
    <?php foreach($ref_data AS $refdata) : ?>
         $("#editdata-<?php echo $refdata['id_refcreation']; ?>").fancybox({'scrolling' : 'no',
             'titleShow' : false,'onClosed' : function() { $("#exampleGrid").simplePagingGrid("refresh"); }});
         
         $("#invoice-form-<?php echo $refdata['id_refcreation']; ?>").bind("submit", function() {
            var id_refcreation = $("#id_refcreation-<?php echo $refdata['id_refcreation']; ?>").val();
            var refno = $("#refno-<?php echo $refdata['id_refcreation']; ?>").val();
            var note1 = $("#note1-<?php echo $refdata['id_refcreation']; ?>").val();
            var note2 = $("#note2-<?php echo $refdata['id_refcreation']; ?>").val();
            var note3 = $("#note3-<?php echo $refdata['id_refcreation']; ?>").val();
            $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?php echo $base; ?>/refcreation/updaterefdata",
                    data: {
                           'id_refcreation' : id_refcreation,
                           'refno' : refno,
                           'note1' : note1,
                           'note2' : note2,
                           'note3' : note3
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
         
        $("#invoice-form").bind("submit", function() {
            var refno = $("#refno").val();
            var note1 = $("#note1").val();
            var note2 = $("#note2").val();
            var note3 = $("#note3").val();
            $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?php echo $base; ?>/refcreation/createrefdata",
                    data: {
                           'refno' : refno,
                           'note1' : note1,
                           'note2' : note2,
                           'note3' : note3
                       },
                    success: function(data) {
                        location.reload();
                    }
                });            
            return false;
        });
});     
</script>

