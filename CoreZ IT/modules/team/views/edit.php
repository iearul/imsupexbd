<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Edit Management Team
                </div>
            </div>
            <div class="portlet-body form">
                <?=form_open_multipart('team/edit/'.$team->id, array('class' => 'form-horizontal'))?>
                    <div class="form-body">
                        <div class="form-group ">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 100px; height: 30px;">
                                        <img src="<?='uploads/gallery/'.$team->photo?>" alt=""/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput">
                                        
                                    </div>
                                    <div>
                                        <span class="btn default btn-file">
                                        <span class="fileinput-new">
                                        Select image </span>
                                        <span class="fileinput-exists">
                                        Change </span>
                                        <input type="file" name="team">
                                        </span>
                                        <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                        Remove </a>
                                    </div>
                                </div>
                                <div class="clearfix margin-top-10">
                                    <span class="label label-danger">
                                        NOTE! 
                                    </span>
                                     &nbsp; Please Upload JPG or PNG files only. Image have to be 500 X 500<br> Maximum file size is 2MB or 2048KB.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                        <?php echo form_input($name);?>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Designation</label>
                                <div class="col-md-9">
                                        <?php echo form_input($designation);?>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Detail</label>
                                <div class="col-md-9">
                                        <textarea name="detail" class="form-control"><?=$team->detail?></textarea>
                                </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" name="submit" value="avatar" class="btn blue">Confirm</button>
                                <button type="reset" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>