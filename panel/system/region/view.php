<?php
$title = lang('regions');
include('./system/layout/head.php');
?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?=$title?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <?=lang('main')?>
                            </li>
                            <li class="active">
                                <i class="fa fa-map-marker"></i> <?=$title?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="">
					<a class="btn btn-default pull-right" href="#addRegionModal" data-toggle="modal"><?=lang('addNew')?></a>
				</div>
				<div class="row">
                    <div class="col-lg-12">
					<table class="table">
						<thead>
							<tr>
							<th>#</th>
							<th><?=lang('nameRu')?></th>
							<th><?=lang('nameUz')?></th>
							<th><?=lang('location')?></th>
							<th><?=lang('orderNumber')?></th>
							<th></th>
							<tr>
						</thead>
						<tbody>
					<?php
						$regionList = $db->getRegionList();
						for ($i = 0; $i < count($regionList); $i++) {
							$c = $i + 1;
							echo "<tr data-id='{$regionList[$i]['id']}'>
							    <td>{$c}</td><td data-form='name'>{$regionList[$i]['name']}</td>
							    <td data-form='name_uz'>{$regionList[$i]['name_uz']}</td>
							    <td data-form='location_id' data-val='{$regionList[$i]['location_id']}'>{$regionList[$i]['location_name']}</td>
							    <td data-form='order_by'>{$regionList[$i]['order_by']}</td>
							    <td><div class=\"btn-group\"><a class=\"btn btn-default\" href=\"#addRegionModal\" data-toggle=\"modal\" onclick=\"edit(this, 'addRegion')\">".lang('edit')."</a><a class=\"btn btn-default\" href=\"".path().$app.'/delete/'.$regionList[$i]['id']."\">".lang('delete')."</a></div></td>
							    </tr>";
						}
					?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
	<!-- Modal -->
	<div class="modal fade" id="addRegionModal" tabindex="-1" role="dialog" aria-labelledby="addRegionModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><?=lang('addRegion')?></h4>
				</div>
				<div class="modal-body">
					<form role="form" action="<?=path().'region/manage'?>" method="post" id="addRegionForm">
						<div class="form-group">
							<label for="name"><?=lang('nameRu')?></label>
							<input type="text" id="name" name="name" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="name_uz"><?=lang('nameUz')?></label>
							<input type="text" id="name_uz" name="name_uz" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="location_id"><?=lang('location')?></label>
							<?=getSelect('location', false)?>
						</div>
						<div class="form-group">
							<label for="order_by"><?=lang('orderNumber')?></label>
							<input type="number" maxlength="2" id="order_by" name="order_by" class="form-control"/>
						</div>
						<input type="hidden" name="id" id="id" value=""/>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></button>
					<button type="button" class="btn btn-primary" onclick="$('#addRegionForm').submit()"><?=lang('save')?></button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<?php
include('./system/layout/foot.php');