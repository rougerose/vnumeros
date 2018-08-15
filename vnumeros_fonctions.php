<?php

if (!defined("_ECRIRE_INC_VERSION")) {
	return;
}


function vnumeros_liste_intervalles($numeros_debut_fin) {
	$numeros_nombre = str_replace('v', '', $numeros_debut_fin);
	
	// tous les numéros d'un abonnement
	$references = array_map(
		function($n) {return sprintf('v%04d', $n);},
		range(reset($numeros_nombre), end($numeros_nombre), 1)
	);
	
	$liste = array();
	
	foreach ($references as $reference) {
		$liste[$reference] = vnumeros_convertir_reference_titre($reference);
	}
	
	return $liste;
}


function vnumeros_convertir_reference_titre($reference) {
	$nombre = intval(str_replace('v', '', $reference));
	
	if ($nombre) {
		return $titre = 'Vacarme '.$nombre;
	} else {
		return '';
	}
}
