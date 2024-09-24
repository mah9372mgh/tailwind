<?php
	// will be loaded after `title` tag
	// $requireFiles1 = [
	// 	'path/to/php/file.php',
	// ];

	// will be loaded before `head` closed
	// $requireFiles2 = [
	// 	'path/to/php/file.php',
	// ];

	// will be loaded before `html` closed
	// $requireFiles9 = [
	// 	'path/to/php/file.php',
	// ];

	$bodyAttributes = [
		'class' => 'blank'
	]; 

	require XCMS_PATH . '/core-common/app/View/Layouts/_v2/head.ctp';
?>

	<!-- HEADER -->
	<?php echo $this->element('structure/header'); ?>
	<!-- END OF HEADER -->
	<main>
		<div class="main_wrapper">
			<div class="status_code">
				<p>
					خطا ۴۰۴
				</p>
				<p>
					صفحه مورد نظر شما پیدا نشد ..!
				</p>
			</div>
		</div>
	</main>
	<!-- FOOTER -->
		<?php echo $this->element('structure/footer'); ?>
	<!-- END OF FOOTER -->

<?php
	require APP . 'View/Layouts/head/foot.ctp';
?>
