<?php

$labels = array();                                
$labels['forward'] = 'Forwarding';
$labels['newforwardrule'] = 'New forward address';
$labels['storedforwards'] = 'Stored forwards';
$labels['noaddressfilled'] = 'Address cannot be empty!';
$labels['delete'] = 'Delete';
$labels['deletenotallows'] = 'No deletion allowed, at least one forward required, add new before delete';
$labels['reallydelete'] = 'Really delete?';

$messages = array();
$messages['cantconnect'] = "Connect to database failed!";
$messages['invalidmail'] = "Invalid e-mail.";
$messages['toomuchforwards'] = "Too many forward address.";
$messages['successfullysaved'] = "Forwarding rule saved.";
$messages['unsuccessfullysaved'] = "Error: forwarding rule was not saved.";
$messages['successfullydeleted'] = "Forwarding rule was successfully deleted.";
$messages['unsuccessfullydeleted'] = "Error: Forwarding rule was not deleted.";
$messages['msg_no_stored_forwards'] = "No stored forwarding.";
$messages['addressalreadythere'] = "Forwarding to this address is already active!";
$messages['msg_misconfigured'] = "Misconfiguration, forward_commaseparated_alias_list option expects one alias entry per entry, in alias table!";
?>
