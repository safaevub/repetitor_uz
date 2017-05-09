<?php
$title = lang('subjects');
include('./system/layout/head.php');
?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Subjects
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Home
                            </li>
                            <li class="active">
                                <i class="fa fa-th-list"></i> Subjects
                                                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="">
					<a class="btn btn-default pull-right" href="#addSubjectModal" data-toggle="modal">Add new</a>
				</div>
				<div class="row">
                    <div class="col-lg-12">
					<table class="table">
						<thead>
							<tr>
							<th>#</th>
							<th>Name in English</th>
							<th>The name in Russian</th>
							<th>Sorting number</th>
							<th></th>
							<tr>
						</thead>
						<tbody>
					<?php
						$subjectList = $db->getSubjectList();
						for ($i = 0; $i < count($subjectList); $i++) {
							$c = $i + 1;
							echo "<tr data-id='{$subjectList[$i]['id']}'><td>{$c}</td><td data-form='name'>{$subjectList[$i]['name']}</td><td data-form='name_uz'>{$subjectList[$i]['name_uz']}</td><td data-form='order_by'>{$subjectList[$i]['order_by']}</td><td><div class=\"btn-group\"><a class=\"btn btn-default\" href=\"#addSubjectModal\" data-toggle=\"modal\" onclick=\"edit(this, 'addSubject')\">".lang('edit')."</a><a class=\"btn btn-default\" href=\"".path().'subject/delete/'.$subjectList[$i]['id']."\">".lang('delete')."</a></div></td></tr>";
						}
					?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
	<!-- Modal -->
	<div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><?=lang('addSubject')?></h4>
				</div>
				<div class="modal-body">
					<form role="form" action="<?=path().'subject/manage'?>" method="post" id="addSubjectForm">
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
					<button type="button" class="btn btn-primary" onclick="$('#addSubjectForm').submit()"><?=lang('save')?></button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<?php
include('./system/layout/foot.php');