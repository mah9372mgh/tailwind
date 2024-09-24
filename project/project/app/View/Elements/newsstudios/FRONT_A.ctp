<?php
// get current element name
$elementName = basename(__FILE__, '.ctp');
// get element data
require XCMS_PATH . '/core-common/app/View/Elements/includes/element_data.php';
?>
<?php if ($active) : ?>
  <?php if (!empty($data)) : ?>
    <section id="main_section" class="splide relative" data-element-name="<?php echo $elementName; ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
      <div class="splide__arrows">
        <button class="splide__arrow splide__arrow--prev absolute bottom-2/4 z-50">
          <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24">
            <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.65" d="m10 17l5-5l-5-5" />
          </svg>
        </button>
        <button class="splide__arrow splide__arrow--next absolute bottom-2/4 left-0 z-50">
          <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24">
            <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.65" d="m14 7l-5 5l5 5" />
          </svg>
        </button>
      </div>
      <div class="splide__track">
        <ul class="splide__list">
          <?php foreach ($data as $key => $news) : ?>
            <li class="splide__slide relative">
              <!-- IMAGE -->
              <a class="block" href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']); ?>" itemprop="thumbnailUrl">
                <?php if (isset($news['primaryFile']['picture'])) : ?>
                  <img class="block w-full h-auto" src="<?php echo $news['primaryFile']['picture'] ?>" alt="<?php echo h($news['title']); ?>" height="<?php echo $config['request']['primaryFile']['h']; ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" itemprop="image" />
                <?php else : ?>
                  <img src="/images/default.webp" height="<?php echo $config['request']['primaryFile']['h']; ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" alt="<?php echo h($news['title']) ?>" itemprop="image" />
                <?php endif; ?>
              </a>
              <!-- END OF IMAGE -->
              <!-- CONTENT -->
              <div class="lg:absolute bottom-0 right-0 w-full p-6 bg-gradient-to-l from-gray-700 to-black">
                <!-- TITLE -->
                <div itemprop="alternativeHeadline">
                  <a class="text-white font-bold text-lg" href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']); ?>" itemprop="url">
                    <?php echo h(Core_Text::persianFixNumber($news['title'])); ?>
                  </a>
                </div>
                <!-- END OF TITLE -->
              </div>
              <!-- END OF CONTENT -->
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
  <?php endif; ?>
<?php endif; ?>