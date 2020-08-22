<?php
require_once "{$_SERVER["DOCUMENT_ROOT"]}/models/db/model.php";
/**
 *
 */
class OMVC extends Dbf
{
  public $omvc = [];
  function db() {
    $sql = " select * from g5_write_product where wr_id = 2 ";
    $query = sql_query($sql);
    while ($row = sql_fetch_array($query)) {
      $this->omvc[] = $row;
    }
  }
}
?>
