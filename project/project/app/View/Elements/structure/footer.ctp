<footer class="bg-slate-200 dark:bg-gray-800 border border-cyan-600">
	<div class="container m-auto px-4">
		<div class="flex justify-between items-center gap-8">
			<div class="w-20">
				<?php echo $this->element('structure/logo'); ?>
			</div>
			<!-- START AASAAM LOGO -->
			<div class="w-1/5">
				<?php if (isset($page) && $page == 'home') : ?>
					<a class="flex gap-1 items-center" href="https://asam.company" title="طراحی سایت خبری و خبرگزاری آسام" target="_blank">
						<img src="/images/aasaam.png" alt="طراحی سایت خبری و خبرگزاری آسام" width="40" height="40">
						<span class="dark:text-white">
							طراحی سایت خبری و خبرگزاری آسام
						</span>
					</a>
				<?php else : ?>
					<a class="flex gap-1 items-center" href="https://asam.company" title="طراحی سایت خبری و خبرگزاری آسام" target="_blank" rel="nofollow">
						<img src="/images/aasaam.png" alt="طراحی سایت خبری و خبرگزاری آسام" width="40" height="40">
						<span class="dark:text-white">
							طراحی سایت خبری و خبرگزاری آسام
						</span>
					</a>
				<?php endif; ?>
			</div>
			<!-- END OF AASAAM LOGO -->
			<div class="w-1/12">
				<?php echo $this->element('structure/footer_social'); ?>
			</div>
		</div>
	</div>
</footer>