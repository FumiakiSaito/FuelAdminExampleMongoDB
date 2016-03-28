<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'hostname'  => 'localhost',
			'port'      => '3306',
			'database'  => 'fuel_admin',
			'username'  => 'fuel_admin',
			'password'  => 'corosuke',
		),
    ),

	'slave1' => array(
		'connection'  => array(
			'hostname'  => 'localhost',
			'port'      => '3306',
			'database'  => 'fuel_admin',
			'username'  => 'fuel_admin',
			'password'  => 'corosuke',
		),
	),

	// 以下スレーブ追加に伴い追記
/*
	'slave2' => array(
		'connection'  => array(
			'hostname'  => 'localhost',
				'port'      => '3306',
				'database'  => '',
				'username'  => '',
				'password'  => '',
		),
	),
*/
);