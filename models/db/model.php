<?php
/**
 * DB Function
 * @author OMNIUS
 * @copyright 2020 OMNIUS
 */
class Dbf
{
  public $dbl = []; // select row

  function dbl($table, $filter = 0)
  {
    $sql = " select * from g5_write_{$table} ";
    if ($filter !== 0) {
      $sql .= "where {$filter} ";
    }
    $query = sql_query($sql);
    while ($row = sql_fetch_array($query)) {
      $row_arr[] = $row;
    }
    $this->dbl = $row_arr;

  }
}

?>
