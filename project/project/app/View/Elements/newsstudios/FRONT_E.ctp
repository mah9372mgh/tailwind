<?php
// get current element name
$elementName = basename(__FILE__, '.ctp');
// get element data
require XCMS_PATH . '/core-common/app/View/Elements/includes/element_data.php';
?>

<?php if ($active) : ?>
  <?php if (!empty($data)) : ?>
    <div class="relative" itemscope="" itemtype="http://schema.org/CreativeWork" data-element-name="<?php echo $elementName; ?>">
      <!-- HEADER -->
      <header class="absolute -top-12">
        <span class="bg-slate-800 px-3 py-1 text-white">
          <?php echo h($element['title']); ?>
        </span>
      </header>
      <!-- END OF HEADER -->
      <ul class="md:grid md:grid-cols-2 lg:grid-cols-3 gap-4 my-8">
        <?php foreach ($data as $key => $news) : ?>
          <li class="flex gap-5 items-center md:mb-8">
            <!-- IMAGE -->
            <div class="md:w-1/5 lg:w-3/12">
              <?php if (isset($news['author'])) : ?>
                <?php
                $authorManipulate = new Manipulate_Author_Front();
                $authorsData = $authorManipulate->newsAuthors($news['id']);
                foreach ($authorsData as $author) : ?>
                  <a class="block" href="<?php echo $author['Author']['url'] ?>" title="<?php echo $author['Author']['fullname']; ?>">
                    <?php if (isset($author['Author']['avatar_id'])) :
                      $file = new Manipulate_File_File();
                      $primaryFileData = $file->getData($author['Author']['avatar_id'], array(
                        'w' => 120,
                        'h' => 120,
                        'zc' => 1,
                      ));
                    ?>
                      <img class="block w-full h-auto rounded-full" loading="lazy" src="<?php echo $primaryFileData['picture'] ?>" width="120" height="120" alt="<?php echo $author['Author']['fullname']; ?>">
                    <?php else : ?>
                      <img class="block w-full h-auto rounded-full" loading="lazy" src="/images/avatar.webp" height="120" width="120" alt="<?php echo $author['Author']['fullname']; ?>">
                    <?php endif; ?>
                  </a>
                <?php endforeach; ?>
              <?php else : ?>
                <a class="block" href="<?php echo $news['url'] ?>" target="_blank" title="<?php echo h($news['title']); ?>" itemprop="url">
                  <?php if (isset($news['primaryFile']['picture'])) : ?>
                    <img class="block w-full h-auto rounded-full" loading="lazy" src="<?php echo $news['primaryFile']['picture'] ?>" height="<?php echo $config['request']['primaryFile']['h']; ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" alt="<?php echo h($news['title']); ?>" itemprop="image" />
                  <?php else : ?>
                    <img class="block w-full h-auto rounded-full" loading="lazy" src="/images/default2.webp" height="<?php echo $config['request']['primaryFile']['h']; ?>" width="<?php echo $config['request']['primaryFile']['w']; ?>" alt="<?php echo h($news['title']) ?>" itemprop="image" />
                  <?php endif; ?>
                </a>
              <?php endif; ?>
            </div>
            <!-- END OF IMAGE -->
            <!-- CONTENT -->
            <div class="md:w-4/5 lg:w-9/12">
              <div class="dark:text-white">
                <?php echo h($news['title']) ?>
              </div>
              <!-- AUTHOR NAME -->
              <?php if (isset($news['author'])) : ?>
                <a class="dark:text-white" href="<?php echo $author['Author']['url'] ?>" alt="<?php echo $author['Author']['fullname']; ?>">
                  <?php echo $author['Author']['fullname']; ?>
                </a>
                <!-- END OF AUTHOR NAME -->
              <?php endif; ?>
            </div>
            <!-- END OF CONTENT -->
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
<?php endif; ?>