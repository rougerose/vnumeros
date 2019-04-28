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
			'sql' => 'int(5) UNSIGNED NOT NULL DEFAULT 0',
			'obligatoire' => 'oui'
		),
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

	$champs['spip_rubriques']['prix_ht'] = array(
		'saisie' => 'vnumeros_prix',
		'options' => array(
			'nom' => 'prix_ht',
			'label' => _T('vnumeros:prix_ht_label'),
			'sql' => 'DECIMAL(10,3) NOT NULL DEFAULT 0',
			'type' => 'text',
			'obligatoire' => 'oui'
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
			'label' => _T('vnumeros:pages_total_label'),
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

	$champs['spip_articles']['pages_article'] = array(
		'saisie' => 'fieldset',
		'options' => array(
			'nom' => 'pages_article',
			'label' => 'Pages de l\'article',
			'pliable' => 'on',
		),
		'saisies' => array(
			0 => array(
				'saisie' => 'input',
				'options' => array(
					'nom' => 'page_debut',
					'label' => 'Numéro première page de l\'article',
					'type' => 'text',
					'maxlength' => '3',
					'autocomplete' => 'defaut',
					'sql' => 'bigint(3) NOT NULL DEFAULT 0',
					'rechercher_ponderation' => '2',
				),
				'verifier' => array(
					'type' => 'entier',
					'options' => array(
						'min' => '0',
						'max' => '999',
					),
				),
			),
			1 => array(
				'saisie' => 'input',
				'options' => array(
					'nom' => 'page_fin',
					'label' => 'Numéro page fin de l\'article',
					'type' => 'text',
					'maxlength' => '3',
					'autocomplete' => 'defaut',
					'sql' => 'bigint(3) NOT NULL DEFAULT 0',
					'rechercher_ponderation' => '2',
				),
				'verifier' => array(
					'type' => 'entier',
					'options' => array(
						'min' => '0',
						'max' => '999',
					),
				),
			),
			2 => array(
				'saisie' => 'input',
				'options' => array(
					'nom' => 'pages_total',
					'label' => 'Nombre total de pages de l\'article',
					'type' => 'text',
					'maxlength' => '3',
					'autocomplete' => 'defaut',
					'sql' => 'bigint(3) NOT NULL DEFAULT 0',
					'rechercher_ponderation' => '2',
				),
				'verifier' => array(
					'type' => 'entier',
					'options' => array(
						'min' => '0',
						'max' => '999',
					),
				),
			),
		),
	);

	$champs['spip_articles']['credit_logo'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'credit_logo',
			'label' => 'Crédits image en logo',
			'type' => 'text',
			'size' => '40',
			'autocomplete' => 'defaut',
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
			'traitements' => '_TRAITEMENT_RACCOURCIS',
		),
	);

	return $champs;
}
