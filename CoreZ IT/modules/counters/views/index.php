<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<div class="row">
        <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                        <div class="portlet-title">
                                <div class="caption">
                                        Counter Status
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_6">
                                    <thead>
                                        <tr>
                                                <th>Title</th>
                                                <th>Counter 1 Name</th>
                                                <th>Counter 1 Value</th>
                                                <th>Counter 2 Name</th>
                                                <th>Counter 2 Value</th>
                                                <th>Counter 3 Name</th>
                                                <th>Counter 3 Value</th>
                                                <th>Counter 4 Name</th>
                                                <th>Counter 4 Value</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td><?=$counters->title?></td>
                                                <td><?=$counters->c1name?></td>
                                                <td><?=$counters->c1number?></td>
                                                <td><?=$counters->c2name?></td>
                                                <td><?=$counters->c2number?></td>
                                                <td><?=$counters->c3name?></td>
                                                <td><?=$counters->c3number?></td>
                                                <td><?=$counters->c4name?></td>
                                                <td><?=$counters->c4number?></td>
                                                <td><?php echo anchor("counters/edit/".$counters->id, 'Edit') ;?></td>
                                            </tr>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>



















<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script>
jQuery(document).ready(function() {       
   TableAdvanced.init();
});
</script>


