<?php
$title = 'Группы';
include('./system/layout/head.php');
?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?=lang('groups')?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <?=lang('main')?>
                            </li>
                            <li class="active">
                                <i class="fa fa-group"></i> <?=lang('groups')?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
					<a class="btn btn-default pull-right" href="#addGroupModal" data-toggle="modal"><?=lang('addNew')?></a>
				</div>
				<div class="row">
                    <div class="col-lg-12">
					<table class="table">
						<thead>
							<tr>
							<th>#</th>
							<th><?=lang('nameCom')?></th>
							<th><?=lang('nameRu')?></th>
							<th><?=lang('orderNumber')?></th>
							<th></th>
							<tr>
						</thead>
						<tbody>
					<?php
						$groupList = $db->getGroupList(); 
						for ($i = 0; $i < count($groupList); $i++) {
							$c = $i + 1;
							echo "<tr data-id='{$groupList[$i]['id']}'><td>{$c}</td><td data-form='name'>{$groupList[$i]['name']}</td><td data-form='name_uz'>{$groupList[$i]['name_uz']}</td><td data-form='order_by'>{$groupList[$i]['order_by']}</td><td><div class=\"btn-group\"><a class=\"btn btn-default\" href=\"#addGroupModal\" data-toggle=\"modal\" onclick=\"edit(this, 'addGroup')\">".lang('edit')."</a><a class=\"btn btn-default\" href=\"".path().'group/delete/'.$groupList[$i]['id']."\">".lang('delete')."</a></div></td></tr>";
						}
					?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
	<!-- Modal -->
	<div class="modal fade" id="addGroupModal" tabindex="-1" role="dialog" aria-labelledby="addGroupModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><?=lang('addGroup')?></h4>
				</div>
				<div class="modal-body">
					<form role="form" action="<?=path().'group/manage'?>" method="post" id="addGroupForm">
						<div class="form-group">
							<label for="name"><?=lang('nameRu')?></label>
							<input type="text" id="name" name="name" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="name_uz"><?=lang('nameUz')?></label>
							<input type="text" id="name_uz" name="name_uz" class="form-control"/>
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
					<button type="button" class="btn btn-primary" onclick="$('#addGroupForm').submit()"><?=lang('save')?></button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<?php
include('./system/layout/foot.php');