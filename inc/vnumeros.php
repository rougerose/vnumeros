<?php

if (!defined("_ECRIRE_INC_VERSION")) {
	return;
}

include_spip('base/abstract_sql');

/**
 * Calculer et ajouter le champ référence d'une rubrique
 * correspondant à un numéro de Vacarme.
 * 
 * @param  int $id_rubrique
 * @return string Si $res est une chaîne vide, tout est ok. Sinon message d'erreur.
 */
function vnumeros_referencer($id_rubrique) {
	$res = '';
	
	$titre = sql_getfetsel('titre', 'spip_rubriques', 'id_rubrique='.$id_rubrique);
	$reference = vnumeros_convertir_titre_reference($titre);
	
	// Erreur ?
	if (strstr($reference, 'erreur !')) {
		$res = 'Le calcul de la référence pour la rubrique '.$titre.' numéro '.$id_rubrique.' a échoué';
	}
	
	// On enregistre la référence dans tous les cas.
	sql_updateq('spip_rubriques', array('reference' => $reference), 'id_rubrique='.$id_rubrique);
	
	return $res;
}


/**
 * Convertir le titre d'une rubrique en référence.
 *
 * Vacarme 80 => v0080
 * 
 * @param  string $titre
 * @return string
 */
function vnumeros_convertir_titre_reference($titre) {
	if (preg_match('!\d+!', $titre, $m)) {
		$reference = 'v' . str_pad(intval($m[0]), 4, '0', STR_PAD_LEFT);
	} else {
		$reference = 'erreur !';
	}
	
	return $reference;
}


/**
 * Liste des numéros disponibles
 *
 * A partir d'un tableau indiquant les références numéro_debut et numéro_fin
 * d'un abonnement, rechercher les numéros publiés et disponibles pour envoi.
 * 
 * @param  array $numeros_debut_fin
 * @return array id_rubrique des numéros disponibles
 */
function vnumeros_lister($numeros_debut_fin) {
	// début et fin sont sous la forme d'une référence vXXXX
	$numeros_nombre = str_replace('v', '', $numeros_debut_fin);
	
	// tous les numéros d'un abonnement
	$references = array_map(function($n) { return sprintf('v%04d', $n); }, range(reset($numeros_nombre), end($numeros_nombre), 1) );
	
	// rubrique qui contient les numéros
	$rubrique_numeros = lire_config('vnumeros/rubrique_numeros');
	
	$numeros_disponibles = sql_allfetsel(
		'id_rubrique',
		'spip_rubriques', 
		'id_parent='.sql_quote($rubrique_numeros).' AND statut='.sql_quote('publie').' AND '.sql_in('reference', $references));
	
	return $numeros_disponibles;
}
