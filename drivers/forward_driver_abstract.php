<?php
abstract class forward_driver_abstract {
  private $conn;
  function __construct($info) {
  //connect
  }
  function add_new($from, $to, $rcmail) {
  //add new forwarding
  }
  function delete($from, $to, $rcmail) {
  //delete forwarding
  }
  function get_list($from, $rcmail) {
  //return array of forwardings
  }
}
?>