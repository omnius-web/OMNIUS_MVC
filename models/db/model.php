<?php
/**
 * DB Function
 * @author OMNIUS
 * @copyright 2020 OMNIUS
 */
class Dbf
{
  private $dbcon; // PDO DB정보
  public $dbl = []; // select row

  private function dbcon()
  {
    $this->dbcon = new PDO('mysql:host=localhost;dbname=DBNAME', 'root', 'PASSWORD');
  }

  public function dbl($table, $filter = 0) // 그누보드5 DB LIST
  {
    $sql = " select * from {$table} ";
    if ($filter !== 0) {
      $sql .= "where {$filter} ";
    }
    $query = sql_query($sql);
    while ($row = sql_fetch_array($query)) {
      $row_arr[] = $row;
    }
    $this->dbl = $row_arr;
  }

  public function db_pdo_list($table, $data_arr) // 일반 PDO형식 DB INSERT
  {
    $this->dbcon();
    $connect = $this->dbcon;
    $sql = "INSERT INTO {$table} ";
    foreach ($data_arr as $key => $value) {
    	$sql_field .= "{$key},";
    	if (gettype($value) == "string") {
    		$sql_value .= "'{$value}',";
    	}
    	if (gettype($value) == "integer") {
    	  $sql_value .= "{$value},";
    	}
    }
    $sql_field .= "wr_5";
    $sql_value .= "now()";
    $sql .= "({$sql_field}) VALUE ({$sql_value})";
    $sql = $connect->prepare($sql);

    if ($sql->execute()) {
      print "<script>alert('등록되었습니다.'); window.location.replace('adm.php');</script>";
    } else {
      print "<script>alert('입력오류.'); window.location.replace('adm.php');</script>";
    }
  }
}

?>
