
<script>
        jQuery(document).ready(function() { 
            $("#add_attached_file").click(function(){
                $('<div class="form-group"><div class="col-md-offset-3 col-md-4"><?php echo form_input($attachedName);?></div><div class="col-md-5"><input type="file" name="attached[]"></div></div>').appendTo("#attached");
            });
        });   
    </script>
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
    <div class="row">    
        <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        Edit Product Category
                                </div>
                        </div>
                        <div class="portlet-body form">
                                <?=form_open_multipart("categories/edit/".$category->url, array('class' => 'form-horizontal'))?>
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
                                                <?php foreach($files as $file){ ?>
                                                <div class="form-group">
                                                    <div class="col-md-offset-3 col-md-4">
                                                                    <?=$file->title?>
                                                    </div>
                                                    <div class="col-md-5">
                                                            <?=anchor("courses/deleteAttach/".$file->url, 'Delete', array('onclick' => 'if(confirm(\'Are you sure to Delete this File.\'))return true; return false;', 'class'=>'btn red', 'title'=>'Delete attached file'))?>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div id="attached" class="attach cat">
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


