<?php

if (!defined("_ECRIRE_INC_VERSION")) {
	return;
}

/**
 * Intervalles des références de numéro entre un numéro début et un numéro fin.
 * 
 * @param  array $numeros_debut_fin numero_debut, numero_fin
 * @return array la clé de chaque élément est équivalente à chaque valeur.
 */
function filtre_numeros_liste_intervalles($numeros_debut_fin) {
	// tous les numéros entre deux références
	$references = range(reset($numeros_nombre), end($numeros_nombre), 1);
	
	$liste = array();
	
	foreach ($references as $reference) {
		$liste[$reference] = $reference;
	}
	
	return $liste;
}


/**
 * Traduire la durée d'abonnement en nombre de numéros
 * La fonction retourne également la chaîne "numéro(s)".
 * 
 * @param  string $periodicite (12|24 month)
 * @return string
 */
function filtre_numeros_nombre_en_clair($duree) {
	$periodicite = _VACARME_PERIODICITE;
	$nb = intval($duree) / $periodicite;
	$numeros = ($nb == 1 ? _T('vnumeros:numero') : _T('vnumeros:numeros', array('nb' => $nb)));
	return $numeros;
}
