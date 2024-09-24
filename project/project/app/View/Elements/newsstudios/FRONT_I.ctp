<?php
// get current element name
$elementName = basename(__FILE__, '.ctp');
// get element data
require XCMS_PATH . '/core-common/app/View/Elements/includes/element_data.php';
?>
<?php if ($active) : ?>
  <?php if (!empty($data)) : ?>
    <section class="background_section" data-element-name="<?php echo $elementName; ?>" itemscope="" itemtype="http://schema.org/CreativeWork">
      <header class="section_header main_wrapper">
        <span class="box_header">
          <?php if (!empty($categoryUrl)) : ?>
            <a href="<?php echo $categoryUrl; ?>" title="<?php echo h($element['title']); ?>">
              <?php echo h($element['title']); ?>
            </a>
          <?php elseif ($hasArchive) : ?>
            <a href="<?php echo $archiveLink; ?>" title="<?php echo h($element['title']); ?>">
              <?php echo h($element['title']); ?>
            </a>
          <?php else : ?>
            <?php echo h($element['title']); ?>
          <?php endif; ?>
          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 1024 1024">
            <path fill="#040404" d="M685.248 104.704a64 64 0 0 1 0 90.496L368.448 512l316.8 316.8a64 64 0 0 1-90.496 90.496L232.704 557.248a64 64 0 0 1 0-90.496l362.048-362.048a64 64 0 0 1 90.496 0" />
          </svg>
        </span>
        <?php if ($hasArchive) : ?>
          <a href="<?php echo $archiveLink; ?>">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 16 16">
              <path fill="#e90c19" fill-rule="evenodd" d="M0 3.75A.75.75 0 0 1 .75 3h14.5a.75.75 0 0 1 0 1.5H.75A.75.75 0 0 1 0 3.75M0 8a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H.75A.75.75 0 0 1 0 8m.75 3.5a.75.75 0 0 0 0 1.5h14.5a.75.75 0 0 0 0-1.5z" clip-rule="evenodd" />
            </svg>
          </a>
        <?php endif; ?>
      </header>
      <div class="background_cnt">
        <ul class="background_list main_wrapper">
          <?php foreach ($data as $key => $news) : ?>
            <li class="list_item">
              <!-- IMAGE -->
              <div class="image">
                <a class="res" href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']); ?>" itemprop="thumbnailUrl">
                  <?php if (isset($news['primaryFile']['picture'])) : ?>
                    <img loading="lazy" src="<?php echo $news['primaryFile']['picture'] ?>" alt="<?php echo h($news['title']); ?>" height="<?php echo $config['request']['primaryFile']['h']; ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" itemprop="image" />
                  <?php else : ?>
                    <img loading="lazy" src="/images/default.webp" height="<?php echo $config['request']['primaryFile']['h']; ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" alt="<?php echo h($news['title']) ?>" itemprop="image" />
                  <?php endif; ?>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                  <path fill="#e90c19" d="M12 3a4 4 0 0 0-4 4h2a.5.5 0 0 1 0 1H8v1h2a.5.5 0 0 1 0 1H8v1h2a.5.5 0 0 1 0 1H8a4 4 0 0 0 8 0h-2a.5.5 0 0 1 0-1h2v-1h-2a.5.5 0 0 1 0-1h2V8h-2a.5.5 0 0 1 0-1h2a4 4 0 0 0-4-4" />
                  <path fill="#e90c19" fill-rule="evenodd" d="M11.5 20v-2.5h1V20zm-3.5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5" clip-rule="evenodd" />
                  <path fill="#e90c19" fill-rule="evenodd" d="M6.227 13.709a.5.5 0 0 1 .647.284a5.5 5.5 0 0 0 10.16.222a.5.5 0 0 1 .916.403a6.5 6.5 0 0 1-12.008-.262a.5.5 0 0 1 .285-.647" clip-rule="evenodd" />
                </svg>
              </div>
              <!-- END OF IMAGE -->
              <!-- CONTENT -->
              <div class="content">
                <!-- TITLE -->
                <div class="title" itemprop="alternativeHeadline">
                  <a href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']); ?>" itemprop="url">
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