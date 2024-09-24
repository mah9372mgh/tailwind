<div class="video_attach noprint">
  <video poster="<?php echo $data['videoThumbnail']; ?>" controls="controls" preload="none">
    <source type="video/mp4" src="<?php echo $data['video']['m4v']['medium']; ?>" />
  </video>
  <div class="video_info">
    <span>
        حجم ویدیو:
    <?php echo (Core_Text::persianFixNumber(humanFilesize($data['size'])));?>
  </span>
   | 
  <span>
    مدت زمان ویدیو:
    <?php echo (Core_Text::persianFixNumber(humanTime($data['duration'])));?>
    </span>
    <a href="<?php echo $data['download']; ?>" title="دانلود ویدیو">
      دانلود ویدیو
    </a>
  </div>
</div>

