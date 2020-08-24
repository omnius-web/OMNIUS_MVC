<?php
require_once "{$_SERVER["DOCUMENT_ROOT"]}/models/db/model.php";
$omvc = new Dbf();

$arr['wr_1'] = "test2";
$arr['wr_2'] = "012-1234-1234";
$arr['wr_3'] = 2212345;
$arr['wr_4'] = 2267890;
(int)$rst = $omvc->db_pdo_in('as_list', $arr);
var_dump($rst);

$sql = "wr_1 = :wr_1 and wr_indate = :wr_indate";
$sql_pr = array(
  'wr_1' => "test2",
  'wr_indate' => 1234556
);
$rst = $omvc->db_pdo_list('as_list', $sql, $sql_pr);
var_dump($rst);
?>
