<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin Numéros de Vacarme
 *
 * @plugin     Numéros de Vacarme
 * @copyright  2018
 * @author     Christophe Le Drean
 * @licence    GNU/GPL
 * @package    SPIP\Vnumeros\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

include_spip('inc/cextras');
include_spip('base/vnumeros');

/**
 * Fonction d'installation et de mise à jour du plugin Numéros de Vacarme.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *     Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 * @return void
**/
function vnumeros_upgrade($nom_meta_base_version, $version_cible) {
	$maj = array();

	cextras_api_upgrade(vnumeros_declarer_champs_extras(), $maj['create']);

	$maj['1.0.1'] = array(
		array('sql_alter', 'TABLE spip_rubriques CHANGE prix_ht prix_ht DECIMAL(10,3) NOT NULL DEFAULT 0')
	);

	$maj['1.1.1'] = array(
		array('sql_alter', 'TABLE spip_rubriques DROP COLUMN reference')
	);

	$maj['1.1.2'] = array(
		array('sql_alter', 'TABLE spip_rubriques ADD reference INT(4) UNSIGNED NOT NULL DEFAULT 0 AFTER pages_total')
	);

	$maj['1.1.3'] = array(
		array('sql_alter', 'TABLE spip_rubriques DROP saison_annee')
	);

	// version 1.1.4
	cextras_api_upgrade(vnumeros_declarer_champs_extras(), $maj['1.1.4']);

	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin Numéros de Vacarme.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @return void
**/
function vnumeros_vider_tables($nom_meta_base_version) {

	// champs extra du plugin
	//cextras_api_vider_tables(vnumeros_declarer_champs_extras());

	effacer_meta($nom_meta_base_version);
}
