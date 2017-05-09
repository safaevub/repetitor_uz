<?php

function router() {
	global $config;
	$_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($config['panel_path']), strlen($_SERVER['REQUEST_URI']));
	if (strstr($_SERVER['REQUEST_URI'], '?') !== FALSE)
		list($uri, $query) = explode('?', $_SERVER['REQUEST_URI']);
	else 
		$uri = $_SERVER['REQUEST_URI'];
	return explode('/', $uri);
}

function is_authorized() {
	return (isset($_SESSION) && isset($_SESSION['user']));
}

function path() {
	global $config;
	return $config['panel_path'];
}

function photoPath() {
    global $config;
    return $config['photo_url'];
}

function doAuth($login, $password) {
	global $config;
	if ($config['login'] === $login && $config['password'] === doHash($password)) {
		$_SESSION['user'] = $login;
		return true;
	}
	return false;
}

function changeConfigs(array $conf) {
	foreach($conf as $k => $v) {
		changeConfig($k, $v);
	}
	return true;
}

function changeConfig($name, $value) {
	global $db;
	global $config;
	$stmt = $db->prepare('UPDATE `parameter` SET value = ? WHERE name = ?');
	$stmt->bind_param('ss', $value, $name);
	if (!$stmt->execute()) {
		die ($db->error);
	}
	$config[$name] = $value;
}

function doHash($plain) {
	global $config;
	return md5($config['salt'] . $plain . $config['salt']);
}

function navBar() {
	global $router;
	$navbar = array('main', 'tutors', 'teachings', 'pages', 'subjects', 'lessons', 'locations', 'regions');
	$links = array('', 'tutor', 'teaching', 'page', 'subject', 'lesson', 'location', 'region');
	$icons = array('dashboard', 'graduation-cap', 'bank', 'file', 'th-list', 'book', 'location-arrow', 'map-marker');
	$str = '';
	foreach ($navbar as $k => $v) {
		$str .= "<li".($icons[$k] == $router[0] ? ' class="active"':'')."><a href=\"".path().$links[$k]."\"><i class=\"fa fa-fw fa-".$icons[$k]."\"></i> ".lang($v).'</a></li>';
	}
	return $str;
}

function doSecure($array) {
    $p = array();
    foreach($array as $k => $v) {
        if (is_array($v)){
            $p[$k] = doSecure($v);
        } else {
			if ($v == '') {
				$v = null;
			}
			$p[htmlspecialchars($k)] = htmlspecialchars($v);
		}
    }
    return $p;
}

function lang($code) {
    global $config, $lang;
    return $lang[$config['lang']][$code];
}

function getSelect($table, $nullable = true, $isMultiple = false, $attr = "", $preId = "", $selected = null) {
    global $db;
    $orderBy = null;
    switch ($table) {
        case 'group':
        case 'subject':
        case 'lesson':
            $orderBy = 'order_by';
            break;
    }
    $list = $db->getShortList($table, $orderBy);
    $name = $id = "{$preId}{$table}_id";
	if ($isMultiple == true)
        $name .= "[]";
    $html = "<select name='$name' id='{$id}' class='form-control' " . ($isMultiple ? 'multiple="multiple"' : '') . " $attr>".($nullable ? '<option value=""></option>' : '');
    foreach ($list as $row) {
        $html .= "<option value='{$row['id']}'".(!is_null($selected) && (is_array($selected) && in_array($row['id'], $selected) || $selected == $row['id']) ? " selected='selected'":"").">{$row['name']}</option>";
    }
    $html .= "</select>";
    return $html;
}

function getStatus($status, $closedDate) {
	switch($status) {
		case 1:
			return "<span class='label label-danger'>".lang('orderStatus'.$status)."</span>";
			break;
		case 2:
			return "<span class='label label-primary'>".lang('orderStatus'.$status)."</span>";
			break;
		case 3:
			return "<span class='label label-success'>".lang('orderStatus'.$status)."</span> (".date('d.m.Y H:i', $closedDate).")";
			break;
	}
}