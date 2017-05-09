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
                    <li>
                        <i class="fa fa-file"></i> <?=$title?>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> <?=lang('addNew')?>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <form role="form" action="<?=path().$app.'/manage'?>" method="post">
                        <div class="panel-body">
                                <div class="form-group">
                                    <label for="name"><?=lang('nameRu')?></label>
                                    <input type="text" id="name" name="name" class="form-control" value="<?=(isset($page['name']) ? $page['name'] : '')?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="name_uz"><?=lang('nameUz')?></label>
                                    <input type="text" id="name_uz" name="name_uz" class="form-control" value="<?=(isset($page['name_uz']) ? $page['name_uz'] : '')?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="url"><?=lang('url')?></label>
                                    <input type="text" id="url" name="url" class="form-control" value="<?=(isset($page['url']) ? $page['url'] : '')?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="content"><?=lang('contentRu')?></label>
                                    <textarea class="form-control" name="content" id="content"><?=(isset($page['content']) ? $page['content'] : '')?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content_uz"><?=lang('contentUz')?></label>
                                    <textarea class="form-control" name="content_uz" id="content_uz"><?=(isset($page['content_uz']) ? $page['content_uz'] : '')?></textarea>
                                </div>
                                <input type="hidden" name="id" id="id" value="<?=(isset($page['id']) ? $page['id'] : '')?>"/>
                        </div>
                        <div class="panel-footer">
                                <a class="btn btn-default" href="<?=path().$app?>"><?=lang('back')?></a>
                                <button type="submit" class="btn btn-primary"><?=lang('save')?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=path().'/assets/js/tinymce.min.js'?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            tinymce.init({
                selector: 'textarea',
                height: 500,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                content_css: [
                    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                    '//www.tinymce.com/css/codepen.min.css'
                ]
            });
        });
    </script>
<?
include('./system/layout/foot.php');