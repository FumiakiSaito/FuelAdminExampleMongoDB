<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'type' => 'mysqli',
		'connection'  => array(
			'host' => '127.0.0.1',
			'database' => 'hoge',
			'username' => 'hoge',
			'password' => 'hoge'
		),
		'charset' => 'utf8'
	),
);
