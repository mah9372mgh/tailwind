<header class="dark:bg-gray-900 border-b-2 border-slate-300">
	<div class="container mx-auto px-4 py-1 relative">
		<div class="flex justify-between items-center">
			<div class="flex items-center gap-6">
				<div class="w-2/5 md:w-1/5">
					<?php echo $this->element('structure/logo'); ?>
				</div>
				<?php echo $this->element('structure/main_menu'); ?>
				<div class="md:hidden">
					<button class="show_menu" type="button" name="show hide menu">
						<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30.55" height="24" viewBox="0 0 1792 1408">
							<g transform="translate(1792 0) scale(-1 1)">
								<path fill="#1c9af5" d="M1792 1216v128q0 26-19 45t-45 19H64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1664q26 0 45 19t19 45m-384-384v128q0 26-19 45t-45 19H64q-26 0-45-19T0 960V832q0-26 19-45t45-19h1280q26 0 45 19t19 45m256-384v128q0 26-19 45t-45 19H64q-26 0-45-19T0 576V448q0-26 19-45t45-19h1536q26 0 45 19t19 45M1280 64v128q0 26-19 45t-45 19H64q-26 0-45-19T0 192V64q0-26 19-45T64 0h1152q26 0 45 19t19 45" />
							</g>
						</svg>
					</button>
				</div>
			</div>
			<div class="flex gap-6 items-center">
				<div class="flex">
					<button class="dark_mode hidden w-full">
						<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
							<path fill="#fce94f" d="M12 17q-2.075 0-3.537-1.463T7 12t1.463-3.537T12 7t3.538 1.463T17 12t-1.463 3.538T12 17m-7-4H1v-2h4zm18 0h-4v-2h4zM11 5V1h2v4zm0 18v-4h2v4zM6.4 7.75L3.875 5.325L5.3 3.85l2.4 2.5zm12.3 12.4l-2.425-2.525L17.6 16.25l2.525 2.425zM16.25 6.4l2.425-2.525L20.15 5.3l-2.5 2.4zM3.85 18.7l2.525-2.425L7.75 17.6l-2.425 2.525z" />
						</svg>
					</button>
					<button class="light_mode block w-full">
						<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
							<path fill="#000" d="M12 21q-3.75 0-6.375-2.625T3 12t2.625-6.375T12 3q.35 0 .688.025t.662.075q-1.025.725-1.638 1.888T11.1 7.5q0 2.25 1.575 3.825T16.5 12.9q1.375 0 2.525-.613T20.9 10.65q.05.325.075.662T21 12q0 3.75-2.625 6.375T12 21" />
						</svg>
					</button>
				</div>
				<?php echo $this->element('structure/search'); ?>
			</div>
		</div>
	</div>
</header>