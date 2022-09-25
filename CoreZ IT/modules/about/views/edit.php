
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Greeting
                </div>
            </div>
            <div class="portlet-body form">
                <?=form_open_multipart('about/edit', array('class' => 'form-horizontal'))?>
                    <div class="form-body">
                        <div class="form-group">
                                <label class="col-md-3 control-label">Introduction</label>
                                <div class="col-md-5">
                                    <textarea name="introduction"class="form-control"><?=$site->introduction?></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Mission</label>
                                <div class="col-md-5">
                                    <textarea name="mission"class="form-control"><?=$site->mission?></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Vision</label>
                                <div class="col-md-5">
                                    <textarea name="vision"class="form-control"><?=$site->vision?></textarea>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Objective</label>
                                <div class="col-md-5">
                                    <textarea name="objective"class="form-control"><?=$site->objective?></textarea>
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