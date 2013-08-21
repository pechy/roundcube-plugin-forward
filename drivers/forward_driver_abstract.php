<?php
interface forward_driver_abstract {
  function __construct($info); //connect
  function add_new($from, $to, $rcmail); //add new forwarding
  function delete($from, $to, $rcmail); //delete forwarding
  function update($from, $to, $rcmail); //update forwarding
  function get_list($from, $rcmail); //return array of forwardings
}
?>
