<div id="gallery_attach" class="gallery_attach splide noprint">
  <div class="splide__track">
    <ul class="gallery_attach_list splide__list">
      <?php for ($i = 0; $i < count($images); $i++) : ?>
        <li class="splide__slide" data-thumb="<?php echo $thumbs[$i]['thumbnail'] ?>" data-src="<?php echo $images[$i]['thumbnail'] ?>">
          <img loading="lazy" width="600" height="400" alt="گالری" src="<?php echo $images[$i]['thumbnail'] ?>" />
        </li>
      <?php endfor; ?>
    </ul>
  </div>
</div>