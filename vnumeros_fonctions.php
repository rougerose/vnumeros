<?php

if (!defined("_ECRIRE_INC_VERSION")) {
	return;
}

/**
 * Calculer la date d'un numéro normalisée en début de saison.
 * Le numéro peut être déjà publié (rang = 0) ou à paraître (rang > 0)
 * 
 * @param  [type] $date [description]
 * @param  [type] $rang [description]
 * @return [type]       [description]
 */


/**
 * Calculer la date d'un numéro normalisée en début de saison.
 * Le numéro peut être déjà publié (rang = 0) ou à paraître (rang > 0)
 * @param  string  $date date mysql
 * @param  integer $rang numéro en cours ou numéro à paraître
 * @return string date mysql normalisée en début de saison
 */
/*
function filtre_numero_date_normalisee($date, $rang = 0) {
	include_spip('inc/vabonnements_calculer_date');
	// date_debut, format normalisé
	$date_normalisee = vabonnements_calculer_date_debut($date);
	
	if ($rang > 0) {
		$periodicite = _VACARME_PERIODICITE;
		// rang = 1 => numéro prochain
		$nombre_mois = $rang * $periodicite;
		$date_normalisee = vabonnements_calculer_date_duree($date_normalisee, $nombre_mois);
	}
	
	return $date_normalisee;
}
*/


/**
 * Intervalles des références de numéro entre deux numéros.
 * 
 * @param  array $numeros_debut_fin référence premier numéro, référene dernier numero
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
	$nb = filtre_numeros_nombre($duree);
	$numeros = ($nb == 1 ? _T('vnumeros:numero') : _T('vnumeros:numeros', array('nb' => $nb)));
	return $numeros;
}


/**
 * Traduire la durée d'abonnement en nombre de numéros. 
 * 
 * @param  string $periodicite (12|24 month)
 * @return int
 */
function filtre_numeros_nombre($duree) {
	$nombre = intval($duree);
	$periodicite = _VACARME_PERIODICITE;
	return $nombre / $periodicite;
}
