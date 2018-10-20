<?php
/**
 * Définit les autorisations du plugin Numéros de Vacarme
 *
 * @plugin     Numéros de Vacarme
 * @copyright  2018
 * @author     Christophe Le Drean
 * @licence    GNU/GPL
 * @package    SPIP\Vnumeros\Autorisations
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

include_spip('base/abstract_sql');
include_spip('inc/config');

/**
 * Fonction d'appel pour le pipeline
 * @pipeline autoriser */
function vnumeros_autoriser() {
}


/**
 * Autorisation de configurer le plugin 
 * 
 * @param  [type] $faire [description]
 * @param  [type] $type  [description]
 * @param  [type] $id    [description]
 * @param  [type] $qui   [description]
 * @param  [type] $opt   [description]
 * @return [type]        [description]
 */
function autoriser_vnumeros_configurer($faire, $type, $id, $qui, $opt) {
	return autoriser('webmestre');
}


//
// Fonctions d'affichage des champs extra uniquement sur les rubriques Numéros
// 
function autoriser_rubrique_voirextra_reference($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}

function autoriser_rubrique_voirextra_isbn($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}


function autoriser_rubrique_voirextra_prix_ht($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}

function autoriser_rubrique_voirextra_date_numero($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}

function autoriser_rubrique_voirextra_pages_total($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}

function autoriser_rubrique_voirextra_redacteurchef($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}


//
// Fonctions de modification des champs extra uniquement sur les rubriques Numéros
//
function autoriser_rubrique_modifierextra_reference($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}

function autoriser_rubrique_modifierextra_isbn($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}


function autoriser_rubrique_modifierextra_prix_ht($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}

function autoriser_rubrique_modifierextra_date_numero($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}

function autoriser_rubrique_modifierextra_pages_total($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}

function autoriser_rubrique_modifierextra_redacteurchef($faire, $type, $id, $qui, $opt) {
	return _autoriser_vnumeros_extras($id);
}



function _autoriser_vnumeros_extras($id) {
	static $numero;
	
	$id_rubrique_numeros = lire_config('vnumeros/rubrique_numeros');
	
	if (is_null($numero) && $id_rubrique_numeros) {
		$numero = sql_countsel('spip_rubriques', array("id_rubrique=$id", "id_parent=$id_rubrique_numeros"));
	}
	
	if ($numero > 0) {
		return true;
	}
	
	return false;
}
