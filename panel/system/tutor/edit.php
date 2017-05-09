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
                    <li class="active">
                        <i class="fa fa-file"></i> <?=lang('addNew')?>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <form role="form" action="<?=path().$app.'/manage'?>" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="photo"><?=lang('photo')?></label>
                                        <img src="<?=(isset($tutor['image']) ? photoPath().$tutor['image'].'" width="140" height="140"' : "data:image/png;base64,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\"")?> class="img-responsive"><input type="file" id="photo" name="photo" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name"><?=lang('name')?></label>
                                        <input type="text" id="name" name="name" value="<?=(isset($tutor['name']) ? $tutor['name'] : '')?>" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name_uz"><?=lang('gender')?></label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="MALE"<?=(isset($tutor['gender']) && $tutor['gender'] == 'MALE' ? ' selected="selected"' : '')?>><?=lang('male')?></option>
                                            <option value="FEMALE"<?=(isset($tutor['gender']) && $tutor['gender'] == 'FEMALE' ? ' selected="selected"' : '')?>><?=lang('female')?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"><?=lang('phone')?></label>
                                        <input type="text" id="phone" name="phone" value="<?=(isset($tutor['phone']) ? $tutor['phone'] : '')?>" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><?=lang('email')?></label>
                                        <input type="email" id="email" name="email" value="<?=(isset($tutor['email']) ? $tutor['email'] : '')?>" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="rating"><?=lang('rating')?></label>
                                        <select class="form-control" name="rating" id="rating">
                                            <option value="+5"<?=(isset($tutor['rating']) && $tutor['rating'] == '+5' ? ' selected="selected"' : '')?>>+5</option>
                                            <option value="5"<?=(isset($tutor['rating']) && $tutor['rating'] == '5' ? ' selected="selected"' : '')?>>5</option>
                                            <option value="-5"<?=(isset($tutor['rating']) && $tutor['rating'] == '-5' ? ' selected="selected"' : '')?>>-5</option>
                                            <option value="+4"<?=(isset($tutor['rating']) && $tutor['rating'] == '+4' ? ' selected="selected"' : '')?>>+4</option>
                                            <option value="4"<?=(isset($tutor['rating']) && $tutor['rating'] == '4' ? ' selected="selected"' : '')?>>4</option>
                                            <option value="-4"<?=(isset($tutor['rating']) && $tutor['rating'] == '-4' ? ' selected="selected"' : '')?>>-4</option>
                                            <option value="+3"<?=(isset($tutor['rating']) && $tutor['rating'] == '+3' ? ' selected="selected"' : '')?>>+3</option>
                                            <option value="3"<?=(isset($tutor['rating']) && $tutor['rating'] == '3' ? ' selected="selected"' : '')?>>3</option>
                                            <option value="-3"<?=(isset($tutor['rating']) && $tutor['rating'] == '-3' ? ' selected="selected"' : '')?>>-3</option>
                                            <option value="2"<?=(isset($tutor['rating']) && $tutor['rating'] == '2' ? ' selected="selected"' : '')?>>2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="dob"><?=lang('dob')?></label>
                                        <input id="dob" name="dob" value="<?=(isset($tutor['dob']) ? $tutor['dob'] : '')?>" class="form-control date" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="location_id"><?=lang('location')?></label>
                                        <?=getSelect('location', false, false, null, null, $tutor['location_id'])?>
                                    </div>
                                    <div class="form-group">
                                        <label for="living_region_id"><?=lang('region')?></label>
                                        <?=getSelect('region', false, false, "", 'living_', $tutor['living_region_id'])?>
                                    </div>
                                    <div class="form-group">
                                        <label for="living_addr"><?=lang('living_addr')?></label>
                                        <input type="text" id="living_addr" name="living_addr" value="<?=(isset($tutor['living_addr']) ? $tutor['living_addr'] : '')?>" class="form-control"/>
                                    </div><!--
                                <div class="form-group">
                                    <label for="serving_dist"><?/*=lang('serving_dist')*/?></label>
                                    <input type="text" id="serving_dist" name="serving_dist" class="form-control"/>
                                </div>-->
                                    <div class="form-group">
                                        <label for="education_id"><?=lang('edu_level')?></label>
                                        <?=getSelect('education', false, false, "", "", $tutor['edu_level'])?>
                                    </div>
                                    <div class="form-group">
                                        <label for="to_home"><?=lang('to_home')?></label>
                                        <select class="form-control" name="to_home" id="to_home">
                                            <option value="HOME"<?=(isset($tutor['to_home']) && $tutor['to_home'] == 'HOME' ? ' selected="selected"' : '')?>><?=lang('home')?></option>
                                            <option value="AWAY"<?=(isset($tutor['to_home']) && $tutor['to_home'] == 'AWAY' ? ' selected="selected"' : '')?>><?=lang('away')?></option>
                                            <option value="BOTH"<?=(isset($tutor['to_home']) && $tutor['to_home'] == 'BOTH' ? ' selected="selected"' : '')?>><?=lang('both')?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="teach_lang"><?=lang('teach_lang')?></label>
                                        <select class="form-control" name="teach_lang" id="teach_lang">
                                            <option value="UZ"<?=(isset($tutor['teach_lang']) && $tutor['teach_lang'] == 'UZ' ? ' selected="selected"' : '')?>><?=lang('uz')?></option>
                                            <option value="RU"<?=(isset($tutor['teach_lang']) && $tutor['teach_lang'] == 'RU' ? ' selected="selected"' : '')?>><?=lang('ru')?></option>
                                            <option value="BOTH"<?=(isset($tutor['teach_lang']) && $tutor['teach_lang'] == 'BOTH' ? ' selected="selected"' : '')?>><?=lang('ru_uz')?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="regionIds"><?=lang('regions')?></label>
                                        <?=getSelect('region', false, true, "", "", (isset($tutor) ? $db->getTutorRegion($tutor['id']) : null))?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="edu"><?=lang('edu_level')?></label>
                                        <textarea name="edu" id="edu" class="form-control"><?=$tutor['edu']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="exp"><?=lang('experience')?></label>
                                        <textarea name="exp" id="exp" class="form-control"><?=$tutor['exp']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fact"><?=lang('facts')?></label>
                                        <textarea name="fact" id="fact" class="form-control"><?=$tutor['fact']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="info"><?=lang('additionalInfo')?></label>
                                        <textarea name="info" id="info" class="form-control"><?=$tutor['info']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="edu_uz"><?=lang('edu_level_uz')?></label>
                                        <textarea name="edu_uz" id="edu_uz" class="form-control"><?=$tutor['edu_uz']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="exp_uz"><?=lang('experience_uz')?></label>
                                        <textarea name="exp_uz" id="exp_uz" class="form-control"><?=$tutor['exp_uz']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fact_uz"><?=lang('facts_uz')?></label>
                                        <textarea name="fact_uz" id="fact" class="form-control"><?=$tutor['fact_uz']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="info_uz"><?=lang('additionalInfo_uz')?></label>
                                        <textarea name="info_uz" id="info_uz" class="form-control"><?=$tutor['info_uz']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" value="<?=$tutor['id']?>"/>
                            <input type="hidden" name="image" id="image" value="<?=$tutor['image']?>"/>
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

<?php
$regions = $db->query("SELECT `region`.`id` as `region_id`, `region`.`name` as `region_name`, `location`.`id`, `location`.`name` FROM `location` JOIN `region` ON `region`.`location_id` = `location`.`id`");
$data = array();
while($row = $regions->fetch_assoc()) {
    if (isset($data[$row['id']])) {
        $data[$row['id']][] = array('id' => $row['region_id'], 'text' => $row['region_name']);
    } else {
        $data[$row['id']] = array();
        $data[$row['id']][] = array('id' => $row['region_id'], 'text' => $row['region_name']);
    }
}
?>
    <script>
        function ready(){
            var data = JSON.parse('<?=json_encode($data)?>');
            $('#location_id').on('change', function(){
                var serving_region = document.getElementById('region_id');
                var serving_region_val = $("#region_id").val();
                var living_region = document.getElementById('living_region_id');
                var living_region_val = $("#living_region_id").val();
                var length = serving_region.options.length;
                for (var i = 0; i < length; i++) {
                    serving_region.options[0] = null;
                    living_region.options[0] = null;
                }
                var opts = data[$(this).val()];
                for (var i = 0; i < opts.length; i++) {
                    serving_region.add(new Option(opts[i].text, opts[i].id));
                    living_region.add(new Option(opts[i].text, opts[i].id));
                }
                $("#region_id").val(serving_region_val);
                $("#living_region_id").val(living_region_val);
            });

            /*        $('#addTutorModal').on('shown.bs.modal', function() {
             $("#location_id").change();
             })*/
            $("#location_id").change();
        };
        document.addEventListener("DOMContentLoaded", ready);
    </script>
<?
include('./system/layout/foot.php');