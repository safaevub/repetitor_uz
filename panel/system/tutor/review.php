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
                <li>
                    <i class="fa fa-file"></i> <?=$title?>
                </li>
                <li>
                    <i class="fa fa-graduation-cap"></i> <?=(isset($tutor['name']) ? $tutor['name'] : '')?>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> <?=lang('editReviews')?>
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left"><?=(isset($tutor['name']) ? $tutor['name'] : '')?></h4>
                    <div class="pull-right">
                        <a class="btn btn-default" href="#addReviewModal" data-toggle="modal"><?=lang('addNew')?></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?=lang('tutor')?></th>
                                <th><?=lang('contentEng')?></th>
                                <th><?=lang('contentRu')?></th>
                                <th><?=lang('reviewer')?></th>
                                <th><?=lang('mark')?></th>
                                <th></th>
                            <tr>
                            </thead>
                            <tbody>
                            <?php
                            $tutorReviews = $db->getTutorReviews($tutor['id']);
                            for ($i = 0; $i < count($tutorReviews); $i++) {
                                $c = $i + 1;
                                echo "<tr>
                                    <td>{$c}</td>
                                    <td>{$tutorReviews[$i]['tutor']}</td>
                                    <td data-form='review'>{$tutorReviews[$i]['review']}</td>
                                    <td data-form='review_uz'>{$tutorReviews[$i]['review_uz']}</td>
                                    <td data-form='reviewer'>{$tutorReviews[$i]['reviewer']}</td>
                                    <td data-form='mark'>{$tutorReviews[$i]['mark']}</td>
                                    <td data-form='tutor_id' data-val='{$tutorReviews[$i]['tutor_id']}' class='hidden'></td>
                                    <td data-form='id' data-val='{$tutorReviews[$i]['id']}' class='hidden'></td>
                                    <td><div class=\"btn-group\">
                                    <a class=\"btn btn-default\" href=\"#addReviewModal\" data-toggle=\"modal\" onclick=\"edit(this, 'addReview')\">".lang('edit')."</a>
                                    <a class=\"btn btn-default\" href=\"".path().'tutor/reviewDelete/'.$tutorReview[$i]['id']."\">".lang('delete')."</a>
							        </div></td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?=lang('editReviews')?></h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?=path().'tutor/reviewManage'?>" method="post" id="addReviewForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="tutor_id"><?=lang('tutor')?></label>
                            <?=getSelect('tutor', false, false, "", "", $tutor['id'])?>
                        </div>
                        <div class="form-group">
                            <label for="reviewer"><?=lang('reviewer')?></label>
                            <input type="text" id="reviewer" name="reviewer" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="review"><?=lang('contentRu')?></label>
                            <input type="text" id="review" name="review" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="review_uz"><?=lang('contentUz')?></label>
                            <input type="text" id="review_uz" name="review_uz" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="mark"><?=lang('mark')?></label>
                            <select class="form-control" name="mark" id="mark">
                                <option value="10">+5</option>
                                <option value="9">5</option>
                                <option value="8">-5</option>
                                <option value="7">+4</option>
                                <option value="6">4</option>
                                <option value="5">-4</option>
                                <option value="4">+3</option>
                                <option value="3">3</option>
                                <option value="2">-3</option>
                                <option value="1">2</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" id="id" value=""/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></button>
                    <button type="button" class="btn btn-primary" onclick="$('#addReviewForm').submit()"><?=lang('save')?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?
include('./system/layout/foot.php');