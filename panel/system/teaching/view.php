<?php
$title = lang('teachings');
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
								<i class="fa fa-bank"></i> <?=$title?>
							</li><?
							if (!empty($obj)) {
								echo "<li><i class='fa fa-graduation-cap'></i> {$obj['name']}</li>";
							}
							?>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="">
					<a class="btn btn-default pull-right" href="#addTeachingModal" data-toggle="modal"><?=lang('addNew')?></a>
				</div>
				<div class="row">
                    <div class="col-lg-12">
					<table class="table">
						<thead>
							<tr>
							<th>#</th>
							<th><?=lang('subject')?></th>
							<th><?=lang('lesson')?></th>
							<th><?=lang('tutor')?></th>
							<th><?=lang('experience')?></th>
							<th><?=lang('price')?></th>
							<th><?=lang('price_group')?></th>
							<th><?=lang('lesson_duration')?></th>
							<th></th>
							<tr>
						</thead>
						<tbody>
					<?php

						$teachingList = $db->getTeachingList($tutor);
						for ($i = 0; $i < count($teachingList); $i++) {
							$c = $i + 1;
							echo "<tr data-id='{$teachingList[$i]['id']}'>
							    <td>{$c}</td>
							    <td data-form='subject_id' data-val='{$teachingList[$i]['subject_id']}'>{$teachingList[$i]['subject_name']}</td>
							    <td data-form='lesson_id' data-val='{$teachingList[$i]['lesson_id']}'>{$teachingList[$i]['lesson_name']}</td>
							    <td data-form='tutor_id' data-val='{$teachingList[$i]['tutor_id']}'>{$teachingList[$i]['tutor_name']}</td>
							    <td data-form='experience_id' data-val='{$teachingList[$i]['experience']}'>{$teachingList[$i]['experience_name']}</td>
							    <td data-form='price'>{$teachingList[$i]['price']}</td>
							    <td data-form='price_group_id' data-val='{$teachingList[$i]['price_group']}'>{$teachingList[$i]['price_group_name']}</td>
							    <td data-form='lesson_duration'>{$teachingList[$i]['lesson_duration']}</td>
							    <td><div class=\"btn-group\"><a class=\"btn btn-default\" href=\"#addTeachingModal\" data-toggle=\"modal\" onclick=\"edit(this, 'addTeaching')\">".lang('edit')."</a><a class=\"btn btn-default\" href=\"".path().$app.'/delete/'.$teachingList[$i]['id'].(($tutor != null) ? '/tutor'.$tutor : '')."\">".lang('delete')."</a></div></td>
							    </tr>";
						}
					?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
	<!-- Modal -->
	<div class="modal fade" id="addTeachingModal" tabindex="-1" role="dialog" aria-labelledby="addTeachingModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><?=lang('addTeaching')?></h4>
				</div>
				<div class="modal-body">
					<form role="form" action="<?=path().$app.'/manage'.(($tutor != null) ? '/tutor'.$tutor : '')?>" method="post" id="addTeachingForm">
                        <div class="form-group">
                            <label for="subject_id"><?=lang('subject')?></label>
                            <?=getSelect('subject', false)?>
                        </div>
                        <div class="form-group">
                            <label for="lesson_id"><?=lang('lesson')?></label>
                            <?=getSelect('lesson', true)?>
                        </div>
                        <div class="form-group">
                            <label for="tutor_id"><?=lang('tutor')?></label>
                            <?=getSelect('tutor', false, false, "", "", $tutor)?>
                        </div>
						<div class="form-group">
							<label for="name"><?=lang('experience')?></label>
							<?=getSelect('experience', false)?>
						</div>
						<div class="form-group">
							<label for="name_uz"><?=lang('price')?></label>
							<input type="text" id="price" name="price" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="price_group"><?=lang('price_group')?></label>
							<?=getSelect('price_group', false)?>
						</div>
						<div class="form-group">
							<label for="lesson_duration"><?=lang('lesson_duration')?></label>
							<input type="text" id="lesson_duration" name="lesson_duration" class="form-control"/>
						</div>
						<input type="hidden" name="id" id="id" value=""/>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></button>
					<button type="button" class="btn btn-primary" onclick="$('#addTeachingForm').submit()"><?=lang('save')?></button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<?php

$lessons = $db->query("SELECT `lesson`.`id` as `lesson_id`, `lesson`.`name` as `lesson_name`, `subject`.`id`, `subject`.`name` FROM `subject` JOIN `lesson` ON `lesson`.`subject_id` = `subject`.`id`");
$data = array();
while($row = $lessons->fetch_assoc()) {
	if (isset($data[$row['id']])) {
		$data[$row['id']][] = array('id' => $row['lesson_id'], 'text' => $row['lesson_name']);
	} else {
		$data[$row['id']] = array();
		$data[$row['id']][] = array('id' => $row['lesson_id'], 'text' => $row['lesson_name']);
	}
}

?>

<script>
	function ready(){
		var data = JSON.parse('<?=json_encode($data)?>');
		$('#subject_id').on('change', function(){
			var select = document.getElementById('lesson_id');
			if (typeof select.options !== 'undefined') {
				var length = select.options.length;
				for (var i = 0; i < length; i++) {
					select.options[0] = null;
				}
				var opts = data[$(this).val()];
				if (typeof opts !== 'undefined')
				for (var i = 0; i < opts.length; i++) {
					select.add(new Option(opts[i].text, opts[i].id));
				}
			}
		});

		$('#addTeachingModal').on('shown.bs.modal', function() {
			$("#subject_id").change();
		})
	};
	document.addEventListener("DOMContentLoaded", ready);
</script>
<?php
include('./system/layout/foot.php');