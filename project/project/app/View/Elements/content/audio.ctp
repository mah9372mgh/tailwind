<div class="audio_attach noprint">
	<audio controls>
		<source type="audio/mp3" src="<?php echo $data['audio']['mp3']['medium']; ?>" />
	</audio>
	<div class="audio_info">
		<span>
			حجم فایل صوتی:
			<?php echo (Core_Text::persianFixNumber(humanFilesize($data['size'])));?>
		</span>
		 | 
		<span>
			مدت زمان فایل صوتی:
			<?php echo (Core_Text::persianFixNumber(humanFilesize($data['duration']))); ?></span>
			<a href="<?php echo $data['download']; ?>" title="دانلود فایل صوتی">
			دانلود فایل صوتی
		</a>
	</div>
</div>