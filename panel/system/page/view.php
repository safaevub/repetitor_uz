<?php
$title = lang('pages');
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
                                <i class="fa fa-file"></i> <?=$title?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="">
					<a class="btn btn-default pull-right" href="<?=path().$app.'/edit'?>"><?=lang('addNew')?></a>
				</div>
				<div class="row">
                    <div class="col-lg-12">
					<table class="table">
						<thead>
							<tr>
							<th>#</th>
							<th><?=lang('nameCom')?></th>
							<th><?=lang('nameRu')?></th>
							<th><?=lang('url')?></th>
							<th></th>
							<tr>
						</thead>
						<tbody>
					<?php

						$pageList = $db->getPageList();
						for ($i = 0; $i < count($pageList); $i++) {
							$c = $i + 1;
							echo "<tr data-id='{$pageList[$i]['id']}'>
							    <td>{$c}</td>
							    <td>{$pageList[$i]['name']}</td>
							    <td>{$pageList[$i]['name_uz']}</td>
							    <td>{$pageList[$i]['url']}</td>
							    <td><div class=\"btn-group\"><a class=\"btn btn-default\" href=\"".path().$app.'/edit/'.$pageList[$i]['id']."\">".lang('edit')."</a><a class=\"btn btn-default\" href=\"".path().$app.'/delete/'.$pageList[$i]['id']."\">".lang('delete')."</a></div></td>
							    </tr>";
						}
					?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
<?
include('./system/layout/foot.php');