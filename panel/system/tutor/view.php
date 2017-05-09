<?php
$title = lang('tutors');
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
                                <i class="fa fa-graduation-cap"></i> <?=$title?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="">
					<a class="btn btn-default pull-right" href="<?=path().'tutor/edit/'.$tutorList[$i]['id']?>"><?=lang('addNew')?></a>
				</div>
				<div class="row">
                    <div class="col-lg-12">
					<table class="table">
						<thead>
							<tr>
							<th>#</th>
                                <th><?=lang('photo')?></th>
                                <th><?=lang('name')?></th>
                                <th><?=lang('phone')?></th>
                                <th><?=lang('location')?></th>
                                <th><?=lang('living_addr')?></th>
                                <th></th>
							<tr>
						</thead>
						<tbody>
					<?php
                    require_once './system/Pagination.class.php';
                    $page = isset($_GET['page']) ? ((int) $_GET['page']) : 1;
                    $pagination = (new Pagination());
                    $tutorList = $db->getTutorList($page);
						for ($i = 0; $i < count($tutorList); $i++) {
							$c = $i + 1;
							echo "<tr>
							<td>{$c}</td>
							<td data-form='image'>".(empty($tutorList[$i]['image']) ? "<i class='fa fa-graduation-cap'></i>" : '<img class="img-responsive" src="'.photoPath().$tutorList[$i]['image'].'" width="140" height="140"/>')."</td>
							<td data-form='name'>{$tutorList[$i]['name']}</td>
							<td data-form='phone'>{$tutorList[$i]['phone']}</td>
							<td data-form='location_id' data-val='{$tutorList[$i]['location_id']}'>{$tutorList[$i]['location_name']}</td>
							<td data-form='living_addr'>{$tutorList[$i]['living_addr']}</td>
							<!--<td data-form='serving_dist'>{$tutorList[$i]['serving_dist']}</td>-->
							<td><div class=\"btn-group\">
							<a class=\"btn btn-default\" href=\"".path().'tutor/edit/'.$tutorList[$i]['id']."\">".lang('edit')."</a>
							<a class=\"btn btn-default\" href=\"".path().'tutor/doc/'.$tutorList[$i]['id']."\">".lang('docs')."</a>
							<a class=\"btn btn-default\" href=\"".path().'tutor/review/'.$tutorList[$i]['id']."\">".lang('reviews')."</a>
							<a class=\"btn btn-default\" href=\"".path().'teaching/tutor'.$tutorList[$i]['id']."\">".lang('teachings')."</a>
							<a class=\"btn btn-default\" href=\"".path().'tutor/delete/'.$tutorList[$i]['id']."\">".lang('delete')."</a>
							</div></td></tr>";
						}
					?>
						</tbody>
					</table>
					</div>
                    <div class="col-lg-12 ce">
                        <?
                        $pagination->setCurrent($page);
                        $pagination->setRPP($config['per_page']);
                        $pagination->setPrevious(lang('prev'));
                        $pagination->setNext(lang('next'));
                        $pagination->setTotal($db->getTutorCount());

                        // grab rendered/parsed pagination markup
                        $markup = $pagination->parse();
                        echo $markup;
                        ?>
                    </div>
				</div>
			</div>
<?php
include('./system/layout/foot.php');