<?php

$requireFiles2 = [
    APP . 'View/Layouts/head/head-themecolor.php',
	APP . 'View/Layouts/head/preload-font.ctp',
];

$bodyAttributes = [
'class' => 'landing',
];

require XCMS_PATH . '/core-common/app/View/Layouts/_v2/head.ctp';
?>

<!-- HEADER -->
<?php echo $this->element('structure/header'); ?>
<!-- END OF HEADER -->
<!-- MAIN -->
<main data-entity-id="<?php echo $categoryId; ?>" data-entity-module="sec">
	<div class="main_wrapper">
		<div class="l_first_row">
			<!-- landing A -->
				<?php echo $this->element('newsstudios/LANDING_A'); ?>
			<!-- END OF landing A -->
		</div>
		<div class="l_second_row">
			<!-- landing C -->
				<?php echo $this->element('newsstudios/LANDING_C'); ?>
			<!-- END OF landing C -->
			<div class="l_left_col">
				<!-- landing D -->
					<?php echo $this->element('newsstudios/LANDING_D'); ?>
				<!-- END OF landing D -->
				<!-- landing E -->
					<?php echo $this->element('newsstudios/LANDING_E'); ?>
				<!-- END OF landing E -->
			</div>
		</div>
	</div>
</main>
<!-- END OF MAIN -->
<!-- FOOTER -->
<?php echo $this->element('structure/footer'); ?>
<!-- END OF FOOTER -->

<?php
require APP . 'View/Layouts/head/foot.ctp';
?>
