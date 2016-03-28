<?php
/**
 * The staging database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'hostname'  => 'rhoge',
			'port'      => '3306',
			'database'  => 'hoge',
			'username'  => 'hoge',
			'password'  => 'hoge',
		),
    ),

	'slave1' => array(
		'connection'  => array(
			'hostname'  => 'hoge',
			'port'      => '3306',
			'database'  => 'hoge',
			'username'  => 'hoge',
			'password'  => 'hoge',
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