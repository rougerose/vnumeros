<?php

if (!defined("_ECRIRE_INC_VERSION")) {
	return;
}

function vnumeros_declarer_champs_extras($champs = array()) {
	$champs['spip_rubriques']['reference'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'reference',
			'label' => _T('vnumeros:reference_label'),
			'explication' => _T('vnumeros:reference_explication'),
			'type' => 'text',
			'sql' => "tinytext NOT NULL DEFAULT ''",
			'obligatoire' => 'oui'
		),
		'verifier' => array(
			'type' => 'regex',
			'options' => array('modele' => '!v\d{4}!')
		)
	);

	$champs['spip_rubriques']['isbn'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'isbn',
			'label' => _T('vnumeros:isbn_label'),
			'explication' => _T('vnumeros:isbn_explication'),
			'type' => 'text',
			'sql' => 'bigint NOT NULL DEFAULT 0',
			'obligatoire' => 'oui',
			'maxlength' => 13
		)
	);
	
	$champs['spip_rubriques']['date_numero'] = array(
		'saisie' => 'date',
		'options' => array(
			'nom' => 'date_numero',
			'label' => _T('vnumeros:date_numero_label'),
			'explication' => _T('vnumeros:date_numero_explication'),
			'sql' => "datetime DEFAULT '0000-00-00 00:00:00' NOT NULL",
			'obligatoire' => 'oui'
		),
		'verifier' => array(
			'type' => 'date',
			'options' => array('normaliser' => 'datetime')
		)
	);
	
	$champs['spip_rubriques']['pages_total'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'pages_total',
			'label' => _T('vnumeros:pages_total'),
			'sql' => 'bigint NOT NULL DEFAULT 0',
			'obligatoire' => 'oui',
		)
	);
	
	$champs['spip_rubriques']['redacteurchef'] = array(
		'saisie' => 'auteurs',
		'options' => array(
			'nom' => 'redacteurchef',
			'label' => _T('vnumeros:redacteurchef_label'),
			'sql' => "text NOT NULL DEFAULT ''",
			'obligatoire' => 'oui',
			'multiple' => 'on',
			'statut' => array('0minirezo', '1comite')
		)
	);

	return $champs;
}
