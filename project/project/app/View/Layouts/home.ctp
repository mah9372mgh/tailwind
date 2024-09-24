<?php

$bodyAttributes = [
	'class' => 'home',
];
$cssLinks = [
	'styles/output'
];

require XCMS_PATH . '/core-common/app/View/Layouts/_v2/head.ctp';
?>
<?php echo $this->element('structure/header'); ?>

<main class="dark:bg-gray-900" data-entity-id="<?php echo XCMS_LANG; ?>" data-entity-module="hpage">
	<div class="container m-auto px-4 py-1">
		<div class="lg:flex gap-x-9 mt-10">
			<div class="lg:w-3/5">
				<!-- FRONT A -->
				<?php echo $this->element('newsstudios/FRONT_A'); ?>
				<!-- END OF FRONT A -->
				<div class="mt-6">
					<!-- FRONT B -->
					<?php echo $this->element('newsstudios/FRONT_B'); ?>
					<!-- END OF FRONT B -->
					<!-- FRONT C -->
					<?php echo $this->element('newsstudios/FRONT_C'); ?>
					<!-- END OF FRONT C -->
				</div>
			</div>
			<div class="lg:w-2/5">
				<!-- FRONT D -->
				<?php echo $this->element('newsstudios/FRONT_D'); ?>
				<!-- END OF FRONT D -->
			</div>
		</div>
	</div>
	<div class="bg-slate-200 dark:bg-gray-800 border border-cyan-600 my-8">
		<div class="container m-auto px-4 py-1">
			<!-- FRONT E -->
			<?php echo $this->element('newsstudios/FRONT_E'); ?>
			<!-- END OF FRONT E -->
		</div>

	</div>
	<div class="container m-auto px-4 py-1">
		<div class="lg:flex gap-x-9 mt-10 mb-10">
			<div class="lg:w-3/5">
				<!-- FRONT F -->
				<?php echo $this->element('newsstudios/FRONT_F'); ?>
				<!-- END OF FRONT F -->
			</div>
			<div class="lg:w-2/5">
				<!-- FRONT G -->
				<?php echo $this->element('newsstudios/FRONT_G'); ?>
				<!-- END OF FRONT G -->
			</div>
		</div>
	</div>
</main>
<?php echo $this->element('structure/footer'); ?>

<?php
require APP . 'View/Layouts/head/foot.ctp';
?>