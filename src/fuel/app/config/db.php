<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

/**
 * 全環境共通設定
 */

return array(
	'default'            => array(
		'type'           => 'mysqli',
		'connection'     => array(
			'hostname'   => '',
			'port'       => '3306',
			'database'   => '',
			'username'   => '',
			'password'   => '',
			'persistent' => false,
			'compress'   => false,
		),
		'identifier'     => '`',
		'table_prefix'   => '',
		'charset'        => 'utf8',
		'enable_cache'   => true,
		'profiling'      => false,
		'readonly'       => array('slave1'/*, 'slave2'*/), // スレーブ追加に伴い追記
	),

	// スレーブ1
	'slave1' => array(
		'type'           => 'mysqli',
		'connection'     => array(
			'hostname'   => '',
			'port'       => '3306',
			'database'   => '',
			'username'   => '',
			'password'   => '',
			'persistent' => false,
			'compress'   => false,
		),
		'identifier'     => '`',
		'table_prefix'   => '',
		'charset'        => 'utf8',
		'enable_cache'   => true,
		'profiling'      => false,
		'readonly'       => false,
	),
	// 以下スレーブ追加に伴い追記

/*
	// スレーブ2
	'slave2' => array(
			'type'           => 'mysqli',
			'connection'     => array(
					'hostname'   => '',
					'port'       => '3306',
					'database'   => '',
					'username'   => '',
					'password'   => '',
					'persistent' => false,
					'compress'   => false,
			),
			'identifier'     => '`',
			'table_prefix'   => '',
			'charset'        => 'utf8',
			'enable_cache'   => true,
			'profiling'      => false,
			'readonly'       => false,
	),
*/
	'mongo' => array(
		'default' => array(
			'hostname'   => 'localhost',
			'database'   => 'fuel_admin_example',
		),
	),
);
