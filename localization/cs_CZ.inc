<?php

$labels = array();                                
$labels['forward'] = 'Přeposílání';
$labels['newforwardrule'] = 'Adresa pro přeposílání';
$labels['storedforwards'] = 'Aktivní přeposílání';
$labels['noaddressfilled'] = 'Nevyplnili jste adresu.';
$labels['delete'] = 'Smazat';
$labels['deletenotallows'] = 'Smazání není povoleno, je vyžadováno alespoň jedno přeposílací pravidlo, přidejte nové přeposílání přes smazáním.';
$labels['reallydelete'] = 'Opravdu smazat?';

$messages = array();
$messages['cantconnect'] = "Připojení k databázi selhalo.";
$messages['invalidmail'] = "Neplatný email.";
$messages['toomuchforwards'] = "Příliš mnoho adres pro přeposílání.";
$messages['successfullysaved'] = "Pravidlo bylo uloženo.";
$messages['unsuccessfullysaved'] = "Chyba: pravidlo nebylo uloženo.";
$messages['successfullydeleted'] = "Pravidlo bylo smazáno.";
$messages['unsuccessfullydeleted'] = "Chyba: pravidlo nebylo smazáno.";
$messages['msg_no_stored_forwards'] = "Nemáte žádná uložená přeposílání.";
$messages['addressalreadythere'] = "Přeposílání na tuto adresu je již aktivní.";
$messages['msg_misconfigured'] = "Chyba konfigurace, možnost forward_commaseparated_alias_list očekává jeden alias na záznam v tabulce alias!";
?>
