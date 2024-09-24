<section class="archive_sec" itemtype="http://schema.org/CreativeWork" itemscope>
  <h1 class="section_header">
    <span class="box_header">
      <?php echo ($data['tag']); ?>
    </span>
  </h1>
  <!-- DESCRIPTION -->
  <?php if (!empty($tagData['description'])) : ?>
    <div class="description">
      <p class="title_text">
        توضیحات تگ
      </p>
      <?php echo ($tagData['description']); ?>
    </div>
  <?php endif; ?>
  <!-- END OF DESCRIPTION -->
  <ul class="last_news_list">
    <?php foreach ($data['items'] as $key => $news) : ?>
      <li class="list_item">
        <!-- IMAGE -->
        <a class="res" href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']); ?>" itemprop="thumbnailUrl">
          <?php if (isset($news['primaryFile']['picture'])) : ?>
            <img loading="lazy" class="img_brd" loading="lazy" src="<?php echo $news['primaryFile']['picture'] ?>" alt="<?php echo h($news['title']); ?>" height="<?php echo $config['request']['primaryFile']['h']; ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" itemprop="image" />
          <?php else : ?>
            <img loading="lazy" src="/images/default.webp" height="<?php echo $config['request']['primaryFile']['h']; ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" alt="<?php echo h($news['title']) ?>" itemprop="image" />
          <?php endif; ?>
        </a>
        <!-- END OF IMAGE -->
        <!-- CONTENT -->
        <div class="content">
          <!-- UPTITLE -->
          <?php if (!empty($news['upTitle'])) : ?>
            <div class="up_title" itemprop="headLine">
              <?php echo h($news['upTitle']); ?>
            </div>
          <?php endif; ?>
          <!-- END OF UPTITLE -->
          <!-- TITLE -->
          <div class="title" itemprop="alternativeHeadline">
            <a href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']); ?>" itemprop="url">
              <?php echo h(Core_Text::persianFixNumber($news['title'])); ?>
            </a>
          </div>
          <!-- END OF TITLE -->
          <!-- LEAD -->
          <?php if (!empty($news['lead'])) : ?>
            <p class="lead">
              <?php echo h($news['lead']); ?>
            </p>
          <?php endif; ?>
          <!-- END OF LEAD -->
        </div>
        <!-- END OF CONTENT -->
      </li>
    <?php endforeach; ?>
  </ul>
  <?php if (($data['pagesCount']) > 1) : ?>
    <footer class="service_pagination">
      <?php foreach ($data['paginate'] as $pageNum => $prefix) : ?>
        <?php if ($data['currentPage'] === $pageNum) : ?>
          <span class="page_num">
            <?php echo $pageNum; ?>
          </span>
        <?php elseif ($data['totalItems'] === 0) : ?>
          <?php echo tra('notFountAnyItems'); ?>
        <?php else : ?>
          <a title="<?php echo tra('page'); ?> <?php echo $pageNum; ?>" href="<?php echo $prefix; ?>">
            <?php echo $pageNum; ?>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </footer>
  <?php endif; ?>
</section>