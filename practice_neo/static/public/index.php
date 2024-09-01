<?php
/**
 * @copyright Copyright(c) Muhammad Hussein Fattahizadeh. All rights reserved.
 * @author Muhammad Hussein Fattahizadeh
 * @link <http://mhf.ir/>
 */

// set timezone
date_default_timezone_set('UTC');

// request time float
define('REQUEST_TIME_FLOAT', $_SERVER['REQUEST_TIME_FLOAT']);

// server remote address
define('SERVER_REMOTE_ADDR', (getenv('HTTP_X_FORWARDED_FOR') ? getenv('HTTP_X_FORWARDED_FOR') : getenv('REMOTE_ADDR')));

// server http user agent
define('SERVER_HTTP_USER_AGENT', (getenv('HTTP_USER_AGENT') ? getenv('HTTP_USER_AGENT') : null));

// xcms local access
define('XCMS_LOCAL_ACCESS', (boolean)(in_array(SERVER_REMOTE_ADDR, array('127.0.0.1', '::1'))
	|| preg_match('/^192\.168\./', SERVER_REMOTE_ADDR)
	|| preg_match('/^10\.1\.1\./', SERVER_REMOTE_ADDR)
));

// project path
define('PROJECT_PATH', realpath(__DIR__ . '/../../'));

// project title
define('PROJECT_TITLE', basename(PROJECT_PATH));

// application path
define('APPLICATION_PATH', PROJECT_PATH . '/static/application');

// files path
define('FILES_PATH', realpath(PROJECT_PATH . '/files'));

// development mode
define('DEVELOPMENT_MODE', ((require APPLICATION_PATH . '/configs/environment.local.php') === 'development' ? true : false));

// cache path
define('CACHE_PATH', '/tmp/xcms/' . PROJECT_TITLE . '_' . (int)(DEVELOPMENT_MODE));

// xcms tmpfs
define('XCMS_TMPFS', '/tmp/xcms-tmpfs/' . PROJECT_TITLE . '_' . (int)(DEVELOPMENT_MODE));

// xcms prefix
define('XCMS_PREFIX', substr(preg_replace('/[^0-9a-z]/i', null, base64_encode(hex2bin(md5(PROJECT_TITLE)))), 0, 4) . '_' . (string)DEVELOPMENT_MODE);

// check for xcms path
if (isset($_SERVER['XCMS_PATH'])) {

	// define cake core include path
	define('XCMS_PATH', $_SERVER['XCMS_PATH']);

} else { // not found

	// an error
	throw new Exception('Please check your constant `XCMS_PATH`. Run `sudo xcms --install` for more info.', E_USER_ERROR);
}

// setting up important directories
set_include_path(XCMS_PATH . '/library');

// zend auto loader
require_once XCMS_PATH . '/library/Core/functions.php';
require_once XCMS_PATH . '/library/Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance()->registerNamespace(array(
	'Core',
	'FileServer',
));

// set development mod
if (DEVELOPMENT_MODE) {

	// check for xhprof
	if (function_exists('xhprof_enable')) {

		// xhprof
		xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
	}

	// show errors
	ini_set('display_errors', '1');

}

// cache maker check
Core_Bootstrap_CacheMaker::check();

// request
$request = 'none';

// check for request
if (isset($_GET['request'])) {

	// request
	$request = (string)$_GET['request'];
}

// load index
$index = new FileServer_Index($request);

// throw response
$index->throwResponse();

// check for server inside request
if (DEVELOPMENT_MODE) {

	// check for xhprof
	if (function_exists('xhprof_enable')) {

		// stop profiler
		$xhprofData = xhprof_disable();

		// xhprof lib
		require_once XCMS_PATH . '/core-common/webroot-alias/xhprof_lib/utils/xhprof_lib.php';
		require_once XCMS_PATH . '/core-common/webroot-alias/xhprof_lib/utils/xhprof_runs.php';

		// xhprof runs
		$xhprofRuns = new XHProfRuns_Default();

		// save the run under a namespace "xhprof_xcms"
		$runId = $xhprofRuns->save_run($xhprofData, XCMS_PREFIX);

		// path of xhprof
		file_put_contents(PROJECT_PATH . '/logs/fileserver_xhprof.log', vsprintf("%s\t/xcms-tools/xhprof_html/index.php?run=%s&source=%s\nRequest:\n%s\n", array(
			gmdate('r'),
			$runId,
			XCMS_PREFIX,
			json_encode($_REQUEST, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
			str_repeat('=', 80),
		)), FILE_APPEND);
	}
}