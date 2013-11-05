<?php

$labels = array();                                
$labels['forward'] = 'Forwarding';
$labels['newforwardrule'] = 'Nueva redirección';
$labels['storedforwards'] = 'Direcciones almacenadas';
$labels['noaddressfilled'] = 'La dirección no puede estar vacia!';
$labels['delete'] = 'Eliminar';
$labels['deletenotallows'] = 'No se puede eliminar, al menos una dirección es requerida, agregue una antes de eliminar';
$labels['reallydelete'] = 'Realmente eliminar?';

$messages = array();
$messages['cantconnect'] = "Conexión a la base de datos fallida!";
$messages['invalidmail'] = "e-mail invalido.";
$messages['toomuchforwards'] = "Demasiadas direcciones.";
$messages['successfullysaved'] = "Forwarding guardado.";
$messages['unsuccessfullysaved'] = "Error: forwarding no salvado.";
$messages['successfullydeleted'] = "Forwarding exitosamente eliminado.";
$messages['unsuccessfullydeleted'] = "Error: Forwarding no eliminado.";
$messages['msg_no_stored_forwards'] = "No hay direcciones almacenadas.";
$messages['addressalreadythere'] = "Forwarding a esta dirección ya existe!";
$messages['msg_misconfigured'] = "Error de configuración, la opción forward_commaseparated_alias_list espera solo una entrada en la tabla de alias!";
?>
