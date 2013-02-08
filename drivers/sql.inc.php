<?php
include_once("forward_driver_abstract.php");
class forward_driver_sql extends forward_driver_abstract {
  private $conn;
  function __construct($dsn) {
    if (!class_exists('rcube_db')) {
      $this->conn = new rcube_mdb2($dsn, '', FALSE);
    } else {
      $this->conn = rcube_db::factory($dsn, '', FALSE);
    }
  }
  public function add_new($from, $to, $rcmail) {
    $sql = $rcmail->config->get('forward_sql_new_forward');
    $sql = str_replace('%u', $this->conn->quote($from), $sql);
    $sql = str_replace('%f', $this->conn->quote($to), $sql);
    $this->conn->query($sql);
    if (!$this->conn->is_error()) return TRUE;
    else return FALSE;
  }
  public function delete($from, $to, $rcmail) {
    $sql = $rcmail->config->get('forward_sql_del_forward');
    $sql = str_replace('%u', $this->conn->quote($from), $sql);
    $sql = str_replace('%a', $this->conn->quote($to), $sql);
    $this->conn->query($sql);
    if (!$this->conn->is_error()) return TRUE;
    else return FALSE;
  }
  public function get_list($from, $rcmail) {
    $sql = $rcmail->config->get('forward_sql_list_forwards');
    $sql = str_replace('%u', $this->conn->quote($from), $sql);
    $result = $this->conn->query($sql);
    $array=array();
    if (!$this->conn->is_error()) {
      while ($row=$this->conn->fetch_array($result)) $array[]=$row[0];
    }
    return $array;
  }
}
?>