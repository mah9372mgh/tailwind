<?php

	$requireFiles2 = [
		APP . 'View/Layouts/head/head-themecolor.php',
		APP . 'View/Elements/structure/metatagForTag.php',
	];

	$bodyAttributes = [
		'class' => 'Archive'
	];

	require XCMS_PATH . '/core-common/app/View/Layouts/_v2/head.ctp';
?>
<div class="outer_container">
	<!-- HEADER -->
	<?php echo $this->element('structure/header'); ?>
	<!-- END OF HEADER -->
		<main>
			<div class="main_wrapper">
				<div class="archive_outer">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</main>
	<!-- FOOTER -->
	<?php echo $this->element('structure/footer'); ?>
	<!-- END OF FOOTER -->
</div>

<?php
	require XCMS_PATH . '/core-common/app/View/Layouts/_v2/foot.ctp';
?>