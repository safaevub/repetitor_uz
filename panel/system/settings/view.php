<?php
$title = 'Home';
include('./system/layout/head.php');
?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Setting <small>Editing a setting</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Home
                            </li>
                            <li class="active">
                                <i class="fa fa-gear"></i> Setting
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<?php 
							if (isset($profile_changed)) {
						?>
						<div class="alert alert-success alert-dismissable">
							Settings successfully updated
						</div>
						<?php } ?>
						<form role="form" method="post" action="">
							<div class="form-group">
                                <label>Profile name:</label>
                                <input class="form-control" type="text" name="_nm_" value="<?=(isset($config['name'])?$config['name']:'')?>">
                            </div>
							<div class="form-group">
                                <label>Login:</label>
                                <input class="form-control" type="text" name="_lgn_" value="<?=$config['login']?>">
                            </div>

                            <div class="form-group">
                                <label>Old passsword:</label>
                                <input class="form-control" type="password" name="_pwd0_">
                            </div>

                            <div class="form-group">
                                <label>New password:</label>
                                <input class="form-control" type="password" name="_pwd1_">
                            </div>
							
                            <div class="form-group">
                                <label>Confirm password:</label>
                                <input class="form-control" type="password" name="_pwd2_">
                            </div>
							<?php 
								if (isset($profile_error))
								foreach($profile_error as $k => $v) {
									echo '
                                <p class="help-block">'.$v.'</p>';
								}
							?>
                            <div class="form-group pull-right">
								<button type="submit" class="btn btn-default">Save</button>
							</div>
						</form>
					</div>
				</div>
<?php
include('./system/layout/foot.php');