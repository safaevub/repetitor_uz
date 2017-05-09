<?php
$title = 'Home';
include('./system/layout/head.php');
?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Home <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Home
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=$db->ordersCount(1)?></div>
                                        <div><?=lang('newOrders')?>!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=$db->ordersCount(2)?></div>
                                        <div><?=lang('workingOrders')?>!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=$db->ordersCount(3)?></div>
                                        <div><?=lang('closedOrders')?>!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Support Tickets!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>-->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left"><i class="fa fa-bar-chart-o fa-fw"></i> <?=lang('orders')?></h3>
                                <div class="pull-right">
                                    <a class="btn btn-default" href="#addOrderModal" data-toggle="modal"><?=lang('addNew')?></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th><?=lang('from')?></th>
                                                <th><?=lang('phone')?></th>
                                                <th><?=lang('email')?></th>
                                                <th><?=lang('comment')?></th>
                                                <th><?=lang('orderDate')?></th>
                                                <th><?=lang('orderStatus')?></th>
                                                <th><?=lang('systemComment')?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        require_once './system/Pagination.class.php';
                                        $page = isset($_GET['page']) ? ((int) $_GET['page']) : 1;
                                        $pagination = (new Pagination());
                                        $orderList = $db->getOrderList($page);
                                        for ($i = 0; $i < count($orderList); $i++) {
                                            $c = $i + 1;
                                            echo "<tr>
							<td>{$c}</td>
							<td data-form='name'>{$orderList[$i]['name']}</td>
							<td data-form='phone'>{$orderList[$i]['phone']}</td>
							<td data-form='email'>{$orderList[$i]['email']}</td>
							<td data-form='comment'>{$orderList[$i]['comment']}</td>
							<td data-form='order_date'>".date('d.m.Y H:i', $orderList[$i]['order_date'])."</td>
							<td data-form='status' data-val='{$orderList[$i]['order_status']}' data-valignore='true'>".getStatus($orderList[$i]['order_status'], $orderList[$i]['closed_date'])."</td>
							<td data-form='systemComment'>{$orderList[$i]['system_comment']}</td>
							<td data-form='tutor_id' data-val='[{$orderList[$i]['tutors']}]' class='hidden'></td>
							<td data-form='id' data-val='{$orderList[$i]['id']}' class='hidden'></td>
							<td><div class=\"btn-group\">
							<a class=\"btn btn-default\" href=\"#viewOrderModal\" data-toggle=\"modal\" onclick=\"view(this, 'viewOrder')\">".lang('view')."</a>
							<a class=\"btn btn-default\" href=\"#addOrderModal\" data-toggle=\"modal\" onclick=\"edit(this, 'addOrder')\">".lang('edit')."</a>
							<a class=\"btn btn-default\" href=\"".path().'main/delete/'.$orderList[$i]['id']."\">".lang('delete')."</a>
							</div></td></tr>";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 ce">
                                    <?php
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

    <!-- Modal -->
    <div class="modal fade" id="viewOrderModal" tabindex="-1" role="dialog" aria-labelledby="viewOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?=lang('viewOrder')?></h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?=path().$app.'/manage'?>" method="post" id="viewOrderForm">
                    <dl class="dl-horizontal">
                        <dt><?=lang('from')?></dt>
                        <dd id="name_view"></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?=lang('phone')?></dt>
                        <dd id="phone_view"></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?=lang('email')?></dt>
                        <dd id="email_view"></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?=lang('tutors')?></dt>
                        <dd id="tutor_id_view"></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?=lang('comment')?></dt>
                        <dd id="comment_view"></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?=lang('orderDate')?></dt>
                        <dd id="order_date_view"></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?=lang('orderStatus')?></dt>
                        <dd id="status_view"></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?=lang('systemComment')?></dt>
                        <dd id="systemComment_view"></dd>
                    </dl>
                    <input type="hidden" name="id" id="id" value=""/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></button>
                    <!--<button type="button" class="btn btn-primary" onclick="$('#addOrderForm').submit()"><?/*=lang('save')*/?></button>-->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal -->
    <div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?=lang('editOrder')?></h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?=path().$app.'/manage'?>" method="post" id="addOrderForm">
                        <div class="form-group">
                            <label for="name"><?=lang('from')?></label>
                            <input type="text" id="name" name="name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="phone"><?=lang('phone')?></label>
                            <input type="text" id="phone" name="phone" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><?=lang('email')?></label>
                            <input type="text" id="email" name="email" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="tutor"><?=lang('tutors')?></label>
                            <?=getSelect('tutor', false, true)?>
                        </div>
                        <div class="form-group">
                            <label for="comment"><?=lang('comment')?></label>
                            <textarea id="comment" name="comment" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="order_date"><?=lang('orderDate')?></label>
                            <input type="text" id="order_date" name="order_date" disabled="disabled" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="status"><?=lang('orderStatus')?></label>
                            <select name="status" id="status" class="form-control">
                                <option value="1"><?=lang('orderStatus1')?></option>
                                <option value="2"><?=lang('orderStatus2')?></option>
                                <option value="3"><?=lang('orderStatus3')?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="systemComment"><?=lang('systemComment')?></label>
                            <textarea id="systemComment" name="system_comment" class="form-control"></textarea>
                        </div>
                        <input type="hidden" name="id" id="id" value=""/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></button>
                    <button type="button" class="btn btn-primary" onclick="$('#addOrderForm').submit()"><?=lang('save')?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php
include('./system/layout/foot.php');