<?php

$labels = array();                                
$labels['forward'] = 'Gestione forward';
$labels['newforwardrule'] = 'Nuovo indirizzo';
$labels['storedforwards'] = 'Indirizzi di forward salvati';
$labels['noaddressfilled'] = 'L\'indirizzo non può essere vuoto!';
$labels['delete'] = 'Elimina';
$labels['deletenotallows'] = 'L\'eliminazione ncellazione non è permessa; almeno un indirizzo di forward è richiesto; aggiungerne uno nuovo prima di ripetere l\'operazione';
$labels['reallydelete'] = 'Confermare l\'eliminazione di: ';

$messages = array();
$messages['cantconnect'] = "Connessione al database fallita!";
$messages['invalidmail'] = "Indirizzo e-mail non valido.";
$messages['toomuchforwards'] = "Superato il numero massimo di forward consentiti.";
$messages['successfullysaved'] = "Indirizzo di forward salvato.";
$messages['unsuccessfullysaved'] = "Errore: indirizzo di forward non salvato.";
$messages['successfullydeleted'] = "Indirizzo di forward eliminato con successo.";
$messages['unsuccessfullydeleted'] = "Errore: indirizzo di forward non eliminato.";
$messages['msg_no_stored_forwards'] = "Nessun indirizzo di forward presente.";
$messages['addressalreadythere'] = "Il forward a questo indirizzo è già presente!";
$messages['msg_misconfigured'] = "Errore di configurazione, l'opzione forward_commaseparated_alias_list si attende un alias per entry, nella tabella degli alias!";
?>
