<?php
// Forward Plugin options
$rcmail_config['forward_domain']='@example.com';
//domain (required if mail are in postfix database without domain part)
$rcmail_config['forward_max_forwards']=5;
//max forward address for single user - to protect from massive spamming from bad guys
//Postfix DB creditials
$rcmail_config['forward_postfix_db_user']='postfixuser';
$rcmail_config['forward_postfix_db_pass']='postfixpass';
$rcmail_config['forward_postfix_db_dbname']='postfix';
$rcmail_config['forward_postfix_db_host']='127.0.0.1';
$rcmail_config['forward_sql_new_forward']="INSERT INTO `users` VALUES ('%u', '', '', '', '', 'forward', '%f', '');";
//SQL query for insert new FORWARD address
// %u - current user
// %f - address for forwarding
$rcmail_config['forward_sql_del_forward']="DELETE FROM `users` WHERE `mail` LIKE '%u' AND `typ` LIKE 'forward' AND `alias` LIKE '%a'";
//SQL query for selecting rules for this mail
//%a - alias for remove
$rcmail_config['forward_sql_list_forwards']="SELECT alias FROM `users` WHERE `mail` LIKE '%u' AND `typ` LIKE 'forward'";
//SQL query for selecting rules for this mail