<?php
$title = lang('lessons');
include('./system/layout/head.php');
?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?=lang('lessons')?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <?=lang('main')?>
                            </li>
                            <li class="active">
                                <i class="fa fa-book"></i> <?=lang('lessons')?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="">
					<a class="btn btn-default pull-right" href="#addLessonModal" data-toggle="modal"><?=lang('addNew')?></a>
				</div>
				<div class="row">
                    <div class="col-lg-12">
					<table class="table">
						<thead>
							<tr>
							<th>#</th>
							<th><?=lang('nameCom')?></th>
							<th><?=lang('nameRu')?></th>
							<th><?=lang('subject')?></th>
							<th><?=lang('exam')?></th>
							<th><?=lang('orderNumber')?></th>
							<th></th>
							<tr>
						</thead>
						<tbody>
					<?php
						$lessonList = $db->getLessonList();
                        //var_dump($lessonList);
						for ($i = 0; $i < count($lessonList); $i++) {
							$c = $i + 1;
							echo "<tr data-id='{$lessonList[$i]['id']}'>
							    <td>{$c}</td><td data-form='name'>{$lessonList[$i]['name']}</td>
							    <td data-form='name_uz'>{$lessonList[$i]['name_uz']}</td>
							    <td data-form='subject_id' data-val='{$lessonList[$i]['subject_id']}'>{$lessonList[$i]['subject_name']}</td>
							    <td data-form='if_exam' data-val='{$lessonList[$i]['if_exam']}'>".(empty($lessonList[$i]['if_exam']) ? lang('havent') : lang('have'))."</td>
							    <td data-form='order_by'>{$lessonList[$i]['order_by']}</td>
							    <td><div class=\"btn-group\"><a class=\"btn btn-default\" href=\"#addLessonModal\" data-toggle=\"modal\" onclick=\"edit(this, 'addLesson')\">".lang('edit')."</a><a class=\"btn btn-default\" href=\"".path().'lesson/delete/'.$lessonList[$i]['id']."\">".lang('delete')."</a></div></td>
							    </tr>";
						}
					?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
	<!-- Modal -->
	<div class="modal fade" id="addLessonModal" tabindex="-1" role="dialog" aria-labelledby="addLessonModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><?=lang('addLesson')?></h4>
				</div>
				<div class="modal-body">
					<form role="form" action="<?=path().'lesson/manage'?>" method="post" id="addLessonForm">
						<div class="form-group">
							<label for="name"><?=lang('nameRu')?></label>
							<input type="text" id="name" name="name" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="name_uz"><?=lang('nameUz')?></label>
							<input type="text" id="name_uz" name="name_uz" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="subject_id"><?=lang('subject')?></label>
							<?=getSelect('subject', false)?>
						</div>
						<div class="form-group">
							<label for="if _exam"><?=lang('exam')?></label>
							<select name="if_exam" id="if_exam" class="form-control">
								<option value="0"><?=lang('havent')?></option>
								<option value="1"><?=lang('have')?></option>
							</select>
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
					<button type="button" class="btn btn-primary" onclick="$('#addLessonForm').submit()"><?=lang('save')?></button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<?php
include('./system/layout/foot.php');