<?php

// user agent data
$userAgentData = Configure::read('userAgentData');

// html base class
$htmlBaseClass = vsprintf('dir-%s lang-%s browser-%s browser-%s-%d os-%s', array(
  XCMS_DIRECTION,
  XCMS_LANG,
  $userAgentData['userAgentFamilyClean'],
  $userAgentData['userAgentFamilyClean'],
  $userAgentData['userAgentVersion'],
  $userAgentData['operationSystemNameClean'],
));

// html ie base class
$htmlIeBaseClass = vsprintf('dir-%s lang-%s os-%s', array(
  XCMS_DIRECTION,
  XCMS_LANG,
  $userAgentData['operationSystemNameClean'],
));

// add element helper js library for developer users
if (in_array(AuthComponent::user('id'), array(1, 2))) :
  $this->Core->addJs('common-js/lib/elementHelper');
endif;

// model hits json
$modelHitsJson = array();
if (isset($modelHits)) :
  foreach ($modelHits as $modelConstant => $ids) :
    foreach ($ids as $id) :
      $modelHitsJson[$modelConstant][] = $id;
    endforeach;
  endforeach;
endif;

$masterConfig = array(
  'domain' => XCMS_DOMAIN,
  'v' => XCMS_VERSION,
  'lang' => XCMS_LANG,
  'blackHoleToken' => $this->Core->blackHoleToken,
  'dir' => XCMS_DIRECTION,
  'ajaxGeneration' => !(bool) Configure::read('ajaxCrawl'),
  'baseUrl' => Core_Bootstrap::getBaseUrl(),
  'u' => AuthComponent::user('id'),
  'wss' => CakeSession::read('wss'),
  'debug' => (bool)DEVELOPMENT_MODE,
);

$bodyAttributesString = '';
if (isset($bodyAttributes)) {
  $bodyAttributesString = ' ' . implode(' ', array_map(function ($v, $k) {
    return $k . '="' . h($v) . '"';
  }, $bodyAttributes, array_keys($bodyAttributes)));
}

$adverHolderMode = false;
if (isset($_GET['SHOWADVPOS'])) {
  $adverHolderMode = true;
}

?>
<!doctype html>
<!--[if IE 9]><html class="ie ie9 lte9 <?php echo $htmlIeBaseClass; ?>" lang="<?php echo XCMS_LANG; ?>" data-ng-app="aasaamApp" dir="<?php echo XCMS_DIRECTION; ?>"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="<?php echo $htmlBaseClass; ?>" lang="<?php echo XCMS_LANG; ?>" data-ng-app="aasaamApp" dir="<?php echo XCMS_DIRECTION; ?>"><!--<![endif]-->

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="max-image-preview:large">
  <meta charset="utf-8">
  <title><?php echo h($pageTitle); ?></title>
  <?php
  if (isset($requireFiles1)) :
    foreach ($requireFiles1 as $file) :
      require $file;
    endforeach;
  endif;
  ?>
  <meta property="og:title" content="<?php echo h($pageTitle); ?>">
  <meta property="og:site_name" content="<?php echo h(Core_Setting::read(XCMS_LANG . '.siteName')); ?>">
  <?php
  if (isset($refreshPage)) :
  ?>
    <meta http-equiv="refresh" content="<?php echo h($refreshPage['seconds']); ?>;url=<?php echo h($refreshPage['url']); ?>">
  <?php
  endif;

  if (isset($ampUrl)) :
  ?>
    <link rel="amphtml" href="<?php echo $ampUrl; ?>">
  <?php
  endif;

  if (isset($keywords)) :
  ?>
    <meta name="keywords" content="<?php echo h($keywords); ?>">
  <?php
  endif;
  if (isset($description)) :
  ?>
    <meta name="description" content="<?php echo h($description); ?>">
    <meta property="og:description" content="<?php echo h($description); ?>">
    <?php
  endif;
  if (isset($robots)) :
    if ($robots['noindex'] && $robots['nofollow']) :
    ?>
      <meta name="robots" content="noindex,nofollow">
    <?php
    elseif ($robots['noindex'] && !$robots['nofollow']) :
    ?>
      <meta name="robots" content="noindex,follow">
    <?php
    elseif (!$robots['noindex'] && $robots['nofollow']) :
    ?>
      <meta name="robots" content="index,nofollow">
      <?php
    endif;
  endif;

  if (isset($ogProperty)) :
    foreach ($ogProperty as $ogNamespace => $content) :
      if (is_array($content)) :
        foreach ($content as $it) :
      ?>
          <meta property="og:<?php echo $ogNamespace; ?>" content="<?php echo h($it); ?>">
        <?php
        endforeach;
      else :
        ?>
        <meta property="og:<?php echo $ogNamespace; ?>" content="<?php echo h($content); ?>">
  <?php
      endif;
    endforeach;
  endif;
  ?>
  <?php if (Core_Config::read('enable', 'ASSETSMode') && XCMS_LANG == 'fa') :
    $assetsUrl = substr(Core_Bootstrap::getBaseUrl(XCMS_LANG, true, 'assets'), 0, -1);
  ?>
    <?php if (DEVELOPMENT_MODE) :  ?>
      <!-- fav icon -->
      <link href="/favicon.ico" type="image/x-icon" rel="icon" />
      <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
      <!-- apple touch fav icon -->
      <link rel="apple-touch-icon" sizes="152x152" href="/favicon-152.png" />
      <link rel="apple-touch-icon" sizes="144x144" href="/favicon-144.png" />
      <link rel="apple-touch-icon" sizes="120x120" href="/favicon-120.png" />
      <link rel="apple-touch-icon" sizes="114x114" href="/favicon-114.png" />
      <link rel="apple-touch-icon" sizes="72x72" href="/favicon-72.png" />
      <link rel="apple-touch-icon-precomposed" href="/favicon-57.png" />
    <?php else : ?>
      <!-- fav icon -->
      <link href="<?php echo $assetsUrl ?>/favicon.ico" type="image/x-icon" rel="icon" />
      <link href="<?php echo $assetsUrl ?>/favicon.ico" type="image/x-icon" rel="shortcut icon" />
      <!-- apple touch fav icon -->
      <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $assetsUrl ?>/favicon-152.png" />
      <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $assetsUrl ?>/favicon-144.png" />
      <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $assetsUrl ?>/favicon-120.png" />
      <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $assetsUrl ?>/favicon-114.png" />
      <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $assetsUrl ?>/favicon-72.png" />
      <link rel="apple-touch-icon-precomposed" href="<?php echo $assetsUrl ?>/favicon-57.png" />
    <?php endif; ?>

  <?php else : ?>
    <!-- fav icon -->
    <link href="/favicon.ico" type="image/x-icon" rel="icon" />
    <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <!-- apple touch fav icon -->
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon-152.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon-144.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon-120.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon-72.png" />
    <link rel="apple-touch-icon-precomposed" href="/favicon-57.png" />
  <?php endif; ?>

  <?php
  if (isset($alternateFeeds)) :
    foreach ($alternateFeeds as $feed) :
  ?>
      <link href="<?php echo h($feed['href']); ?>" title="<?php echo h($feed['title']); ?>" type="<?php echo h($feed['type']); ?>" rel="alternate">
    <?php
    endforeach;
  endif;

  if (isset($canonicalUrl)) :
    ?>
    <link href="<?php echo $canonicalUrl; ?>" rel="canonical">

  <?php
  endif;

  if (isset($nextRel)) :
  ?>
    <link rel="next" href="<?php echo $nextRel ?>">
  <?php
  endif;

  if (isset($prevRel)) :
  ?>
    <link rel="prev" href="<?php echo $prevRel ?>">
  <?php
  endif;
  ?>
  <?php if (Core_Config::read('enable', 'ASSETSMode') && XCMS_LANG == 'fa') : ?>
    <?php if (DEVELOPMENT_MODE) :  ?>
      <link rel="stylesheet" href="/_v2/css/news_<?php echo XCMS_DIRECTION; ?>.css?v=<?php echo XCMS_VERSION; ?>">
    <?php else : ?>
      <link rel="stylesheet" href="<?php echo  $assetsUrl ?>/_v2/css/news_<?php echo XCMS_DIRECTION; ?>.css?v=<?php echo XCMS_VERSION; ?>">
    <?php endif; ?>
  <?php else : ?>
    <link rel="stylesheet" href="/_v2/css/news_<?php echo XCMS_DIRECTION; ?>.css?v=<?php echo XCMS_VERSION; ?>">
  <?php endif; ?>
  <?php
  if (isset($cssLinks)) :
    foreach ($cssLinks as $cssLink) :
  ?>
      <?php if (Core_Config::read('enable', 'ASSETSMode') && XCMS_LANG == 'fa') : ?>
        <?php if (DEVELOPMENT_MODE) :  ?>
          <link rel="stylesheet" href="/_v2/css/<?php echo $cssLink; ?>.css?v=<?php echo XCMS_VERSION; ?>">
        <?php else : ?>
          <link rel="stylesheet" href="<?php echo  $assetsUrl ?>/_v2/css/<?php echo $cssLink; ?>.css?v=<?php echo XCMS_VERSION; ?>">
        <?php endif; ?>
      <?php else : ?>
        <link rel="stylesheet" href="/_v2/css/<?php echo $cssLink; ?>.css?v=<?php echo XCMS_VERSION; ?>">
      <?php endif; ?>
  <?php
    endforeach;
  endif;
  if (isset($requireFiles2)) :
    foreach ($requireFiles2 as $file) :
      require $file;
    endforeach;
  endif;
  ?>
  <script>
    var socketAccess = '<?php echo session_id(); ?>';
    var refereData = <?php echo json_encode($refererData); ?>;
    var modelHits = <?php echo json_encode($modelHitsJson); ?>;
    var pageRefereData = <?php echo json_encode($this->request->referer()); ?>;
    var uHash = '<?php echo XCMS_CLIENT_UNIQUE ?>';
    var i18n = new Array();
    var masterConfig = <?php echo json_encode($masterConfig); ?>;
    var currentTime = new Date('<?php echo gmdate('r'); ?>');
    var isAdverHolderMode = <?php echo json_encode($adverHolderMode); ?>;
    <?php
    if (isset($jsVars)) :
      foreach ($jsVars as $name => $value) :
    ?>
        var <?php echo $name; ?> = <?php echo json_encode($value); ?>;
    <?php
      endforeach;
    endif;
    ?>
  </script>
  <?php if (Core_Config::read('enable', 'ASSETSMode') && XCMS_LANG == 'fa') : ?>
    <?php if (DEVELOPMENT_MODE) :  ?>
      <script defer src="/_v2/lib/js/frameworks-news.min.js?v=<?php echo XCMS_VERSION; ?>"></script>
    <?php else : ?>
      <script defer src="<?php echo  $assetsUrl ?>/_v2/lib/js/frameworks-news.min.js?v=<?php echo XCMS_VERSION; ?>"></script>
    <?php endif; ?>
  <?php else : ?>
    <script defer src="/_v2/lib/js/frameworks-news.min.js?v=<?php echo XCMS_VERSION; ?>"></script>
  <?php endif; ?>
  <?php
  if (isset($jsLibLinks)) :
    foreach ($jsLibLinks as $jsLink) :
  ?>
      <?php if (Core_Config::read('enable', 'ASSETSMode') && XCMS_LANG == 'fa') : ?>
        <?php if (DEVELOPMENT_MODE) :  ?>
          <script src="/_v2/<?php echo $jsLink; ?>.js?v=<?php echo XCMS_VERSION; ?>"></script>
        <?php else : ?>
          <script src="<?php echo  $assetsUrl ?>/_v2/<?php echo $jsLink; ?>.js?v=<?php echo XCMS_VERSION; ?>"></script>
        <?php endif; ?>
      <?php else : ?>
        <script src="/_v2/<?php echo $jsLink; ?>.js?v=<?php echo XCMS_VERSION; ?>"></script>
      <?php endif; ?>
  <?php
    endforeach;
  endif;
  ?>
  <?php /*
  <?php if (Core_Config::read('enable', 'ASSETSMode') && XCMS_LANG == 'fa') : ?>
    <?php if (DEVELOPMENT_MODE) :  ?>
      <script src="/_v2/lib/js/lang-<?php echo XCMS_LANG; ?>.min.js?v=<?php echo XCMS_VERSION; ?>"></script>
    <?php else : ?>
      <script src="<?php echo  $assetsUrl ?>/_v2/lib/js/lang-<?php echo XCMS_LANG; ?>.min.js?v=<?php echo XCMS_VERSION; ?>"></script>
    <?php endif; ?>
  <?php else : ?>
    <script src="/_v2/lib/js/lang-<?php echo XCMS_LANG; ?>.min.js?v=<?php echo XCMS_VERSION; ?>"></script>
  <?php endif; ?>
  */ ?>
  <?php
  if (isset($jsLinks)) :
    foreach ($jsLinks as $jsLink) :
  ?>
      <?php if (Core_Config::read('enable', 'ASSETSMode') && XCMS_LANG == 'fa') : ?>
        <?php if (DEVELOPMENT_MODE) :  ?>
          <script src="/_v2/js/<?php echo $jsLink; ?>.js?v=<?php echo XCMS_VERSION; ?>"></script>
        <?php else : ?>
          <script src="<?php echo  $assetsUrl ?>/_v2/js/<?php echo $jsLink; ?>.js?v=<?php echo XCMS_VERSION; ?>"></script>
        <?php endif; ?>
      <?php else : ?>
        <script src="/_v2/js/<?php echo $jsLink; ?>.js?v=<?php echo XCMS_VERSION; ?>"></script>
      <?php endif; ?>
    <?php
    endforeach;
  endif;
  if (DEVELOPMENT_MODE) :
    ?>
    <?php if (Core_Config::read('enable', 'ASSETSMode')) : ?>
      <?php if (DEVELOPMENT_MODE) :  ?>
        <script defer src="/_v2/js/main-news.js?v=<?php echo XCMS_VERSION; ?>"></script>
      <?php else : ?>
        <script defer src="<?php echo  $assetsUrl ?>/_v2/js/main-news.js?v=<?php echo XCMS_VERSION; ?>"></script>
      <?php endif; ?>
    <?php else : ?>
      <script defer src="/_v2/js/main-news.js?v=<?php echo XCMS_VERSION; ?>"></script>
    <?php endif; ?>
  <?php
  else :
  ?>
    <?php if (Core_Config::read('enable', 'ASSETSMode') && XCMS_LANG == 'fa') : ?>
      <?php if (DEVELOPMENT_MODE) :  ?>
        <script defer src="/_v2/js/main-news.min.js?v=<?php echo XCMS_VERSION; ?>"></script>
      <?php else : ?>
        <script defer src="<?php echo  $assetsUrl ?>/_v2/js/main-news.min.js?v=<?php echo XCMS_VERSION; ?>"></script>
      <?php endif; ?>
    <?php else : ?>
      <script defer src="/_v2/js/main-news.min.js?v=<?php echo XCMS_VERSION; ?>"></script>
    <?php endif; ?>
  <?php
  endif;
  if (DEVELOPMENT_MODE && isset($_GET['wsd'])) :
  ?>
    <script>
      ab.debug(true, true);
    </script>
  <?php
  endif;
  ?>
</head>
<body<?php echo $bodyAttributesString; ?>>
  <?php
  echo stripslashes(Core_Setting::read(XCMS_LANG . '.scriptsTop'));
  ?>