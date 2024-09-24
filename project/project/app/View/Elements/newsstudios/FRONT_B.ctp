<?php
// get current element name
$elementName = basename(__FILE__, '.ctp');
// get element data
require XCMS_PATH . '/core-common/app/View/Elements/includes/element_data.php';
?>
<?php if ($active) : ?>
  <?php if (!empty($data)) : ?>
    <section class="" data-element-name="<?php echo $elementName; ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
      <ul class="">
        <?php foreach ($data as $key => $news) : ?>
          <li class="md:flex items-center gap-x-6 border border-slate-300 dark:border-white">
            <!-- IMAGE -->
            <a class="block md:w-1/5" href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']); ?>" itemprop="thumbnailUrl">
              <?php if (isset($news['primaryFile']['picture'])) : ?>
                <img class="block w-full h-auto" loading="lazy" src="<?php echo $news['primaryFile']['picture'] ?>" alt="<?php echo h($news['title']); ?>" height="<?php echo $config['request']['primaryFile']['h']; ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" itemprop="image" />
              <?php else : ?>
                <img class="block w-full h-auto" loading="lazy" src="/images/default.webp" height="<?php echo $config['request']['primaryFile']['h']; ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" alt="<?php echo h($news['title']) ?>" itemprop="image" />
              <?php endif; ?>
            </a>
            <!-- END OF IMAGE -->
            <!-- CONTENT -->
            <div class="md:w-4/5">
              <!-- TITLE -->
              <div itemprop="alternativeHeadline">
                <a class="dark:text-white dark:hover:text-slate-200 hover:text-gray-600 duration-300" href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']); ?>" itemprop="url">
                  <?php echo h(Core_Text::persianFixNumber($news['title'])); ?>
                </a>
              </div>
              <!-- END OF TITLE -->
              <!-- TIME -->
              <div class="mt-6 dark:text-white">
                <time datetime="<?php echo gmdate('c', strtotime($news['rfc_publish_time'])); ?>">
                  <?php echo Core_Date::date(strtotime($news['rfc_publish_time']), [
                    'format' => 'dd MMMM YYYY | HH:mm'
                  ]); ?>
                </time>
              </div>
              <!-- END OF TIME -->
            </div>
            <!-- END OF CONTENT -->
          </li>
        <?php endforeach; ?>
      </ul>
    </section>
  <?php endif; ?>
<?php endif; ?>