<?php

if (!defined("_ECRIRE_INC_VERSION")) {
	return;
}


function distribuer_rubrique($id_rubrique, $detail, $commande) {
	if ($detail['statut'] == 'attente') {
		$id_commande = intval($commande['id_commande']);
		
		$noter_envoi = charger_fonction('noter_envoi', 'action');
		$noter_envoi($id_commande, 'rubrique', $id_rubrique);
	}
}
