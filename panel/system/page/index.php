<?php
$app = 'page';
$path = 'Location: ' . path().'page';
if (isset($router[1]))
switch ($router[1]) {
    case 'manage':
        $db->savePage($_POST['id'], $_POST['name'], $_POST['name_uz'], $_POST['url'], $_POST['content'], $_POST['content_uz']);
        header($path);
        exit;
        break;
    case 'delete':
        $db->remove($app, intval($router[2]));
        header($path);
        exit;
        break;
    case 'edit':
        $page = null;
        if (isset($router[2])) {
            $page = $db->getById('page', $router[2]);
        }
        include('edit.php');
        break;
}
else
    include('view.php');
