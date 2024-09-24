<?php

// set request
$request = array(
  'fields' => "id,title,upTitle,lead,publish_time,primaryFile",
  'limit' => 30,
  'dateFormat' => 'yyyy/MM/dd HH:mm',
  'order' => 'order_time',
);

// create instance of author front manipulate
$authorManipulate = new Manipulate_Author_Front();
$data = $authorManipulate->authorNewsList($author['id'], $request);

?>
<?php if (!empty($data)) : ?>
  <section class="author_articles">
    <header class="section_header">
      <span class="box_header">
        مقالات
      </span>
    </header>
    <ul class="profile_news">
      <?php foreach ($data as $news) : ?>
        <li class="list_item">
            <a href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']) ?>" class="res">
              <?php if (isset($news['primaryFile'])) :
                $file = new Manipulate_File_File();
                $primaryFileData = $file->getData($news['primaryFile']['id'], array(
                  'w' => 480,
                  'h' => 300,
                ));
              ?>
                <img loading="lazy" src="<?php echo $primaryFileData['picture'] ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" alt="<?php echo $news['title']; ?>">
              <?php else : ?>
                <img loading="lazy" src="/images/default.webp" width="<?php echo $config['request']['primaryFile']['w']; ?>" alt="<?php echo h($news['title']) ?>" />
              <?php endif; ?>
            </a>
            <div class="content">
              <div class="title" itemprop="alternativeHeadline">
                <a target="_blank" title="<?php echo h($news['title']) ?>" href="<?php echo $news['url']; ?>">
                  <?php echo h(Core_Text::persianFixNumber($news['title'])); ?>
                </a>
              </div>
              <!-- LEAD -->
              <?php if (!empty($news['lead'])) : ?>
                <p class="lead" <?php if (isset($request['primaryFile']['ltc'])) : ?> style="color:<?php echo h($request['primaryFile']['ltc']); ?>"<?php endif; ?>>
                  <?php echo h($news['lead']); ?>
                </p>
              <?php endif; ?>
              <!-- END OF LEAD -->
            </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </section>

<?php endif; ?>