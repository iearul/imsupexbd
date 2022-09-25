<script src="assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>

<script>
        jQuery(document).ready(function() {       
           $("#touchspin").TouchSpin({          
            buttondown_class: 'btn green',
            buttonup_class: 'btn green',
            min: 0,
            max: 1000000000,
            decimals: 2,
            forcestepdivisibility : 'none',
            maxboostedstep: 10000000,
            prefix: '৳'
        }); 
        });   
    </script>
    <script type="text/javascript">
	$(document).ready(function(){
            $("#add_attached_file").click(function(){
                $('<div class="form-group"><div class="col-md-offset-3 col-md-4"><?php echo form_input($attachedName);?></div><div class="col-md-5"><input type="file" name="attached[]"></div></div>').appendTo("#attached");
            });
        });
        
</script>
    <div class="row">    
        <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        Create Product Category
                                </div>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $("select").change(function(){
                                    $(this).find("option:selected").each(function(){
                                        if($(this).attr("value")=="Imported"){
                                            $(".cat").not(".attach").hide();
                                            $(".attach").show();
                                        }
                                        else if($(this).attr("value")=="Export"){
                                            $(".cat").not(".attach").hide();
                                            $(".attach").show();
                                        }
                                        else{
                                            $(".cat").hide();
                                        }
                                    });
                                }).change();
                            });
                        </script>
                        <div class="portlet-body form">
                                <?=form_open_multipart("categories/add", array('class' => 'form-horizontal'))?>
                                        <div class="form-body">
                                                <div class="form-group">
                                                        <label class="col-md-3 control-label">Name</label>
                                                        <div class="col-md-9">
                                                                <?php echo form_input($title);?>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Category Type</label>
                                                    <div class="col-md-6">
                                                        <select class="form-control" name="type">
                                                            <option value="Imported" selected>Imported</option>
                                                            <option value="Export">Export</option>
                                                            <option value="Interior">Interior</option>
                                                            <option value="Agro">Agro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="attached"  class="attach cat">
                                                    <div class="form-group">
                                                            <label class="col-md-3 control-label">Attach Files</label>
                                                            <div class="col-md-9">
                                                                <button id="add_attached_file" type="button" class="btn green">Add New</button>
                                                            </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-offset-3 col-md-4">
                                                                        <?php echo form_input($attachedName);?>
                                                        </div>
                                                        <div class="col-md-5">

                                                                            <input type="file" name="attached[]">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-actions">
                                                <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Submit</button>
                                                                <button type="reset" class="btn default">Reset</button>
                                                        </div>
                                                </div>
                                        </div>
                                <?php echo form_close();?>
                        </div>
                </div>
        </div>
</div>


