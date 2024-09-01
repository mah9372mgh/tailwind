<?php
/**
 * @copyright Copyright(c) Muhammad Hussein Fattahizadeh. All rights reserved.
 * @author Muhammad Hussein Fattahizadeh
 * @link <http://mhf.ir/>
 */

// return
return array_replace_recursive(array(

	// upload default validate
	'uploadValidate' => array(

		// max file size
		'maxFileSize' => 1048576,

		// max uploaded file
		'maxUploadedFile' => 1,

		// exclude extension
		'excludeExtension' => array(
			'sh',
			'php',
			'exe',
			'com',
			'bat',
			'dll',
			'phtml',
			'php5',
			'php4',
			'php3',
		),
	),

	// ffmpeg configuration
	'ffmpeg' => array(

		// video watermark
		'videoWatermark' => '-vf "movie=%s [watermark]; [in][watermark] overlay=main_w-overlay_w-5:5 [out]"',

		// video format
		'video' => array(
			'm4v' => array(
				// 'low' => '-map_metadata -1 -sn -acodec libfaac -vcodec libx264 -b:a 64k -ar 32000 -b:v 192k',
				'medium' => '-map_metadata -1 -avoid_negative_ts 1 -sn -acodec libfaac -vcodec libx264 -b:a 128k -ar 44100 -preset slow -b:v 500k -vf scale="trunc(oh*a/2)*2:480"',
				// 'high' => '-map_metadata -1 -sn -acodec libfaac -vcodec libx264 -b:a 192k -ar 44100 -b:v 512k',
			),
//			'webm' => array(
//				// 'low' => '-map_metadata -1 -sn -acodec libvorbis -vcodec libvpx -b:a 64k -ar 32000 -b:v 192k',
//				'medium' => '-map_metadata -1 -avoid_negative_ts 1 -sn -acodec libvorbis -vcodec libvpx -b:a 128k -ar 44100 -b:v 384k',
//				// 'high' => '-map_metadata -1 -sn -acodec libvorbis -vcodec libvpx -b:a 192k -ar 44100 -b:v 512k',
//			),
			// 'ogv' => array(
				// 'low' => '-map_metadata -1 -sn -acodec libvorbis -vcodec libtheora -b:a 64k -ar 32000 -b:v 192k',
				// 'medium' => '-map_metadata -1 -sn -acodec libvorbis -vcodec libtheora -b:a 128k -ar 44100 -b:v 384k',
				// 'high' => '-map_metadata -1 -sn -acodec libvorbis -vcodec libtheora -b:a 192k -ar 44100 -b:v 512k',
			// ),
		),
		'audio' => array(
			'mp3' => array(
				// 'low' => '-map_metadata -1 -vn -acodec libmp3lame -b:a 48k -ar 32000 -f mp3',
				'medium' => '-map_metadata -1 -avoid_negative_ts 1 -vn -acodec libmp3lame -b:a 96k -ar 44100 -f mp3',
			),
//			'oga' => array(
//				// 'low' => '-map_metadata -1 -vn -acodec libvorbis -b:a 32k -ar 32000 -f ogg',
//				'medium' => '-map_metadata -1 -avoid_negative_ts 1 -vn -acodec libvorbis -b:a 64k -ar 44100 -f ogg',
//			),
		),
	),

	// key
	'key' => null,

	// json callback function
	'jsonCallBackFunction' => 'jsoncallback',

    'sn' => array(

    ),

), require_once __DIR__ . '/addon.local.php');
