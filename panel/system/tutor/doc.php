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
                        <i class="fa fa-file"></i> <?=lang('editDocs')?>
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
                            <a class="btn btn-default" href="#addDocModal" data-toggle="modal"><?=lang('addNew')?></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?=lang('nameEng')?></th>
                                    <th><?=lang('nameRu')?></th>
                                    <th><?=lang('photo')?></th>
                                    <th></th>
                                <tr>
                                </thead>
                                <tbody>
                                <?php
                                $tutorDoc = $db->getTutorDocs($tutor['id']);
                                for ($i = 0; $i < count($tutorDoc); $i++) {
                                    $c = $i + 1;
                                    echo "<tr>
                                    <td>{$c}</td>
                                    <td data-form='name'>{$tutorDoc[$i]['name']}</td>
                                    <td data-form='name_uz'>{$tutorDoc[$i]['name_uz']}</td>
                                    <td data-form='image'>".(empty($tutorDoc[$i]['doc']) ? "<i class='fa fa-graduation-cap'></i>" : '<img class="img-responsive" src="'.photoPath().$tutorDoc[$i]['doc'].'" width="140" height="140"/>')."</td>
                                    <td data-form='image' data-val='{$tutorDoc[$i]['doc']}' class='hidden'></td>
                                    <td data-form='id' data-val='{$tutorDoc[$i]['id']}' class='hidden'></td>
                                    <td><div class=\"btn-group\">
                                    <a class=\"btn btn-default\" href=\"#addDocModal\" data-toggle=\"modal\" onclick=\"edit(this, 'addDoc')\">".lang('edit')."</a>
                                    <a class=\"btn btn-default\" href=\"".path().'tutor/docDelete/'.$tutorDoc[$i]['id']."\">".lang('delete')."</a>
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
    <div class="modal fade" id="addDocModal" tabindex="-1" role="dialog" aria-labelledby="addDocModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?=lang('addDoc')?></h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?=path().'tutor/docManage'?>" method="post" id="addDocForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name"><?=lang('nameRu')?></label>
                            <input type="text" id="name" name="name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="name_uz"><?=lang('nameUz')?></label>
                            <input type="text" id="name_uz" name="name_uz" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="doc"><?=lang('doc')?></label>
                            <img src=" data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAH8AAAB/CAMAAADxY+0hAAAAY1BMVEX///8AAABWVlZbW1uZmZkpKSnc3Ny0tLTAwMBkZGS5ubkWFhbS0tKrq6s1NTWjo6OSkpLx8fH5+flvb2/Ly8svLy+Kiop9fX3k5OQiIiI8PDzq6uocHBxMTEwQEBCEhIRDQ0POH67iAAABxklEQVRoge3b63KCMBAF4AQBQUAuonLX93/Kjp1WQzuEBDap1nP+h++4zKCjLmOjtEmSum6WZZfT5fyVwz2hckq2KK3DibJd5G+oeM7TJS+fjuc80fcrSn/BLaD19Sfg0/raE6D2dQuQ+zxY5l/LYGHSYeQPWgXi72OOVu3RJaIVEzDhRxoFTPg8Un8vKKl8LxQbKBcg85u2F/w6tu3vWS4WGBQLEPqsbYQCnq90OCD0WSUWOCoVIPXHBerKus/8vVCgaa37zD+KBeYnQO0zvxYKXHPrPos7oYAzV4DeZ7HOBAz4rBQnEMoLmPBZKX4iCAvr/uOpestBVsCM/7jsLRf7PgvEW3C24RfjuOIEdub9wXmk76+N+CDm7uThHZUvDXyT/iCjzfv+/niLV38m6rrffYz6LJ9IcbbjT+YEH/4b+xl8+M/tb+HDh/8/fRc+fPjw4cN/Qz+FDx8+fPjw4Vv3E/jw4cOH/6y+0d8f4L+3v4UP/7l9gv+fwYf/sj7B/gH8FT7B/g+N31c+dSqF7x/u+2eDR59u3ifef5zItE+6f/qCfv7HflHPn14fyWYy2fq1LJJVrKCbP7420sXs0tmYjfOD/wDEkDD0nSFBcgAAAABJRU5ErkJggg==" class="img-responsive"><input type="file" id="doc" name="doc" class="form-control"/>
                        </div>
                        <input type="hidden" name="image" id="image" value="">
                        <input type="hidden" name="tutor_id" value="<?=$tutor['id']?>">
                        <input type="hidden" name="id" id="id" value=""/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></button>
                    <button type="button" class="btn btn-primary" onclick="$('#addDocForm').submit()"><?=lang('save')?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?
include('./system/layout/foot.php');