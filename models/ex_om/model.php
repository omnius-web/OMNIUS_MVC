<?php
/**
 *
 */
class OMVC
{
  public $omvc = [];
  function db() {
    $sql = " select * from g5_write_product where wr_id = 2control. ";
    $query = sql_query($sql);
    while ($row = sql_fetch_array($query)) {
      $this->omvc[] = $row;
    }
  }
}
?>
