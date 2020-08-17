<?php
include_once($_SERVER["DOCUMENT_ROOT"].'/common.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
include_once(G5_PATH."/_head.php");

$mvc_name = "ex_om";

require_once "{$_SERVER["DOCUMENT_ROOT"]}/models/{$mvc_name}/model.php";
$omvc = new OMVC();
$omvc->db();
$omvc_rst = $omvc->omvc;

require_once "{$_SERVER["DOCUMENT_ROOT"]}/views/{$mvc_name}/view.php";

include(G5_THEME_PATH.'/tail.php');
?>
