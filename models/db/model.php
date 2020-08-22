<?php
/**
 * DB Function
 * GNU , PDO USE
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

  public function db_pdo_in($table, $data_arr) // 일반 PDO형식 DB INSERT
  {
    $this->dbcon();
    $connect = $this->dbcon;
    $sql = "INSERT INTO {$table} ";
    foreach ($data_arr as $key => $value) {
      $sql_field .= "{$key},";
      $sql_value .= ":{$key},";
    }
    $sql_field .= "wr_indate";
    $sql_value .= time();
    $sql .= "({$sql_field}) VALUE ({$sql_value})";
    $sql = $connect->prepare($sql);
    foreach ($data_arr as $key => $value) {
      if (gettype($value) == "string") {
        $sql->bindValue(":{$key}", $value, PDO::PARAM_STR);
      }
      if (gettype($value) == "integer") {
        $sql->bindValue(":{$key}", $value, PDO::PARAM_INT);
      }
    }
    if ($sql->execute()) {
      return 1;
    } else {
      return 0;
    }
  }

}

?>
