<?php
/**
 * @copyright Copyright(c) Muhammad Hussein Fattahizadeh. All rights reserved.
 * @author Muhammad Hussein Fattahizadeh
 * @link <http://mhf.ir/>
 */

/**
 * Created: 
 */

// return
return array(

	// main server
	'mainKey' => 'MjQyMzhkOTFmN2Qy', // change this value must change all file servers configure

	// media profiles
	'mediaProfiles' => array(

		// video
		'video' => array(
			'm4v' => array(
				'medium',
			),
			// 'webm' => array(
			//	'medium',
			// ),
		),

		// audio
		'audio' => array(
			'mp3' => array(
				'medium',
			),
			// 'oga' => array(
			//   'medium',
			// ),
		),
	),

	// servers
	'servers' => array(

		// index as id and dont change it after application start and files saved in db
		1 => array(

			// baseurl
			'baseUrl' => 'http://static0-practice.neo',

			// key
			'key' => 'OGFmNDAyOWRjOTE5',

			// progress mode: false, ap, nx
			'progress' => 'nx',
		),

		// index as id and dont change it after application start and files saved in db
		2 => array(

			// baseurl
			'baseUrl' => 'http://static1-practice.neo',

			// key
			'key' => 'OGFmNDAyOWRjOTE5',

			// progress mode: false, ap, nx
			'progress' => 'nx',
		),

		// index as id and dont change it after application start and files saved in db
		3 => array(

			// baseurl
			'baseUrl' => 'http://static2-practice.neo',

			// key
			'key' => 'OGFmNDAyOWRjOTE5',

			// progress mode: false, ap, nx
			'progress' => 'nx',
		),

		// index as id and dont change it after application start and files saved in db
		4 => array(

			// baseurl
			'baseUrl' => 'http://static3-practice.neo',

			// key
			'key' => 'OGFmNDAyOWRjOTE5',

			// progress mode: false, ap, nx
			'progress' => 'nx',
		),


		// add more servers here ...
	),
);
