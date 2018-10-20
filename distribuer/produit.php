<?php

if (!defined("_ECRIRE_INC_VERSION")) {
	return;
}


function distribuer_produit($id_produit, $detail, $commande) {
	if ($detail['statut'] == 'attente') {
		$id_commande = intval($commande['id_commande']);
		
		$noter_envoi = charger_fonction('noter_envoi', 'action');
		$noter_envoi($id_commande, 'produit', $id_produit);
	}
}
