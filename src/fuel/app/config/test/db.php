<?php
/**
 * The test database settings. These get merged with the global settings.
 *
 * This environment is primarily used by unit tests, to run on a controlled environment.
 */

return array(
	'default' => array(
		'connection'  => array(
			'hostname'  => 'localhost',
			'port'      => '3306',
			'database'  => 'hoge',
			'username'  => 'hoge',
			'password'  => 'hoge',
		),
		'profiling' => true,
	),

	'slave1' => array(
		'connection'  => array(
			'hostname'  => 'localhost',
			'port'      => '3306',
			'database'  => 'hoge',
			'username'  => 'hoge',
			'password'  => 'hoge',
		),
		'profiling' => true,
	),

	// 以下スレーブ追加に伴い追記
/*
	'slave2' => array(
		'connection'  => array(
			'hostname'  => 'localhost',
				'port'      => '3306',
				'database'  => 'fumiaki_rakusuma',
				'username'  => 'fumiaki_rakusuma',
				'password'  => 'corosuke',
		),
	),
*/
);