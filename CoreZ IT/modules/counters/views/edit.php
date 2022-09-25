
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Available Blood
                </div>
            </div>
            <div class="portlet-body form">
                <?=form_open_multipart('counters/edit/'.$counters->id, array('class' => 'form-horizontal'))?>
                    <div class="form-body">
                        <div class="form-group">
                                <label class="col-md-3 control-label">Title</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="title" value="<?=$counters->title?>">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Counter 1 Name</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="c1name" value="<?=$counters->c1name?>">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Counter 1 Value</label>
                                <div class="col-md-5">
                                    <input type="number" class="form-control" name="c1number" value="<?=$counters->c1number?>">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Counter 2 Name</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="c2name" value="<?=$counters->c2name?>">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Counter 1 Value</label>
                                <div class="col-md-5">
                                    <input type="number" class="form-control" name="c2number" value="<?=$counters->c2number?>">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Counter 3 Name</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="c3name" value="<?=$counters->c3name?>">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Counter 3 Value</label>
                                <div class="col-md-5">
                                    <input type="number" class="form-control" name="c3number" value="<?=$counters->c3number?>">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Counter 4 Name</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="c4name" value="<?=$counters->c4name?>">
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Counter 4 Value</label>
                                <div class="col-md-5">
                                    <input type="number" class="form-control" name="c4number" value="<?=$counters->c4number?>">
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