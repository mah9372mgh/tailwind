<?php

$requireFiles2 = [
	APP . 'View/Layouts/head/preload-font.ctp',
	APP . 'View/Layouts/head/preload-news.ctp',
	APP . 'View/Layouts/head/head-themecolor.php',
	APP . 'View/Elements/structure/metatag.php',
];

$bodyAttributes = [
  'class' => 'news'
];
$jsLibLinks = [
  'lib/js/frameworks-news.min',
];

// require __DIR__ . '/v2/head.ctp';
require APP . '/View/Layouts/head/head-news.ctp';
?>

<!-- HEADER -->
<?php echo $this->element('structure/header'); ?>
<!-- END OF HEADER -->
<!-- EMERGENCY NEWS -->
<!-- END OF EMERGENCY NEWS -->
<main data-entity-id="<?php echo $news['id']; ?>" data-entity-module="cont">
	<div class="main_wrapper">
		<div class="news_parent">
			<div class="right_col">
				<?php echo $this->fetch('content'); ?>
			</div>
			<div class="left_col noprint">
				<!-- ADVERTISEMENT_POSITION_G1 -->
				<div class="zxc">
				<?php
				echo $this->Ad->render(ADVERTISEMENT_POSITION_G1, $categoryId, [
					'data-ad-helper-sizes' => '300x100',
				]);
				?>
				</div>
				<!-- ADVERTISEMENT_POSITION_G1 -->
				<?php echo $this->element('newsstudios/VIEW_C'); ?>
				<!-- ADVERTISEMENT_POSITION_G2 -->
				<div class="zxc">
				<?php
				echo $this->Ad->render(ADVERTISEMENT_POSITION_G2, $categoryId, [
					'data-ad-helper-sizes' => '300x100',
				]);
				?>
				</div>
				<!-- ADVERTISEMENT_POSITION_G2 -->
				<?php echo $this->element('newsstudios/VIEW_D'); ?>
				<!-- ADVERTISEMENT_POSITION_G3 -->
				<div class="zxc">
				<?php
				echo $this->Ad->render(ADVERTISEMENT_POSITION_G3, $categoryId, [
					'data-ad-helper-sizes' => '300x100',
				]);
				?>
				</div>
				<!-- ADVERTISEMENT_POSITION_G3 -->
			</div>
		</div>
	</div>
</main>
<!-- FOOTER -->
<?php echo $this->element('structure/footer'); ?>
<!-- END OF FOOTER -->

<?php
require APP . 'View/Layouts/head/foot.ctp';
?>